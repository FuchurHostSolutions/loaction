<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class LogController extends Controller
{
    public function index(Request $request): View
    {
        $tab = $request->get('tab', 'activity');

        // Tab 1: Activity Logs (Audit Trail)
        $query = ActivityLog::with('user')->latest();

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('action_type', $request->type);
        }

        if ($request->filled('q')) {
            $search = '%' . trim($request->q) . '%';
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', $search)
                    ->orWhere('user_name', 'like', $search)
                    ->orWhere('action', 'like', $search)
                    ->orWhere('ip_address', 'like', $search);
            });
        }

        $activityLogs = $query->paginate(20)->withQueryString();

        $stats = [
            'total'         => ActivityLog::count(),
            'today'         => ActivityLog::whereDate('created_at', today())->count(),
            'auth'          => ActivityLog::where('action_type', 'auth')->count(),
            'consultations' => ActivityLog::where('action_type', 'consultation')->count(),
        ];

        // Tab 2: System Logs (storage/logs/laravel.log)
        $systemLogs = [];
        $logPath = storage_path('logs/laravel.log');
        $logFileSize = 0;

        if (File::exists($logPath)) {
            $logFileSize = round(File::size($logPath) / 1024, 2); // in KB
            $systemLogs = $this->parseLaravelLog($logPath, 150);
        }

        return view('admin.logs.index', compact(
            'tab',
            'activityLogs',
            'stats',
            'systemLogs',
            'logFileSize'
        ));
    }

    public function purgeActivity(Request $request): RedirectResponse
    {
        $days = (int) $request->input('days', 30);

        if ($days === 0) {
            $deleted = ActivityLog::query()->delete();
            $message = "Seluruh log aktivitas ({$deleted} entri) telah dibersihkan.";
        } else {
            $date = now()->subDays($days);
            $deleted = ActivityLog::where('created_at', '<', $date)->delete();
            $message = "Log aktivitas yang lebih lama dari {$days} hari ({$deleted} entri) telah dibersihkan.";
        }

        ActivityLog::record(
            action: 'system.log_purge',
            description: $message,
            actionType: 'system'
        );

        return back()->with('success', $message);
    }

    public function clearSystemLog(): RedirectResponse
    {
        $logPath = storage_path('logs/laravel.log');

        if (File::exists($logPath)) {
            File::put($logPath, '');
        }

        ActivityLog::record(
            action: 'system.clear_error_log',
            description: 'File log sistem Laravel (laravel.log) berhasil dikosongkan.',
            actionType: 'system'
        );

        return back()->with('success', 'File laravel.log berhasil dikosongkan.');
    }

    /**
     * Membaca dan mem-parse baris terakhir dari laravel.log menjadi array terstruktur.
     */
    private function parseLaravelLog(string $path, int $maxLines = 150): array
    {
        try {
            $content = File::get($path);
            if (empty(trim($content))) {
                return [];
            }

            // Pola regex standar Laravel log: [YYYY-MM-DD HH:MM:SS] env.LEVEL: Message
            $pattern = '/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\]\s+([a-zA-Z0-9_\-]+)\.([A-Z]+):\s+(.*)$/m';

            preg_match_all($pattern, $content, $matches, PREG_SET_ORDER);

            $parsed = [];
            foreach (array_reverse($matches) as $entry) {
                $level = strtoupper($entry[3]);
                $badge = match ($level) {
                    'EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR' => 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20',
                    'WARNING'                                  => 'bg-amber-50 text-amber-700 ring-1 ring-amber-600/20',
                    'INFO', 'NOTICE'                          => 'bg-sky-50 text-sky-700 ring-1 ring-sky-600/20',
                    'DEBUG'                                   => 'bg-slate-100 text-slate-700 ring-1 ring-slate-300',
                    default                                   => 'bg-slate-100 text-slate-600',
                };

                $parsed[] = [
                    'timestamp' => $entry[1],
                    'env'       => $entry[2],
                    'level'     => $level,
                    'badge'     => $badge,
                    'message'   => $entry[4],
                ];

                if (count($parsed) >= $maxLines) {
                    break;
                }
            }

            return $parsed;
        } catch (\Throwable $e) {
            return [];
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Audience;
use App\Models\Competency;
use App\Models\Consultation;
use App\Models\Post;
use App\Models\Service;
use App\Models\SiteVisit;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_consultations'     => Consultation::count(),
            'pending_consultations'   => Consultation::where('status', 'pending')->count(),
            'processed_consultations' => Consultation::where('status', 'processed')->count(),
            'total_services'          => Service::count(),
            'total_audiences'         => Audience::count(),
            'total_competencies'      => Competency::count(),
            'total_testimonials'      => Testimonial::count(),
            'total_posts'             => Post::count(),
            'published_posts'         => Post::where('is_published', true)->count(),
        ];

        // Statistik Pengunjung Website
        $visitorStats = [
            'total_views'      => SiteVisit::count(),
            'unique_visitors'  => SiteVisit::distinct('ip_address')->count('ip_address'),
            'today_views'      => SiteVisit::whereDate('visited_date', today())->count(),
            'today_uniques'    => SiteVisit::whereDate('visited_date', today())->distinct('ip_address')->count('ip_address'),
            'this_week_views'  => SiteVisit::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        // Data 7 Hari Terakhir untuk grafik batang
        $last7Days = collect();
        $maxDailyViews = 1;
        for ($i = 6; $i >= 0; $i--) {
            $d = now()->subDays($i);
            $date = $d->toDateString();
            $label = $d->format('d M');
            $views = SiteVisit::whereDate('visited_date', $date)->count();
            $uniques = SiteVisit::whereDate('visited_date', $date)->distinct('ip_address')->count('ip_address');
            if ($views > $maxDailyViews) {
                $maxDailyViews = $views;
            }
            $last7Days->push([
                'date'    => $date,
                'label'   => $label,
                'views'   => $views,
                'uniques' => $uniques,
            ]);
        }
        $last7Days = $last7Days->map(function ($day) use ($maxDailyViews) {
            $day['percent'] = $maxDailyViews > 0 ? max(8, round(($day['views'] / $maxDailyViews) * 100)) : 8;
            return $day;
        });

        // Halaman terpopuler
        $topPages = SiteVisit::select('url', DB::raw('count(*) as total'))
            ->groupBy('url')
            ->orderByDesc('total')
            ->take(5)
            ->get()
            ->map(function ($page) {
                $path = trim($page->url, '/');
                $page->title = match ($path) {
                    '', '/'   => 'Beranda',
                    'layanan' => 'Layanan Psikologi',
                    'profil'  => 'Profil & Visi Misi',
                    'kontak'  => 'Form Jadwalkan Konsultasi',
                    default   => '/' . $path,
                };
                return $page;
            });

        // Device breakdown
        $deviceCounts = [
            'desktop' => SiteVisit::where('device', 'desktop')->count(),
            'mobile'  => SiteVisit::where('device', 'mobile')->count(),
            'tablet'  => SiteVisit::where('device', 'tablet')->count(),
        ];
        $totalDevices = array_sum($deviceCounts) ?: 1;
        $devicePercentages = [
            'desktop' => round(($deviceCounts['desktop'] / $totalDevices) * 100),
            'mobile'  => round(($deviceCounts['mobile'] / $totalDevices) * 100),
            'tablet'  => round(($deviceCounts['tablet'] / $totalDevices) * 100),
        ];

        $recentConsultations = Consultation::with('service')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->latest()
            ->take(10)
            ->get();

        $recentActivities = ActivityLog::latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'visitorStats',
            'last7Days',
            'topPages',
            'devicePercentages',
            'recentConsultations',
            'recentActivities'
        ));
    }
}

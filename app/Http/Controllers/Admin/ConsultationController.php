<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Consultation;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ConsultationController extends Controller
{
    public function index(Request $request): View
    {
        $query = Consultation::with('service')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->latest();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        if ($request->filled('q')) {
            $search = '%' . trim($request->q) . '%';
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('notes', 'like', $search);
            });
        }

        $consultations = $query->paginate(15)->withQueryString();
        $services = Service::orderBy('title')->get();
        $counts = [
            'all'       => Consultation::count(),
            'pending'   => Consultation::where('status', 'pending')->count(),
            'processed' => Consultation::where('status', 'processed')->count(),
            'cancelled' => Consultation::where('status', 'cancelled')->count(),
        ];

        return view('admin.consultations.index', compact('consultations', 'services', 'counts'));
    }

    public function export(Request $request): StreamedResponse
    {
        $query = Consultation::with('service')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->latest();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        if ($request->filled('q')) {
            $search = '%' . trim($request->q) . '%';
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search);
            });
        }

        $filename = 'konsultasi-loaction-' . now()->format('Y-m-d-His') . '.csv';

        ActivityLog::record(
            action: 'consultation.export',
            description: "Mengekspor data konsultasi ke file {$filename}.",
            actionType: 'consultation'
        );

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        return response()->stream(function () use ($query) {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'Tanggal Masuk',
                'Nama Lengkap',
                'Nomor WhatsApp',
                'Email',
                'Layanan',
                'Metode Sesi',
                'Preferensi Waktu',
                'Status',
                'Pesan Klien',
                'Catatan Admin',
            ]);

            $query->chunk(100, function ($consultations) use ($handle) {
                foreach ($consultations as $c) {
                    fputcsv($handle, [
                        $c->id,
                        $c->created_at->format('Y-m-d H:i:s'),
                        $c->name,
                        $c->phone,
                        $c->email ?? '-',
                        $c->service_name ?? ($c->service?->title ?? '-'),
                        $c->session_type ?? 'offline',
                        $c->preferred_time ?? 'fleksibel',
                        $c->status,
                        $c->message ?? '-',
                        $c->admin_notes ?? '-',
                    ]);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    public function show(int $id): View
    {
        $consultation = Consultation::with('service')->findOrFail($id);

        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateNotes(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->update(['admin_notes' => $validated['admin_notes'] ?? null]);

        ActivityLog::record(
            action: 'consultation.update_notes',
            description: "Memperbarui catatan internal untuk konsultasi #{$consultation->id} ({$consultation->name}).",
            actionType: 'consultation',
            subject: $consultation
        );

        return back()->with('success', "Catatan internal untuk {$consultation->name} berhasil disimpan.");
    }

    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,processed,cancelled'],
        ]);

        $consultation = Consultation::findOrFail($id);
        $oldStatus = $consultation->status;
        $consultation->update(['status' => $validated['status']]);

        $statusLabel = [
            'pending'   => 'Menunggu (Pending)',
            'processed' => 'Selesai Diproses (Processed)',
            'cancelled' => 'Dibatalkan (Cancelled)',
        ][$validated['status']];

        ActivityLog::record(
            action: 'consultation.status_change',
            description: "Status konsultasi #{$consultation->id} ({$consultation->name}) diubah dari '{$oldStatus}' menjadi '{$validated['status']}'.",
            actionType: 'consultation',
            subject: $consultation,
            properties: [
                'consultation_id' => $consultation->id,
                'name'            => $consultation->name,
                'old_status'      => $oldStatus,
                'new_status'      => $validated['status'],
            ]
        );

        return back()->with('success', "Status konsultasi untuk {$consultation->name} berhasil diubah ke {$statusLabel}.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $consultation = Consultation::findOrFail($id);
        $name = $consultation->name;
        $consultationId = $consultation->id;
        $consultation->delete();

        ActivityLog::record(
            action: 'consultation.delete',
            description: "Menghapus data konsultasi #{$consultationId} atas nama {$name}.",
            actionType: 'consultation',
            properties: [
                'consultation_id' => $consultationId,
                'name'            => $name,
            ]
        );

        return redirect()->route('admin.consultations.index')
            ->with('success', "Data konsultasi atas nama {$name} berhasil dihapus.");
    }
}

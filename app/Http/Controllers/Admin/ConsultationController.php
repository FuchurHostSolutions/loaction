<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function show(int $id): View
    {
        $consultation = Consultation::with('service')->findOrFail($id);

        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,processed,cancelled'],
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => $validated['status']]);

        $statusLabel = [
            'pending'   => 'Menunggu (Pending)',
            'processed' => 'Selesai Diproses (Processed)',
            'cancelled' => 'Dibatalkan (Cancelled)',
        ][$validated['status']];

        return back()->with('success', "Status konsultasi untuk {$consultation->name} berhasil diubah ke {$statusLabel}.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $consultation = Consultation::findOrFail($id);
        $name = $consultation->name;
        $consultation->delete();

        return redirect()->route('admin.consultations.index')
            ->with('success', "Data konsultasi atas nama {$name} berhasil dihapus.");
    }
}

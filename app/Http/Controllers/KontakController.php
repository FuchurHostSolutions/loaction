<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KontakController extends Controller
{
    public function index(): View
    {
        return view('pages.kontak', [
            ...$this->sharedData(),
            'services' => Service::active()->ordered()->get(),
        ]);
    }

    public function submitConsultation(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['nullable', 'email', 'max:160'],
            'phone'   => ['required', 'string', 'max:30'],
            'service' => ['required', 'string', 'max:80'],
            'message' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required'    => 'Nama wajib diisi.',
            'phone.required'   => 'Nomor WhatsApp wajib diisi.',
            'service.required' => 'Pilih salah satu layanan.',
            'email.email'      => 'Format email belum valid.',
        ]);

        // Find the service by title to link the FK
        $service = Service::where('title', $validated['service'])->first();

        Consultation::create([
            'name'         => $validated['name'],
            'email'        => $validated['email'] ?? null,
            'phone'        => $validated['phone'],
            'service_id'   => $service?->id,
            'service_name' => $validated['service'],
            'message'      => $validated['message'] ?? null,
            'status'       => 'pending',
        ]);

        return back()->with(
            'status',
            'Terima kasih, '.$validated['name'].'. Permintaan konsultasi untuk "'.$validated['service'].'" berhasil dikirim. Tim LoAction akan segera menghubungi Anda.'
        );
    }
}

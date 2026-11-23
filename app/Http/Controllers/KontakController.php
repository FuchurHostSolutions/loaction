<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
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
        // Honeypot spam protection
        if ($request->filled('b_address')) {
            return back()->with('status', 'Permintaan Anda telah kami terima.');
        }

        $validated = $request->validate([
            'name'           => ['required', 'string', 'max:120'],
            'email'          => ['nullable', 'email', 'max:160'],
            'phone'          => ['required', 'string', 'max:30'],
            'service'        => ['required', 'string', 'max:80'],
            'session_type'   => ['nullable', 'in:offline,online'],
            'preferred_time' => ['nullable', 'in:pagi,siang,sore,fleksibel'],
            'message'        => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required'    => 'Nama lengkap wajib diisi.',
            'phone.required'   => 'Nomor WhatsApp wajib diisi.',
            'service.required' => 'Pilih salah satu layanan yang dibutuhkan.',
            'email.email'      => 'Format alamat email belum valid.',
        ]);

        // Find service by title to link FK if exists
        $service = Service::where('title', $validated['service'])->first();

        $sessionType = $validated['session_type'] ?? 'offline';
        $preferredTime = $validated['preferred_time'] ?? 'fleksibel';

        $consultation = Consultation::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'] ?? null,
            'phone'          => $validated['phone'],
            'service_id'     => $service?->id,
            'service_name'   => $validated['service'],
            'session_type'   => $sessionType,
            'preferred_time' => $preferredTime,
            'message'        => $validated['message'] ?? null,
            'status'         => 'pending',
        ]);

        ActivityLog::record(
            action: 'consultation.create',
            description: "Pendaftaran konsultasi baru dari {$consultation->name} ({$consultation->phone}) untuk layanan '{$consultation->service_name}'.",
            actionType: 'consultation',
            subject: $consultation,
            properties: [
                'consultation_id' => $consultation->id,
                'client_name'     => $consultation->name,
                'phone'           => $consultation->phone,
                'service'         => $consultation->service_name,
                'session_type'    => $sessionType,
                'preferred_time'  => $preferredTime,
            ]
        );

        // Build pre-formatted direct WhatsApp URL for instant conversion
        $methodLabel = $sessionType === 'online' ? 'Online (Zoom / Meet)' : 'Tatap Muka (Offline)';
        $timeLabel = match ($preferredTime) {
            'pagi'      => 'Pagi (09:00 - 12:00)',
            'siang'     => 'Siang (13:00 - 15:00)',
            'sore'      => 'Sore (16:00 - 18:00)',
            default     => 'Fleksibel',
        };

        $waText = "Halo LoAction, saya sudah mengisi form konsultasi di website:\n\n"
            . "• Nama: {$consultation->name}\n"
            . "• WhatsApp: {$consultation->phone}\n"
            . "• Layanan: {$consultation->service_name}\n"
            . "• Metode: {$methodLabel}\n"
            . "• Waktu: {$timeLabel}\n"
            . (!empty($consultation->message) ? "• Pesan: {$consultation->message}\n\n" : "\n")
            . "Mohon info ketersediaan jadwal terdekat. Terima kasih.";

        // Dynamic WhatsApp admin redirect URL from CMS settings
        $waUrl = \App\Models\Setting::whatsappUrl($waText);

        return back()->with([
            'status'       => 'Terima kasih, ' . $validated['name'] . '. Permintaan konsultasi Anda untuk "' . $validated['service'] . '" telah tercatat di sistem kami.',
            'whatsapp_url' => $waUrl,
            'client_name'  => $validated['name'],
            'service_name' => $validated['service'],
        ]);
    }
}

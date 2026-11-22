@extends('admin.layouts.app')

@section('title', 'Detail Konsultasi #' . $consultation->id)
@section('page_title', 'Detail Konsultasi #' . $consultation->id)
@section('page_description', 'Informasi lengkap formulir intake konsultasi klien')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-ink transition">
            &larr; Kembali ke Daftar Konsultasi
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Details Column -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80">
                <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-5 mb-5">
                    <div>
                        <h2 class="text-xl font-extrabold text-ink tracking-tight">{{ $consultation->name }}</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Dikirim pada {{ $consultation->created_at->format('d F Y, H:i:s') }}</p>
                    </div>
                    @if($consultation->status === 'processed')
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                            <span class="size-2 rounded-full bg-emerald-500"></span> Selesai
                        </span>
                    @elseif($consultation->status === 'cancelled')
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800">
                            <span class="size-2 rounded-full bg-rose-500"></span> Dibatalkan
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                            <span class="size-2 rounded-full bg-amber-500 animate-pulse"></span> Pending
                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs mb-6">
                    <div class="bg-slate-50 p-4 rounded-2xl">
                        <span class="text-slate-400 uppercase tracking-wider font-extrabold block text-[0.65rem]">Nomor Telepon / WhatsApp</span>
                        <strong class="text-ink font-bold text-sm block mt-1 font-mono">{{ $consultation->phone }}</strong>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        <span class="text-slate-400 uppercase tracking-wider font-extrabold block text-[0.65rem]">Alamat Email</span>
                        <strong class="text-ink font-bold text-sm block mt-1">{{ $consultation->email ?? '-' }}</strong>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        <span class="text-slate-400 uppercase tracking-wider font-extrabold block text-[0.65rem]">Layanan yang Dipilih</span>
                        <strong class="text-ink font-bold text-sm block mt-1 text-loaction-600">{{ $consultation->service?->title ?? 'Umum' }}</strong>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        <span class="text-slate-400 uppercase tracking-wider font-extrabold block text-[0.65rem]">Metode & Preferensi Waktu</span>
                        <strong class="text-ink font-bold text-sm block mt-1 uppercase">{{ $consultation->session_type ?? 'TBA' }} — {{ $consultation->preferred_time ?? '-' }}</strong>
                    </div>
                </div>

                <div>
                    <span class="text-slate-400 uppercase tracking-wider font-extrabold block text-[0.65rem] mb-2">Catatan Klien / Keluhan Singkat</span>
                    <div class="bg-slate-50 p-5 rounded-2xl text-xs sm:text-sm text-ink leading-relaxed font-medium">
                        {{ $consultation->notes ?: 'Tidak ada catatan tambahan dari klien.' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Actions Column -->
        <div class="space-y-6">
            <!-- Action Card -->
            <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/80">
                <h3 class="font-extrabold text-sm text-ink mb-4">Aksi Penanganan</h3>

                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', $consultation->phone ?? '');
                    if (str_starts_with($cleanPhone, '0')) {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                    $waText = rawurlencode("Halo {$consultation->name}, kami dari Biro Psikologi LoAction mengonfirmasi formulir konsultasi Anda mengenai layanan {$consultation->service?->title}. Kapan waktu yang nyaman untuk kita jadwalkan?");
                @endphp

                @if($cleanPhone)
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="w-full mb-3 flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow-md transition">
                        Hubungi via WhatsApp
                    </a>
                @endif

                <form method="POST" action="{{ route('admin.consultations.updateStatus', $consultation->id) }}" class="space-y-3 pt-3 border-t border-slate-100">
                    @csrf
                    @method('PATCH')
                    <label for="status" class="block text-[0.65rem] font-extrabold uppercase tracking-wider text-slate-400">Ubah Status</label>
                    <select name="status" id="status" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold focus:border-loaction-500 outline-none">
                        <option value="pending" {{ $consultation->status === 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                        <option value="processed" {{ $consultation->status === 'processed' ? 'selected' : '' }}>Processed (Selesai)</option>
                        <option value="cancelled" {{ $consultation->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Dibatalkan)</option>
                    </select>
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-ink hover:bg-slate-800 text-white font-bold text-xs transition">
                        Simpan Status
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.consultations.destroy', $consultation->id) }}" class="mt-4 pt-3 border-t border-slate-100" onsubmit="return confirm('Yakin ingin menghapus data konsultasi ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 px-3 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs transition">
                        Hapus Konsultasi Ini
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

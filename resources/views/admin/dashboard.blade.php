@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Ringkasan')
@section('page_description', 'Statistik operasional layanan dan data intake konsultasi')

@section('content')
    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        <!-- Card 1: Total Konsultasi -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm ring-1 ring-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-warm-gray">Total Konsultasi</p>
                <p class="text-3xl font-extrabold text-ink mt-2">{{ $stats['total_consultations'] }}</p>
                <span class="text-xs text-slate-500 mt-1 block">Semua formulir masuk</span>
            </div>
            <div class="size-12 rounded-2xl bg-loaction-50 text-loaction-600 flex items-center justify-center">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.666.052 1.32.38 1.657.965l1.642 2.855c.371.645 1.258.645 1.629 0l1.643-2.855c.336-.585.99-.913 1.656-.965 1.09-.085 2.17-.207 3.239-.364 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
            </div>
        </div>

        <!-- Card 2: Konsultasi Pending -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm ring-1 ring-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-amber-700">Perlu Diproses</p>
                <p class="text-3xl font-extrabold text-amber-600 mt-2">{{ $stats['pending_consultations'] }}</p>
                <span class="text-xs text-amber-600/80 mt-1 block">Status Menunggu</span>
            </div>
            <div class="size-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Card 3: Konsultasi Selesai -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm ring-1 ring-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-emerald-700">Sudah Ditangani</p>
                <p class="text-3xl font-extrabold text-emerald-600 mt-2">{{ $stats['processed_consultations'] }}</p>
                <span class="text-xs text-emerald-600/80 mt-1 block">Status Selesai</span>
            </div>
            <div class="size-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Card 4: Total Layanan -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm ring-1 ring-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-warm-gray">Total Layanan</p>
                <p class="text-3xl font-extrabold text-ink mt-2">{{ $stats['total_services'] }}</p>
                <span class="text-xs text-slate-500 mt-1 block">{{ $stats['total_competencies'] }} skema uji kompetensi</span>
            </div>
            <div class="size-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/></svg>
            </div>
        </div>
    </div>

    <!-- Recent Consultations Table Section -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-extrabold text-ink tracking-tight">Konsultasi Terbaru Masuk</h2>
                <p class="text-xs text-warm-gray">Klien yang baru saja mengisi formulir konsultasi</p>
            </div>
            <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-loaction-600 hover:text-loaction-700">
                Lihat Semua Konsultasi &rarr;
            </a>
        </div>

        @if($recentConsultations->isEmpty())
            <div class="text-center py-12 text-slate-400">
                <svg class="size-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                <p class="text-sm font-semibold">Belum ada formulir konsultasi yang masuk.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 text-slate-400 uppercase tracking-wider font-bold">
                            <th class="py-3 px-4">Klien</th>
                            <th class="py-3 px-4">Layanan</th>
                            <th class="py-3 px-4">Metode & Waktu</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Aksi Cepat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($recentConsultations as $c)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-4">
                                    <strong class="block font-bold text-ink text-sm">{{ $c->name }}</strong>
                                    <span class="text-slate-500 font-mono text-[0.7rem]">{{ $c->phone }}</span>
                                </td>
                                <td class="py-3.5 px-4 font-semibold text-warm-gray">
                                    {{ $c->service?->title ?? '-' }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="inline-block px-2 py-0.5 rounded text-[0.65rem] font-bold uppercase tracking-wider {{ $c->session_type === 'online' ? 'bg-sky-100 text-sky-700' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ $c->session_type ?? 'TBA' }}
                                    </span>
                                    <span class="block text-[0.65rem] text-slate-400 mt-0.5">{{ $c->preferred_time ?? '-' }}</span>
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($c->status === 'processed')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.65rem] font-bold bg-emerald-100 text-emerald-800">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span> Selesai
                                        </span>
                                    @elseif($c->status === 'cancelled')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.65rem] font-bold bg-rose-100 text-rose-800">
                                            <span class="size-1.5 rounded-full bg-rose-500"></span> Batal
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.65rem] font-bold bg-amber-100 text-amber-800">
                                            <span class="size-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $c->phone ?? '');
                                            if (str_starts_with($cleanPhone, '0')) {
                                                $cleanPhone = '62' . substr($cleanPhone, 1);
                                            }
                                            $waText = rawurlencode("Halo {$c->name}, kami dari Biro Psikologi LoAction mengonfirmasi permintaan konsultasi Anda.");
                                        @endphp
                                        @if($cleanPhone)
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-[0.68rem] transition shadow-sm">
                                                WhatsApp
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.consultations.show', $c->id) }}" class="inline-flex items-center px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-ink font-bold text-[0.68rem] transition">
                                            Detail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Quick Navigation Shortcuts -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('admin.services.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm ring-1 ring-slate-200/80 hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="font-extrabold text-sm text-ink group-hover:text-loaction-600 transition">Kelola Layanan</p>
                <p class="text-xs text-slate-500 mt-0.5">Tambah dan edit layanan psikologi</p>
            </div>
            <span class="size-8 rounded-xl bg-slate-100 group-hover:bg-loaction-50 text-slate-600 group-hover:text-loaction-600 flex items-center justify-center transition">
                &rarr;
            </span>
        </a>

        <a href="{{ route('admin.competencies.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm ring-1 ring-slate-200/80 hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="font-extrabold text-sm text-ink group-hover:text-loaction-600 transition">Uji Kompetensi</p>
                <p class="text-xs text-slate-500 mt-0.5">Skema asesmen SDM & peran</p>
            </div>
            <span class="size-8 rounded-xl bg-slate-100 group-hover:bg-loaction-50 text-slate-600 group-hover:text-loaction-600 flex items-center justify-center transition">
                &rarr;
            </span>
        </a>

        <a href="{{ route('admin.testimonials.index') }}" class="group bg-white rounded-2xl p-5 shadow-sm ring-1 ring-slate-200/80 hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="font-extrabold text-sm text-ink group-hover:text-loaction-600 transition">Kelola Testimoni</p>
                <p class="text-xs text-slate-500 mt-0.5">Ulasan klien & mitra institusi</p>
            </div>
            <span class="size-8 rounded-xl bg-slate-100 group-hover:bg-loaction-50 text-slate-600 group-hover:text-loaction-600 flex items-center justify-center transition">
                &rarr;
            </span>
        </a>
    </div>
@endsection

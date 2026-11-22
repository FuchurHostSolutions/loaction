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

    <!-- Visitor Traffic Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        <div class="bg-gradient-to-br from-indigo-50/60 to-white rounded-2xl p-5 shadow-sm ring-1 ring-indigo-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-indigo-700">Total Kunjungan</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-indigo-950 mt-1">{{ number_format($visitorStats['total_views']) }}</p>
                <span class="text-[0.7rem] text-indigo-600/80 mt-0.5 block">Akumulasi seluruh pageview</span>
            </div>
            <div class="size-11 rounded-xl bg-indigo-100 text-indigo-600 grid place-items-center shrink-0">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
        </div>

        <div class="bg-gradient-to-br from-violet-50/60 to-white rounded-2xl p-5 shadow-sm ring-1 ring-violet-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-violet-700">Pengunjung Unik</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-violet-950 mt-1">{{ number_format($visitorStats['unique_visitors']) }}</p>
                <span class="text-[0.7rem] text-violet-600/80 mt-0.5 block">Berdasarkan alamat IP unik</span>
            </div>
            <div class="size-11 rounded-xl bg-violet-100 text-violet-600 grid place-items-center shrink-0">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
            </div>
        </div>

        <div class="bg-gradient-to-br from-teal-50/60 to-white rounded-2xl p-5 shadow-sm ring-1 ring-teal-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-teal-700">Kunjungan Hari Ini</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-teal-950 mt-1">{{ number_format($visitorStats['today_views']) }}</p>
                <span class="text-[0.7rem] text-teal-600/80 mt-0.5 block">{{ $visitorStats['today_uniques'] }} pengunjung unik</span>
            </div>
            <div class="size-11 rounded-xl bg-teal-100 text-teal-600 grid place-items-center shrink-0">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
            </div>
        </div>

        <div class="bg-gradient-to-br from-sky-50/60 to-white rounded-2xl p-5 shadow-sm ring-1 ring-sky-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-sky-700">7 Hari Terakhir</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-sky-950 mt-1">{{ number_format($visitorStats['this_week_views']) }}</p>
                <span class="text-[0.7rem] text-sky-600/80 mt-0.5 block">Tren kunjungan mingguan</span>
            </div>
            <div class="size-11 rounded-xl bg-sky-100 text-sky-600 grid place-items-center shrink-0">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
            </div>
        </div>
    </div>

    <!-- Visitor Analytics Deep Dive -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- 7-Day Bar Chart -->
        <div class="lg:col-span-2 bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/80 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-extrabold text-ink">Tren Lalu Lintas 7 Hari Terakhir</h3>
                    <p class="text-xs text-warm-gray mt-0.5">Grafik volume kunjungan halaman harian</p>
                </div>
                <span class="text-[0.65rem] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full ring-1 ring-emerald-200 flex items-center gap-1.5">
                    <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live Counter
                </span>
            </div>

            <!-- Bar Chart Visualization -->
            <div class="pt-4 pb-2">
                <div class="h-44 flex items-end justify-between gap-2 sm:gap-4 px-2">
                    @foreach($last7Days as $day)
                        <div class="flex-1 flex flex-col items-center gap-2 group h-full justify-end">
                            <span class="text-[0.65rem] font-bold text-slate-500 group-hover:text-loaction-600 transition">
                                {{ $day['views'] }}
                            </span>
                            <div class="w-full max-w-[42px] bg-slate-100 group-hover:bg-loaction-500 rounded-t-xl transition-all duration-300 relative shadow-inner" 
                                 style="height: {{ $day['percent'] }}%;" 
                                 title="{{ $day['label'] }}: {{ $day['views'] }} kunjungan ({{ $day['uniques'] }} unik)">
                            </div>
                            <span class="text-[0.65rem] font-bold text-slate-500 tracking-tight whitespace-nowrap mt-1">
                                {{ $day['label'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t border-slate-100 pt-3 flex items-center justify-between text-xs text-warm-gray">
                <span>Rata-rata mingguan: <strong>{{ round($visitorStats['this_week_views'] / 7, 1) }}</strong> kunjungan/hari</span>
                <a href="{{ route('admin.logs.index', ['tab' => 'visitors']) }}" class="font-bold text-loaction-600 hover:text-loaction-700 transition">
                    Lihat Log Kunjungan &rarr;
                </a>
            </div>
        </div>

        <!-- Right Side: Top Pages & Device Breakdown -->
        <div class="space-y-6">
            <!-- Top Pages -->
            <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/80">
                <h4 class="text-sm font-extrabold text-ink mb-3">Halaman Terpopuler</h4>
                @if($topPages->isEmpty())
                    <p class="text-xs text-warm-gray py-4 text-center">Belum ada data kunjungan tercatat.</p>
                @else
                    <div class="space-y-2.5">
                        @foreach($topPages as $page)
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-ink truncate max-w-[170px]" title="{{ $page->url }}">{{ $page->title }}</span>
                                <span class="px-2 py-0.5 rounded-md bg-slate-100 font-mono font-bold text-slate-600 text-[0.7rem]">{{ $page->total }} hits</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Device Distribution -->
            <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/80">
                <h4 class="text-sm font-extrabold text-ink mb-3">Perangkat Pengunjung</h4>
                <div class="space-y-2 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-600 font-semibold flex items-center gap-1.5">
                            <svg class="size-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/></svg>
                            Desktop / Komputer
                        </span>
                        <strong class="text-ink">{{ $devicePercentages['desktop'] }}%</strong>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-loaction-500 h-full rounded-full transition-all duration-500" style="width: {{ $devicePercentages['desktop'] }}%;"></div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <span class="text-slate-600 font-semibold flex items-center gap-1.5">
                            <svg class="size-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/></svg>
                            Smartphone / Mobile
                        </span>
                        <strong class="text-ink">{{ $devicePercentages['mobile'] }}%</strong>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-indigo-500 h-full rounded-full transition-all duration-500" style="width: {{ $devicePercentages['mobile'] }}%;"></div>
                    </div>
                </div>
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
                            <tr class="transition {{ $c->status === 'pending' ? 'bg-amber-50/40 hover:bg-amber-50' : 'hover:bg-slate-50/80' }}">
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-2">
                                        @if($c->status === 'pending')
                                            <span class="size-2 rounded-full bg-amber-500 animate-pulse shrink-0" title="Menunggu Ditangani"></span>
                                        @endif
                                        <strong class="font-bold text-ink text-sm">{{ $c->name }}</strong>
                                    </div>
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

    <!-- Recent Activity Logs Card -->
    <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/80">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-base font-extrabold text-ink">Aktivitas & Audit Trail Terbaru</h3>
                <p class="text-xs text-warm-gray mt-0.5">Catatan tindakan admin, pendaftaran intake, dan perubahan status</p>
            </div>
            <a href="{{ route('admin.logs.index') }}" class="text-xs font-bold text-loaction-600 hover:text-loaction-700 transition flex items-center gap-1">
                <span>Lihat Semua Log</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($recentActivities->isEmpty())
            <p class="text-xs text-warm-gray py-4 text-center">Belum ada catatan aktivitas tercatat.</p>
        @else
            <div class="divide-y divide-slate-100">
                @foreach($recentActivities as $act)
                    <div class="py-2.5 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs hover:bg-slate-50/60 rounded-xl px-2 transition">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[0.65rem] font-extrabold uppercase tracking-wider shrink-0 {{ $act->action_badge_class }}">
                                {{ $act->action_type_label }}
                            </span>
                            <span class="font-bold text-ink truncate">{{ $act->description }}</span>
                        </div>
                        <div class="flex items-center gap-3 shrink-0 text-slate-400 font-mono text-[0.7rem]">
                            <span>{{ $act->user_name ?? 'Sistem' }}</span>
                            <span>&bull;</span>
                            <span>{{ $act->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
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

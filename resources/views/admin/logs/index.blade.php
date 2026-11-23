@extends('admin.layouts.app')

@section('title', 'Log Aktivitas & Sistem')
@section('page_title', 'Log Aktivitas & Sistem')
@section('page_description', 'Pantau riwayat audit trail aktivitas pengguna, perubahan data konsultasi, dan log server')

@section('content')
<div class="space-y-6">
    <!-- Header Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-4 shadow-sm ring-1 ring-slate-200/80">
            <span class="text-xs font-bold uppercase tracking-wider text-warm-gray block">Total Log Tercatat</span>
            <span class="text-2xl font-black text-ink mt-1 block">{{ number_format($stats['total']) }}</span>
            <span class="text-[0.7rem] text-slate-500 mt-0.5 block">Audit trail keseluruhan</span>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm ring-1 ring-slate-200/80">
            <span class="text-xs font-bold uppercase tracking-wider text-warm-gray block">Aktivitas Hari Ini</span>
            <span class="text-2xl font-black text-loaction-600 mt-1 block">{{ number_format($stats['today']) }}</span>
            <span class="text-[0.7rem] text-slate-500 mt-0.5 block">Peristiwa 24 jam terakhir</span>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm ring-1 ring-slate-200/80">
            <span class="text-xs font-bold uppercase tracking-wider text-warm-gray block">Log Autentikasi</span>
            <span class="text-2xl font-black text-blue-600 mt-1 block">{{ number_format($stats['auth']) }}</span>
            <span class="text-[0.7rem] text-slate-500 mt-0.5 block">Login, logout, percobaan masuk</span>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm ring-1 ring-slate-200/80">
            <span class="text-xs font-bold uppercase tracking-wider text-warm-gray block">Log Konsultasi</span>
            <span class="text-2xl font-black text-emerald-600 mt-1 block">{{ number_format($stats['consultations']) }}</span>
            <span class="text-[0.7rem] text-slate-500 mt-0.5 block">Intake baru & perubahan status</span>
        </div>
    </div>

    <!-- Main Container Card -->
    <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200/80 overflow-hidden">
        <!-- Navigation Tabs -->
        <div class="flex flex-wrap items-center justify-between border-b border-slate-200 px-6 pt-4 gap-4 bg-slate-50/50">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.logs.index', ['tab' => 'activity']) }}" 
                   class="px-4 py-3 border-b-2 font-bold text-xs uppercase tracking-wider transition flex items-center gap-2 {{ $tab === 'activity' ? 'border-loaction-500 text-loaction-600 bg-white rounded-t-xl shadow-sm' : 'border-transparent text-warm-gray hover:text-ink' }}">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Audit Trail Aktivitas</span>
                    <span class="px-2 py-0.5 rounded-full text-[0.65rem] {{ $tab === 'activity' ? 'bg-loaction-100 text-loaction-700' : 'bg-slate-200 text-slate-600' }}">{{ $activityLogs->total() }}</span>
                </a>
                <a href="{{ route('admin.logs.index', ['tab' => 'system']) }}" 
                   class="px-4 py-3 border-b-2 font-bold text-xs uppercase tracking-wider transition flex items-center gap-2 {{ $tab === 'system' ? 'border-loaction-500 text-loaction-600 bg-white rounded-t-xl shadow-sm' : 'border-transparent text-warm-gray hover:text-ink' }}">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"/></svg>
                    <span>Log Sistem Laravel (laravel.log)</span>
                    <span class="px-2 py-0.5 rounded-full text-[0.65rem] {{ $tab === 'system' ? 'bg-loaction-100 text-loaction-700' : 'bg-slate-200 text-slate-600' }}">{{ $logFileSize }} KB</span>
                </a>
                <a href="{{ route('admin.logs.index', ['tab' => 'visitors']) }}" 
                   class="px-4 py-3 border-b-2 font-bold text-xs uppercase tracking-wider transition flex items-center gap-2 {{ $tab === 'visitors' ? 'border-loaction-500 text-loaction-600 bg-white rounded-t-xl shadow-sm' : 'border-transparent text-warm-gray hover:text-ink' }}">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    <span>Log Kunjungan Website</span>
                    <span class="px-2 py-0.5 rounded-full text-[0.65rem] {{ $tab === 'visitors' ? 'bg-loaction-100 text-loaction-700' : 'bg-slate-200 text-slate-600' }}">{{ $visitorStats['total_views'] }}</span>
                </a>
            </div>

            <!-- Tab Quick Actions -->
            <div class="pb-3 flex items-center gap-2">
                @if($tab === 'activity')
                    <button type="button" onclick="document.getElementById('purgeModal').classList.remove('hidden')" class="px-3 py-1.5 rounded-xl border border-rose-200 text-rose-600 hover:bg-rose-50 font-bold text-xs transition flex items-center gap-1.5">
                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                        <span>Bersihkan Log</span>
                    </button>
                @else
                    <form method="POST" action="{{ route('admin.logs.clearSystem') }}" onsubmit="return confirm('Kosongkan file laravel.log sekarang? Catatan error lama tidak dapat dipulihkan.');">
                        @csrf
                        <button type="submit" class="px-3 py-1.5 rounded-xl border border-rose-200 text-rose-600 hover:bg-rose-50 font-bold text-xs transition flex items-center gap-1.5">
                            <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span>Kosongkan File Log</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if($tab === 'activity')
            <!-- Filter & Search Toolbar -->
            <div class="p-6 border-b border-slate-100 bg-white">
                <form method="GET" action="{{ route('admin.logs.index') }}" class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                    <input type="hidden" name="tab" value="activity">

                    <!-- Search Input -->
                    <div class="relative flex-1 max-w-md">
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ request('q') }}" 
                            placeholder="Cari deskripsi, username, IP, atau aksi..." 
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-100 text-sm font-semibold outline-none transition placeholder:text-slate-400"
                        >
                        <svg class="size-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    </div>

                    <!-- Category Filter Buttons -->
                    <div class="flex items-center gap-1.5 overflow-x-auto pb-1">
                        @php
                            $currentType = request('type', 'all');
                            $types = [
                                'all'          => 'Semua',
                                'auth'         => 'Autentikasi',
                                'consultation' => 'Konsultasi',
                                'master_data'  => 'Data Web',
                                'system'       => 'Sistem',
                            ];
                        @endphp
                        @foreach($types as $val => $label)
                            <a href="{{ route('admin.logs.index', array_merge(request()->query(), ['type' => $val])) }}" 
                               class="px-3 py-1.5 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $currentType === $val ? 'bg-loaction-500 text-white shadow-sm' : 'bg-slate-100 text-warm-gray hover:bg-slate-200 hover:text-ink' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>

            <!-- Table Logs -->
            {{-- Mobile swipe hint --}}
            <div class="sm:hidden px-4 py-2 bg-slate-50 border-b border-slate-200/70 text-[0.68rem] text-slate-500 font-semibold flex items-center justify-between">
                <span class="flex items-center gap-1.5">
                    <svg class="size-3.5 text-loaction-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                    Geser tabel untuk melihat rincian aktivitas
                </span>
                <span class="text-[0.65rem] text-slate-400 font-mono">swipe &rarr;</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[860px]">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50/70 text-[0.7rem] font-extrabold uppercase tracking-wider text-warm-gray">
                            <th class="py-3.5 px-6">Waktu</th>
                            <th class="py-3.5 px-4">Pengguna</th>
                            <th class="py-3.5 px-4">Tipe & Aksi</th>
                            <th class="py-3.5 px-6">Deskripsi Aktivitas</th>
                            <th class="py-3.5 px-4">Alamat IP</th>
                            <th class="py-3.5 px-6 text-right">Rincian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($activityLogs as $log)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="py-4 px-6 text-slate-500 whitespace-nowrap font-mono text-xs">
                                    <span class="block font-bold text-ink">{{ $log->created_at->format('d/m/Y H:i:s') }}</span>
                                    <span class="text-[0.68rem] text-slate-400">{{ $log->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2.5">
                                        <div class="grid size-7 place-items-center rounded-lg bg-slate-100 text-[0.7rem] font-extrabold text-ink shrink-0">
                                            {{ strtoupper(substr($log->user_name ?? 'S', 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="block font-bold text-xs text-ink leading-tight">{{ $log->user_name ?? 'Publik / Tamu' }}</span>
                                            <span class="block text-[0.65rem] text-slate-400 font-mono">{{ $log->user ? $log->user->email : 'Non-login' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[0.65rem] font-extrabold tracking-wider uppercase {{ $log->action_badge_class }}">
                                        {{ $log->action_type_label }}
                                    </span>
                                    <span class="block font-mono text-[0.68rem] text-slate-400 mt-0.5">{{ $log->action }}</span>
                                </td>
                                <td class="py-4 px-6 text-xs text-ink font-medium max-w-md">
                                    {{ $log->description }}
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap text-xs text-slate-500 font-mono">
                                    {{ $log->ip_address ?? '-' }}
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    @if(!empty($log->properties))
                                        <button 
                                            type="button" 
                                            onclick="showLogDetail({{ json_encode($log->properties) }}, '{{ addslashes($log->description) }}', '{{ $log->user_agent }}')" 
                                            class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-ink font-bold text-xs transition inline-flex items-center gap-1"
                                        >
                                            <svg class="size-3 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                            <span>Detail</span>
                                        </button>
                                    @else
                                        <span class="text-slate-300 text-xs">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-warm-gray text-xs">
                                    Belum ada catatan log aktivitas yang cocok dengan kriteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($activityLogs->hasPages())
                <div class="p-6 border-t border-slate-100 bg-slate-50/50">
                    {{ $activityLogs->links() }}
                </div>
            @endif

        @elseif($tab === 'system')
            <!-- Tab System Log (laravel.log) -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <span class="size-2 rounded-full bg-emerald-500"></span>
                        <span class="text-xs font-bold text-ink">Catatan Terbaru dari <code class="font-mono text-loaction-600">storage/logs/laravel.log</code></span>
                    </div>
                    <span class="text-xs text-warm-gray font-mono">Menampilkan hingga {{ count($systemLogs) }} baris terakhir</span>
                </div>

                @if(count($systemLogs) > 0)
                    <div class="space-y-2">
                        @foreach($systemLogs as $entry)
                            <div class="p-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 font-mono text-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-2 hover:bg-white hover:shadow-sm transition">
                                <div class="flex items-center gap-3 min-w-0 flex-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[0.65rem] font-bold tracking-wider shrink-0 {{ $entry['badge'] }}">
                                        {{ $entry['level'] }}
                                    </span>
                                    <span class="text-slate-400 text-[0.7rem] shrink-0">{{ $entry['timestamp'] }}</span>
                                    <span class="text-ink font-semibold truncate">{{ $entry['message'] }}</span>
                                </div>
                                <span class="text-[0.65rem] text-slate-400 uppercase tracking-wider shrink-0 font-sans font-bold">
                                    Env: {{ $entry['env'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-16 text-center">
                        <div class="mx-auto size-12 rounded-full bg-emerald-100 text-emerald-600 grid place-items-center mb-3">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 class="text-sm font-bold text-ink">File Log Bersih / Kosong</h4>
                        <p class="text-xs text-warm-gray mt-1 max-w-sm mx-auto">Tidak ada pesan error atau file <code class="font-mono">laravel.log</code> belum mencatat galat sistem saat ini.</p>
                    </div>
                @endif
            </div>

        @else
            <!-- Tab Visitor Logs (Site Visits) -->
            <div class="p-6 border-b border-slate-100 bg-white">
                <form method="GET" action="{{ route('admin.logs.index') }}" class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                    <input type="hidden" name="tab" value="visitors">

                    <!-- Search Input -->
                    <div class="relative flex-1 max-w-md">
                        <input 
                            type="text" 
                            name="q_visitor" 
                            value="{{ request('q_visitor') }}" 
                            placeholder="Cari alamat IP, URL, atau referer..." 
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-100 text-sm font-semibold outline-none transition placeholder:text-slate-400"
                        >
                        <svg class="size-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    </div>

                    <!-- Device Filter Buttons -->
                    <div class="flex items-center gap-1.5 overflow-x-auto pb-1">
                        @php
                            $currentDev = request('device', 'all');
                            $devs = [
                                'all'     => 'Semua',
                                'desktop' => 'Desktop',
                                'mobile'  => 'Mobile',
                                'tablet'  => 'Tablet',
                                'bot'     => 'Crawler/Bot',
                            ];
                        @endphp
                        @foreach($devs as $val => $label)
                            <a href="{{ route('admin.logs.index', array_merge(request()->query(), ['device' => $val, 'tab' => 'visitors'])) }}" 
                               class="px-3 py-1.5 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $currentDev === $val ? 'bg-loaction-500 text-white shadow-sm' : 'bg-slate-100 text-warm-gray hover:bg-slate-200 hover:text-ink' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>

            <!-- Table Visitor Logs -->
            {{-- Mobile swipe hint --}}
            <div class="sm:hidden px-4 py-2 bg-slate-50 border-b border-slate-200/70 text-[0.68rem] text-slate-500 font-semibold flex items-center justify-between">
                <span class="flex items-center gap-1.5">
                    <svg class="size-3.5 text-loaction-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                    Geser tabel untuk melihat rincian kunjungan
                </span>
                <span class="text-[0.65rem] text-slate-400 font-mono">swipe &rarr;</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[780px]">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50/70 text-[0.7rem] font-extrabold uppercase tracking-wider text-warm-gray">
                            <th class="py-3.5 px-6">Waktu</th>
                            <th class="py-3.5 px-4">Alamat IP</th>
                            <th class="py-3.5 px-6">Halaman Dikunjungi</th>
                            <th class="py-3.5 px-4">Perangkat</th>
                            <th class="py-3.5 px-6">Sumber / Referer</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($visitorLogs as $visit)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="py-4 px-6 text-slate-500 whitespace-nowrap font-mono text-xs">
                                    <span class="block font-bold text-ink">{{ $visit->created_at->format('d/m/Y H:i:s') }}</span>
                                    <span class="text-[0.68rem] text-slate-400">{{ $visit->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="font-mono text-xs font-bold text-ink">{{ $visit->ip_address }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-bold text-xs text-ink block">{{ $visit->page_title }}</span>
                                    <span class="font-mono text-[0.68rem] text-slate-400 block truncate max-w-xs">{{ $visit->url }}</span>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    @php
                                        $devBadge = match($visit->device) {
                                            'desktop' => 'bg-slate-100 text-slate-700 ring-slate-200',
                                            'mobile'  => 'bg-indigo-50 text-indigo-700 ring-indigo-200',
                                            'tablet'  => 'bg-purple-50 text-purple-700 ring-purple-200',
                                            default   => 'bg-amber-50 text-amber-700 ring-amber-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[0.65rem] font-extrabold uppercase tracking-wider ring-1 {{ $devBadge }}">
                                        {{ ucfirst($visit->device) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-xs text-slate-500 font-mono truncate max-w-xs" title="{{ $visit->referer }}">
                                    {{ $visit->referer ? (parse_url($visit->referer, PHP_URL_HOST) ?? $visit->referer) : 'Langsung (Direct / Bookmark)' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-warm-gray text-xs">
                                    Belum ada catatan pengunjung yang cocok dengan filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Visitor Logs -->
            @if($visitorLogs->hasPages())
                <div class="p-6 border-t border-slate-100 bg-slate-50/50">
                    {{ $visitorLogs->links() }}
                </div>
            @endif
        @endif
    </div>
</div>

<!-- Modal Detail Log Properties -->
<div id="detailModal" class="fixed inset-0 z-50 bg-ink/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl ring-1 ring-slate-200 transform transition-all">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h3 class="text-sm font-extrabold text-ink">Metadata & Payload Log</h3>
            <button type="button" onclick="document.getElementById('detailModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="mt-4 space-y-3">
            <div>
                <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray block mb-1">Aktivitas</span>
                <p id="modalDescription" class="text-xs font-semibold text-ink bg-slate-50 p-2.5 rounded-xl border border-slate-100"></p>
            </div>
            <div>
                <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray block mb-1">Properties (JSON Payload)</span>
                <pre id="modalProperties" class="p-3 bg-slate-900 text-emerald-400 rounded-xl text-xs font-mono overflow-x-auto max-h-56 leading-relaxed"></pre>
            </div>
            <div>
                <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray block mb-1">User Agent (Browser / Perangkat)</span>
                <p id="modalUserAgent" class="text-[0.7rem] text-slate-500 font-mono break-all"></p>
            </div>
        </div>
        <div class="mt-5 text-right">
            <button type="button" onclick="document.getElementById('detailModal').classList.add('hidden')" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-ink font-bold text-xs transition">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- Modal Purge Logs -->
<div id="purgeModal" class="fixed inset-0 z-50 bg-ink/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl ring-1 ring-slate-200">
        <h3 class="text-base font-extrabold text-ink">Bersihkan Riwayat Log</h3>
        <p class="text-xs text-warm-gray mt-1">Pilih rentang waktu catatan aktivitas yang ingin dibersihkan dari database:</p>

        <form method="POST" action="{{ route('admin.logs.purge') }}" class="mt-5 space-y-4">
            @csrf
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="days" value="30" checked class="text-loaction-600 focus:ring-loaction-500">
                    <div>
                        <span class="block text-xs font-bold text-ink">Hapus yang lebih lama dari 30 hari</span>
                        <span class="text-[0.65rem] text-slate-500">Menyimpan riwayat 1 bulan terakhir</span>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="radio" name="days" value="7" class="text-loaction-600 focus:ring-loaction-500">
                    <div>
                        <span class="block text-xs font-bold text-ink">Hapus yang lebih lama dari 7 hari</span>
                        <span class="text-[0.65rem] text-slate-500">Menyimpan riwayat 1 minggu terakhir</span>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-xl border border-rose-200 bg-rose-50/40 hover:bg-rose-50 cursor-pointer">
                    <input type="radio" name="days" value="0" class="text-rose-600 focus:ring-rose-500">
                    <div>
                        <span class="block text-xs font-bold text-rose-700">Hapus Semua Log</span>
                        <span class="text-[0.65rem] text-rose-500">Mengosongkan seluruh tabel riwayat audit</span>
                    </div>
                </label>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="document.getElementById('purgeModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-ink font-bold text-xs transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs transition shadow-md">
                    Bersihkan Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showLogDetail(properties, description, userAgent) {
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('modalProperties').innerText = JSON.stringify(properties, null, 2);
        document.getElementById('modalUserAgent').innerText = userAgent || 'Tidak ada data user agent.';
        document.getElementById('detailModal').classList.remove('hidden');
    }
</script>
@endsection

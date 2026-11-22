@extends('admin.layouts.app')

@section('title', 'Daftar Konsultasi')
@section('page_title', 'Intake Konsultasi & Leads')
@section('page_description', 'Kelola formulir masuk, status penanganan, dan hubungi klien langsung via WhatsApp')

@section('content')
    <!-- Status Filter Bar -->
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.consultations.index', array_merge(request()->except('status', 'page'), ['status' => 'all'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ (!request()->filled('status') || request('status') === 'all') ? 'bg-ink text-white shadow-sm' : 'bg-white text-warm-gray hover:bg-slate-100 ring-1 ring-slate-200' }}">
                Semua ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.consultations.index', array_merge(request()->except('status', 'page'), ['status' => 'pending'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') === 'pending' ? 'bg-amber-500 text-ink shadow-sm' : 'bg-white text-warm-gray hover:bg-amber-50 ring-1 ring-slate-200' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.consultations.index', array_merge(request()->except('status', 'page'), ['status' => 'processed'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') === 'processed' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-warm-gray hover:bg-emerald-50 ring-1 ring-slate-200' }}">
                Selesai ({{ $counts['processed'] }})
            </a>
            <a href="{{ route('admin.consultations.index', array_merge(request()->except('status', 'page'), ['status' => 'cancelled'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') === 'cancelled' ? 'bg-rose-600 text-white shadow-sm' : 'bg-white text-warm-gray hover:bg-rose-50 ring-1 ring-slate-200' }}">
                Dibatalkan ({{ $counts['cancelled'] }})
            </a>
        </div>

        <!-- Search input form -->
        <form method="GET" action="{{ route('admin.consultations.index') }}" class="flex items-center gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <input 
                type="text" 
                name="q" 
                placeholder="Cari nama, email, hp..." 
                value="{{ request('q') }}" 
                class="px-3.5 py-1.5 rounded-xl border border-slate-300 text-xs font-semibold focus:border-loaction-500 focus:ring-1 focus:ring-loaction-500 outline-none w-56 sm:w-64"
            >
            <button type="submit" class="px-3 py-1.5 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-bold text-xs transition">
                Cari
            </button>
            @if(request()->hasAny(['q', 'status', 'service_id']))
                <a href="{{ route('admin.consultations.index') }}" class="px-2 py-1.5 rounded-xl bg-slate-200 hover:bg-slate-300 text-xs text-ink font-bold transition" title="Reset filter">
                    ✕
                </a>
            @endif
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200/80 overflow-hidden">
        @if($consultations->isEmpty())
            <div class="text-center py-16 px-4 text-slate-400">
                <svg class="size-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                <p class="text-sm font-bold text-ink">Tidak ditemukan data konsultasi</p>
                <p class="text-xs text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau filter status Anda.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-extrabold text-[0.68rem]">
                            <th class="py-3.5 px-5">ID & Waktu</th>
                            <th class="py-3.5 px-5">Klien</th>
                            <th class="py-3.5 px-5">Layanan</th>
                            <th class="py-3.5 px-5">Metode / Jadwal</th>
                            <th class="py-3.5 px-5">Status</th>
                            <th class="py-3.5 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($consultations as $c)
                            <tr class="transition {{ $c->status === 'pending' ? 'bg-amber-50/40 hover:bg-amber-50' : 'hover:bg-slate-50/70' }}">
                                <td class="py-4 px-5 text-slate-400 font-mono text-[0.7rem]">
                                    #{{ $c->id }}
                                    <span class="block text-[0.65rem] text-slate-500">{{ $c->created_at->format('d/m/Y H:i') }}</span>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex items-center gap-2">
                                        @if($c->status === 'pending')
                                            <span class="size-2 rounded-full bg-amber-500 animate-pulse shrink-0" title="Menunggu Ditangani"></span>
                                        @endif
                                        <strong class="font-bold text-ink text-sm">{{ $c->name }}</strong>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-500 mt-0.5">
                                        <span class="font-mono text-[0.7rem]">{{ $c->phone }}</span>
                                        @if($c->email)
                                            <span class="text-slate-300">•</span>
                                            <span class="text-[0.7rem]">{{ $c->email }}</span>
                                        @endif
                                    </div>
                                    @if($c->notes)
                                        <p class="text-[0.68rem] text-slate-400 mt-1 line-clamp-1 italic">"{{ $c->notes }}"</p>
                                    @endif
                                </td>
                                <td class="py-4 px-5 font-semibold text-warm-gray">
                                    {{ $c->service?->title ?? '-' }}
                                </td>
                                <td class="py-4 px-5">
                                    <span class="inline-block px-2 py-0.5 rounded text-[0.65rem] font-bold uppercase tracking-wider {{ $c->session_type === 'online' ? 'bg-sky-100 text-sky-700' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ $c->session_type ?? 'TBA' }}
                                    </span>
                                    <span class="block text-[0.65rem] text-slate-500 mt-0.5 font-medium">{{ $c->preferred_time ?? '-' }}</span>
                                </td>
                                <td class="py-4 px-5">
                                    @if($c->status === 'processed')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.68rem] font-bold bg-emerald-100 text-emerald-800">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span> Selesai
                                        </span>
                                    @elseif($c->status === 'cancelled')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.68rem] font-bold bg-rose-100 text-rose-800">
                                            <span class="size-1.5 rounded-full bg-rose-500"></span> Dibatalkan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[0.68rem] font-bold bg-amber-100 text-amber-800">
                                            <span class="size-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="inline-flex items-center gap-1.5">
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $c->phone ?? '');
                                            if (str_starts_with($cleanPhone, '0')) {
                                                $cleanPhone = '62' . substr($cleanPhone, 1);
                                            }
                                            $waText = rawurlencode("Halo {$c->name}, kami dari Biro Psikologi LoAction mengonfirmasi permintaan konsultasi Anda mengenai layanan {$c->service?->title}.");
                                        @endphp
                                        @if($cleanPhone)
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-[0.68rem] transition inline-flex items-center gap-1 shadow-sm" title="Chat WhatsApp">
                                                WA
                                            </a>
                                        @endif

                                        <!-- Quick Status Toggle -->
                                        @if($c->status !== 'processed')
                                            <form method="POST" action="{{ route('admin.consultations.updateStatus', $c->id) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="processed">
                                                <button type="submit" class="px-2 py-1 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 font-bold text-[0.68rem] transition" title="Tandai Selesai">
                                                    ✓ Proses
                                                </button>
                                            </form>
                                        @endif

                                        <a href="{{ route('admin.consultations.show', $c->id) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-ink font-bold text-[0.68rem] transition">
                                            Detail
                                        </a>

                                        <form method="POST" action="{{ route('admin.consultations.destroy', $c->id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data konsultasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 rounded-lg text-slate-400 hover:text-rose-600 transition" title="Hapus">
                                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-5 py-4 border-t border-slate-100">
                {{ $consultations->links() }}
            </div>
        @endif
    </div>
@endsection

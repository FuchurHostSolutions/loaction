@extends('admin.layouts.app')

@section('title', 'Skema Uji Kompetensi')
@section('page_title', 'Skema Uji Kompetensi')
@section('page_description', 'Kelola peran dan deskripsi asesmen SDM pada Beranda')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <p class="text-xs text-warm-gray">Total {{ $competencies->count() }} skema kompetensi</p>
        <a href="{{ route('admin.competencies.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-bold text-xs shadow-sm transition">
            + Tambah Skema Baru
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200/80 overflow-hidden">
        {{-- Mobile swipe hint --}}
        <div class="sm:hidden px-4 py-2 bg-slate-50 border-b border-slate-200/70 text-[0.68rem] text-slate-500 font-semibold flex items-center justify-between">
            <span class="flex items-center gap-1.5">
                <svg class="size-3.5 text-loaction-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                Geser tabel untuk melihat kolom lainnya
            </span>
            <span class="text-[0.65rem] text-slate-400 font-mono">swipe &rarr;</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs min-w-[660px]">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-extrabold text-[0.68rem] whitespace-nowrap">
                        <th class="py-3.5 px-5">Urutan</th>
                        <th class="py-3.5 px-5">Icon</th>
                        <th class="py-3.5 px-5">Peran / Jenjang</th>
                        <th class="py-3.5 px-5">Deskripsi Asesmen</th>
                        <th class="py-3.5 px-5">Status</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($competencies as $c)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="py-4 px-5 font-mono text-slate-400 font-bold whitespace-nowrap">
                                #{{ $c->sort_order }}
                            </td>
                            <td class="py-4 px-5 text-xl whitespace-nowrap">
                                {{ $c->icon ?: '👤' }}
                            </td>
                            <td class="py-4 px-5 font-bold text-ink text-sm whitespace-nowrap">
                                {{ $c->role }}
                            </td>
                            <td class="py-4 px-5 text-warm-gray max-w-sm">
                                <p class="text-xs leading-relaxed line-clamp-2">{{ $c->text }}</p>
                            </td>
                            <td class="py-4 px-5 whitespace-nowrap">
                                @if($c->is_active)
                                    <span class="px-2 py-0.5 rounded text-[0.65rem] font-bold bg-emerald-100 text-emerald-800">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[0.65rem] font-bold bg-slate-200 text-slate-600">Nonaktif</span>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-right whitespace-nowrap space-x-2">
                                <a href="{{ route('admin.competencies.edit', $c->id) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-bold text-ink text-[0.7rem] transition">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.competencies.destroy', $c->id) }}" class="inline" onsubmit="return confirm('Hapus skema kompetensi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1 rounded-lg bg-rose-50 hover:bg-rose-100 font-bold text-rose-700 text-[0.7rem] transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

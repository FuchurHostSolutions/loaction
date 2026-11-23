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
        {{-- Mobile Card List (sm:hidden) --}}
        <div class="sm:hidden divide-y divide-slate-100">
            @foreach($competencies as $c)
                <div class="p-4 space-y-3">
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">{{ $c->icon ?: '👤' }}</span>
                            <div>
                                <span class="text-[0.65rem] font-mono font-bold text-slate-400">Urutan #{{ $c->sort_order }}</span>
                                <h3 class="font-bold text-ink text-sm">{{ $c->role }}</h3>
                            </div>
                        </div>
                        @if($c->is_active)
                            <span class="px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold bg-emerald-100 text-emerald-800 shrink-0">Aktif</span>
                        @else
                            <span class="px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold bg-slate-200 text-slate-600 shrink-0">Nonaktif</span>
                        @endif
                    </div>
                    @if($c->text)
                        <p class="text-xs text-warm-gray leading-relaxed">{{ $c->text }}</p>
                    @endif
                    <div class="flex items-center justify-end gap-1.5 pt-1 border-t border-slate-50 text-xs">
                        <a href="{{ route('admin.competencies.edit', $c->id) }}" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 font-bold text-ink text-xs transition">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.competencies.destroy', $c->id) }}" class="inline" onsubmit="return confirm('Hapus skema kompetensi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Desktop Table View (hidden sm:block) --}}
        <div class="hidden sm:block overflow-x-auto">
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

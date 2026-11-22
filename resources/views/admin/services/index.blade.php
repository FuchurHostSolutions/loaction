@extends('admin.layouts.app')

@section('title', 'Kelola Layanan')
@section('page_title', 'Layanan Psikologi')
@section('page_description', 'Kelola area layanan utama yang ditampilkan pada website')

@section('content')
    <div class="flex items-center justify-between gap-4 mb-6">
        <p class="text-xs text-warm-gray">Total {{ $services->count() }} layanan aktif</p>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-bold text-xs shadow-sm transition">
            + Tambah Layanan Baru
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200/80 overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-extrabold text-[0.68rem]">
                    <th class="py-3.5 px-5">Icon</th>
                    <th class="py-3.5 px-5">Judul Layanan</th>
                    <th class="py-3.5 px-5">Deskripsi Ringkas</th>
                    <th class="py-3.5 px-5">Sub-Item</th>
                    <th class="py-3.5 px-5">Status</th>
                    <th class="py-3.5 px-5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($services as $s)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-5 text-xl">
                            {{ $s->icon ?: '✨' }}
                        </td>
                        <td class="py-4 px-5 font-bold text-ink text-sm">
                            {{ $s->title }}
                            <span class="block text-[0.7rem] text-slate-400 font-normal">Slug: {{ $s->slug }}</span>
                        </td>
                        <td class="py-4 px-5 text-warm-gray max-w-xs">
                            <p class="line-clamp-2 text-xs leading-relaxed">{{ $s->description }}</p>
                        </td>
                        <td class="py-4 px-5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                {{ $s->items->count() }} Item
                            </span>
                        </td>
                        <td class="py-4 px-5">
                            @if($s->is_active)
                                <span class="px-2 py-0.5 rounded text-[0.65rem] font-bold bg-emerald-100 text-emerald-800">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[0.65rem] font-bold bg-slate-200 text-slate-600">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-5 text-right space-x-2">
                            <a href="{{ route('admin.services.edit', $s->id) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-bold text-ink text-[0.7rem] transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.services.destroy', $s->id) }}" class="inline" onsubmit="return confirm('Hapus layanan ini?');">
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
@endsection

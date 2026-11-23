@extends('admin.layouts.app')

@section('title', 'Kelola Postingan & Artikel')
@section('page_title', 'Artikel & Postingan')
@section('page_description', 'Kelola konten edukasi psikologi, tips kesehatan mental, dan pengumuman kegiatan')

@section('content')
    <!-- Header Actions & Filters -->
    <div class="mb-6 space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs text-warm-gray">Total <strong>{{ $posts->total() }}</strong> artikel terdaftar</p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-sm shadow-md shadow-loaction-500/20 transition active:scale-95">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span>Tulis Artikel Baru</span>
            </a>
        </div>

        <!-- Filter Card -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm ring-1 ring-slate-200/80">
            <form method="GET" action="{{ route('admin.posts.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <!-- Search -->
                <div>
                    <label for="q" class="block text-[0.7rem] font-bold uppercase tracking-wider text-warm-gray mb-1">Cari Judul / Konten</label>
                    <input 
                        type="text" 
                        name="q" 
                        id="q" 
                        value="{{ request('q') }}" 
                        placeholder="Ketik kata kunci..." 
                        class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-1 focus:ring-loaction-500 text-xs font-semibold outline-none"
                    >
                </div>

                <!-- Category -->
                <div>
                    <label for="kategori" class="block text-[0.7rem] font-bold uppercase tracking-wider text-warm-gray mb-1">Kategori</label>
                    <select 
                        name="kategori" 
                        id="kategori" 
                        class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-1 focus:ring-loaction-500 text-xs font-semibold outline-none bg-white"
                    >
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('kategori') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-[0.7rem] font-bold uppercase tracking-wider text-warm-gray mb-1">Status Publikasi</label>
                    <select 
                        name="status" 
                        id="status" 
                        class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-1 focus:ring-loaction-500 text-xs font-semibold outline-none bg-white"
                    >
                        <option value="">Semua Status</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published (Tayang)</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft (Konsep)</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-ink text-white text-xs font-bold hover:bg-slate-800 transition">
                        Filter
                    </button>
                    @if(request()->hasAny(['q', 'kategori', 'status']))
                        <a href="{{ route('admin.posts.index') }}" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200/80 overflow-hidden">
        @if($posts->isEmpty())
            <div class="p-12 text-center text-slate-400">
                <svg class="size-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                <p class="text-sm font-semibold">Tidak ada postingan yang sesuai kriteria.</p>
                <a href="{{ route('admin.posts.create') }}" class="inline-block mt-3 text-xs font-bold text-loaction-600 hover:underline">Tulis artikel sekarang &rarr;</a>
            </div>
        @else
            {{-- Mobile swipe hint --}}
            <div class="sm:hidden px-4 py-2 bg-slate-50 border-b border-slate-200/70 text-[0.68rem] text-slate-500 font-semibold flex items-center justify-between">
                <span class="flex items-center gap-1.5">
                    <svg class="size-3.5 text-loaction-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                    Geser tabel untuk melihat status & aksi
                </span>
                <span class="text-[0.65rem] text-slate-400 font-mono">swipe &rarr;</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs min-w-[700px]">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50/70 text-slate-400 uppercase tracking-wider font-bold whitespace-nowrap">
                            <th class="py-3.5 px-4">Artikel</th>
                            <th class="py-3.5 px-4">Kategori</th>
                            <th class="py-3.5 px-4 text-center">Dibaca</th>
                            <th class="py-3.5 px-4">Status & Waktu</th>
                            <th class="py-3.5 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($posts as $post)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-4">
                                    <div class="flex items-start gap-3 max-w-md">
                                        <img 
                                            src="{{ $post->cover_image_url }}" 
                                            alt="{{ $post->title }}" 
                                            class="size-14 rounded-xl object-cover shrink-0 ring-1 ring-slate-200 shadow-sm"
                                            loading="lazy"
                                        >
                                        <div class="min-w-0">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="font-bold text-ink hover:text-loaction-600 text-sm line-clamp-2 transition leading-snug">
                                                {{ $post->title }}
                                            </a>
                                            <div class="flex items-center gap-2 text-[0.68rem] text-slate-400 mt-1">
                                                <span>Oleh {{ $post->author_name }}</span>
                                                <span>&bull;</span>
                                                <span>{{ $post->reading_time }} mnt baca</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 font-semibold text-slate-600 whitespace-nowrap">
                                    <span class="inline-block px-2.5 py-1 rounded-full text-[0.65rem] font-bold bg-loaction-50 text-loaction-700 ring-1 ring-loaction-200">
                                        {{ $post->category }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center font-mono font-bold text-slate-600 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1">
                                        <svg class="size-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        {{ number_format($post->views_count) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    @if($post->is_published)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold bg-emerald-100 text-emerald-800">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span> Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold bg-slate-100 text-slate-700">
                                            <span class="size-1.5 rounded-full bg-slate-400"></span> Draft
                                        </span>
                                    @endif
                                    <span class="block text-[0.68rem] text-slate-400 mt-1">
                                        {{ $post->published_at ? $post->published_at->format('d M Y, H:i') : 'Belum dijadwalkan' }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1.5">
                                        @if($post->is_published)
                                            <a 
                                                href="{{ route('posts.show', $post->slug) }}" 
                                                target="_blank" 
                                                class="p-2 rounded-lg text-slate-500 hover:text-loaction-600 hover:bg-slate-100 transition" 
                                                title="Lihat Pratinjau di Web"
                                            >
                                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                            </a>
                                        @endif

                                        <a 
                                            href="{{ route('admin.posts.edit', $post->id) }}" 
                                            class="p-2 rounded-lg text-slate-500 hover:text-loaction-600 hover:bg-slate-100 transition" 
                                            title="Edit Artikel"
                                        >
                                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel \'{{ addslashes($post->title) }}\'?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition" title="Hapus Artikel">
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

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Artikel')
@section('page_title', 'Edit Artikel')
@section('page_description', 'Perbarui konten, kategori, atau status publikasi artikel')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-loaction-600 transition">
                &larr; Kembali ke Daftar Artikel
            </a>

            @if($post->is_published)
                <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-loaction-600 hover:text-loaction-700 bg-loaction-50 hover:bg-loaction-100 px-3.5 py-1.5 rounded-xl transition">
                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                    <span>Lihat di Website &rarr;</span>
                </a>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Main Info Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-6">
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Judul Artikel <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title', $post->title) }}" 
                        required 
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-base font-bold outline-none transition"
                    >
                    @error('title')
                        <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Slug URL (Permalink)
                        </label>
                        <input 
                            type="text" 
                            name="slug" 
                            id="slug" 
                            value="{{ old('slug', $post->slug) }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-mono outline-none transition"
                        >
                        @error('slug')
                            <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="category" 
                            id="category" 
                            required 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition bg-white"
                        >
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category', $post->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="excerpt" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Ringkasan Singkat (Excerpt)
                    </label>
                    <textarea 
                        name="excerpt" 
                        id="excerpt" 
                        rows="2" 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cover Image Preview & Replacement -->
                <div class="border-t border-slate-100 pt-5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-2">
                        Gambar Sampul
                    </label>

                    <div class="flex items-center gap-4 mb-4 p-3 bg-slate-50 rounded-2xl border border-slate-200">
                        <img 
                            src="{{ $post->cover_image_url }}" 
                            alt="{{ $post->title }}" 
                            class="size-16 rounded-xl object-cover ring-1 ring-slate-300 shadow-sm"
                        >
                        <div class="text-xs">
                            <span class="font-bold text-ink block">Cover Saat Ini:</span>
                            <span class="text-slate-500 text-[0.7rem] break-all">{{ $post->cover_image ?: 'Default ilustrasi kategori' }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="block text-xs font-bold text-ink mb-1.5">Ganti dengan File Baru</span>
                            <input 
                                type="file" 
                                name="cover_image_file" 
                                id="cover_image_file" 
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                                class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-loaction-50 file:text-loaction-700 hover:file:bg-loaction-100"
                            >
                            <p class="mt-1.5 text-[0.65rem] text-slate-400">Kosongkan jika tidak ingin mengganti gambar.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="block text-xs font-bold text-ink mb-1.5">Atau Gunakan URL Gambar</span>
                            <input 
                                type="url" 
                                name="cover_image_url" 
                                id="cover_image_url" 
                                value="{{ old('cover_image_url', Str::startsWith($post->cover_image, ['http://', 'https://']) ? $post->cover_image : '') }}" 
                                placeholder="https://images.unsplash.com/..." 
                                class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-medium outline-none"
                            >
                        </div>
                    </div>
                </div>

                <!-- Content Body -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="content" class="block text-xs font-bold uppercase tracking-wider text-warm-gray">
                            Isi Artikel <span class="text-red-500">*</span>
                        </label>
                        <span class="text-[0.68rem] text-slate-400">Mendukung format HTML standar (&lt;p&gt;, &lt;h3&gt;, &lt;ul&gt;, &lt;blockquote&gt;)</span>
                    </div>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="15" 
                        required 
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 font-sans text-sm leading-relaxed outline-none transition"
                    >{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Publishing Meta Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-4">
                <h3 class="text-sm font-extrabold text-ink">Metadata & Publikasi</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="author_name" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Nama Penulis / Kontributor
                        </label>
                        <input 
                            type="text" 
                            name="author_name" 
                            id="author_name" 
                            value="{{ old('author_name', $post->author_name) }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-bold outline-none"
                        >
                    </div>

                    <div>
                        <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Tanggal Publikasi
                        </label>
                        <input 
                            type="datetime-local" 
                            name="published_at" 
                            id="published_at" 
                            value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-medium outline-none"
                        >
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_published" 
                            id="is_published" 
                            value="1" 
                            {{ old('is_published', $post->is_published) ? 'checked' : '' }} 
                            class="size-5 rounded border-slate-300 text-loaction-500 focus:ring-loaction-400 cursor-pointer"
                        >
                        <div>
                            <span class="block text-xs font-bold text-ink">Publikasikan ke Website</span>
                            <span class="block text-[0.68rem] text-slate-400">Jika tidak dicentang, artikel disimpan sebagai Draf</span>
                        </div>
                    </label>

                    <button type="submit" class="px-6 py-3 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-sm shadow-lg shadow-loaction-500/25 transition active:scale-95">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

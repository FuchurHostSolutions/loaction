@extends('admin.layouts.app')

@section('title', 'Tulis Artikel Baru')
@section('page_title', 'Tulis Artikel Baru')
@section('page_description', 'Publikasikan artikel edukasi, tips psikologi, atau berita kegiatan LoAction')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-loaction-600 transition">
                &larr; Kembali ke Daftar Artikel
            </a>
        </div>

        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

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
                        value="{{ old('title') }}" 
                        required 
                        placeholder="Contoh: Mengenal Burnout vs Kelelahan Kerja Biasa" 
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
                            value="{{ old('slug') }}" 
                            placeholder="mengenal-burnout-vs-kelelahan-kerja-biasa" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-mono outline-none transition"
                        >
                        <p class="mt-1 text-[0.68rem] text-slate-400">Otomatis diisi dari judul jika dikosongkan.</p>
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
                                <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
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
                        placeholder="Deskripsi singkat artikel untuk preview kartu dan meta tag mesin pencari..." 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >{{ old('excerpt') }}</textarea>
                    <p class="mt-1 text-[0.68rem] text-slate-400">Maksimal 600 karakter. Jika dikosongkan, akan diambil dari awal isi artikel.</p>
                    @error('excerpt')
                        <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cover Image Selection -->
                <div class="border-t border-slate-100 pt-5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-2">
                        Gambar Sampul (Cover Thumbnail)
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="block text-xs font-bold text-ink mb-1.5">Opsi 1: Upload File Gambar</span>
                            <input 
                                type="file" 
                                name="cover_image_file" 
                                id="cover_image_file" 
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                                class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-loaction-50 file:text-loaction-700 hover:file:bg-loaction-100"
                            >
                            <p class="mt-1.5 text-[0.65rem] text-slate-400">Format: JPG, PNG, WebP (maks. 3MB)</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="block text-xs font-bold text-ink mb-1.5">Opsi 2: URL Gambar Eksternal</span>
                            <input 
                                type="url" 
                                name="cover_image_url" 
                                id="cover_image_url" 
                                value="{{ old('cover_image_url') }}" 
                                placeholder="https://images.unsplash.com/..." 
                                class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-medium outline-none"
                            >
                            <p class="mt-1.5 text-[0.65rem] text-slate-400">Jika dikosongkan, otomatis menggunakan cover ilustrasi sesuai kategori.</p>
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
                        placeholder="Tulis artikel di sini. Anda dapat memisahkan paragraf secara langsung atau menggunakan tag HTML..." 
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 font-sans text-sm leading-relaxed outline-none transition"
                    >{{ old('content') }}</textarea>
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
                            value="{{ old('author_name', 'Tim Psikolog LoAction') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-bold outline-none"
                        >
                    </div>

                    <div>
                        <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Jadwal Tanggal Terbit
                        </label>
                        <input 
                            type="datetime-local" 
                            name="published_at" 
                            id="published_at" 
                            value="{{ old('published_at') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 text-xs font-medium outline-none"
                        >
                        <p class="mt-1 text-[0.68rem] text-slate-400">Biarkan kosong untuk langsung tayang sekarang saat dipublikasikan.</p>
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_published" 
                            id="is_published" 
                            value="1" 
                            {{ old('is_published', '1') == '1' ? 'checked' : '' }} 
                            class="size-5 rounded border-slate-300 text-loaction-500 focus:ring-loaction-400 cursor-pointer"
                        >
                        <div>
                            <span class="block text-xs font-bold text-ink">Publikasikan Langsung ke Website</span>
                            <span class="block text-[0.68rem] text-slate-400">Jika tidak dicentang, artikel disimpan sebagai Draf</span>
                        </div>
                    </label>

                    <button type="submit" class="px-6 py-3 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-sm shadow-lg shadow-loaction-500/25 transition active:scale-95">
                        Simpan & Terbitkan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function() {
                    if (!slugInput.dataset.touched) {
                        slugInput.value = titleInput.value
                            .toLowerCase()
                            .replace(/[^\w\s-]/g, '')
                            .replace(/[\s_-]+/g, '-')
                            .replace(/^-+|-+$/g, '');
                    }
                });

                slugInput.addEventListener('input', function() {
                    slugInput.dataset.touched = 'true';
                });
            }
        });
    </script>
@endsection

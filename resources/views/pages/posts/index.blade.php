@extends('layouts.app')

@section('title', 'Artikel & Edukasi Psikologi')
@section('meta_description', 'Kumpulan artikel dan insight psikologi terapan, kesehatan mental, tumbuh kembang anak, asesmen SDM, dan uji kompetensi BNSP oleh Biro Psikologi LoAction.')

@section('content')
    <!-- ═══ HERO SECTION ═══ -->
    <section class="relative overflow-hidden bg-gradient-to-b from-loaction-50/70 via-white to-white pt-16 pb-12 sm:pt-24 sm:pb-16">
        <div class="section-container relative z-10 text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-loaction-100/80 px-4 py-1.5 text-xs font-extrabold uppercase tracking-widest text-loaction-700 ring-1 ring-loaction-300/60 mb-5">
                <span class="size-1.5 rounded-full bg-loaction-500 animate-pulse"></span>
                Insight & Edukasi
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-ink tracking-tight max-w-3xl mx-auto leading-tight">
                Pahami Diri, Tumbuh Lebih Baik Bersama <span class="text-loaction-500">LoAction</span>
            </h1>
            <p class="mt-4 text-sm sm:text-base text-warm-gray max-w-2xl mx-auto leading-relaxed">
                Kumpulan tulisan, tips praktis kesehatan mental, panduan pola asuh anak, dinamika organisasi, dan wawasan uji kompetensi profesi dari para psikolog dan asesor kami.
            </p>

            <!-- Search Bar -->
            <div class="mt-8 max-w-xl mx-auto">
                <form method="GET" action="{{ route('posts.index') }}" class="relative flex items-center shadow-lg shadow-loaction-500/5 rounded-2xl bg-white ring-1 ring-slate-200 focus-within:ring-2 focus-within:ring-loaction-500 transition">
                    <div class="pl-4 text-slate-400">
                        <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    </div>
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ request('q') }}" 
                        placeholder="Cari topik artikel (misal: burnout, minat bakat, BNSP)..." 
                        class="w-full py-3.5 px-3 text-xs sm:text-sm font-semibold text-ink outline-none bg-transparent"
                    >
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <button type="submit" class="m-1.5 px-5 py-2 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-xs transition">
                        Cari
                    </button>
                </form>
            </div>

            <!-- Category Pills Filter -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-2">
                <a 
                    href="{{ route('posts.index', array_filter(['q' => request('q')])) }}" 
                    class="px-4 py-2 rounded-full text-xs font-extrabold transition {{ $activeCategory === 'Semua' ? 'bg-loaction-500 text-white shadow-md shadow-loaction-500/25' : 'bg-white text-slate-600 hover:bg-slate-100 ring-1 ring-slate-200' }}"
                >
                    Semua ({{ $totalPublished }})
                </a>
                @foreach($categories as $cat)
                    <a 
                        href="{{ route('posts.index', array_filter(['kategori' => $cat, 'q' => request('q')])) }}" 
                        class="px-4 py-2 rounded-full text-xs font-extrabold transition {{ $activeCategory === $cat ? 'bg-loaction-500 text-white shadow-md shadow-loaction-500/25' : 'bg-white text-slate-600 hover:bg-slate-100 ring-1 ring-slate-200' }}"
                    >
                        {{ $cat }} ({{ $categoryCounts[$cat] ?? 0 }})
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══ CONTENT SECTION ═══ -->
    <section class="py-12 sm:py-16 bg-white">
        <div class="section-container">
            @if($search)
                <div class="mb-8 flex items-center justify-between p-4 rounded-2xl bg-loaction-50/70 border border-loaction-200 text-xs sm:text-sm">
                    <p class="font-semibold text-ink">
                        Menampilkan hasil pencarian untuk: <strong class="text-loaction-600 font-extrabold">"{{ $search }}"</strong>
                    </p>
                    <a href="{{ route('posts.index') }}" class="font-bold text-loaction-600 hover:underline">Hapus Filter &times;</a>
                </div>
            @endif

            <!-- Featured Post (Hero card on first page) -->
            @if($featuredPost)
                <div class="mb-14">
                    <div class="relative group rounded-3xl overflow-hidden bg-slate-900 shadow-xl ring-1 ring-slate-200 grid lg:grid-cols-12 items-center">
                        <div class="lg:col-span-7 h-64 sm:h-80 lg:h-full relative overflow-hidden">
                            <img 
                                src="{{ $featuredPost->cover_image_url }}" 
                                alt="{{ $featuredPost->title }}" 
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent lg:hidden"></div>
                        </div>
                        <div class="lg:col-span-5 p-6 sm:p-10 lg:p-12 text-white flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="px-3 py-1 rounded-full text-[0.65rem] font-extrabold uppercase tracking-wider bg-loaction-500 text-white">
                                        {{ $featuredPost->category }}
                                    </span>
                                    <span class="text-xs text-slate-400">&bull; {{ $featuredPost->reading_time }} mnt baca</span>
                                </div>
                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black tracking-tight leading-snug group-hover:text-loaction-400 transition">
                                    <a href="{{ route('posts.show', $featuredPost->slug) }}">
                                        {{ $featuredPost->title }}
                                    </a>
                                </h2>
                                <p class="mt-3 text-xs sm:text-sm text-slate-300 line-clamp-3 leading-relaxed">
                                    {{ $featuredPost->excerpt }}
                                </p>
                            </div>

                            <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                                <div class="text-xs">
                                    <span class="block font-bold text-white">{{ $featuredPost->author_name }}</span>
                                    <span class="text-[0.68rem] text-slate-400">{{ $featuredPost->published_at?->format('d F Y') }}</span>
                                </div>
                                <a href="{{ route('posts.show', $featuredPost->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-loaction-400 group-hover:text-white transition">
                                    <span>Baca Artikel</span>
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Post Grid -->
            @if($posts->isEmpty())
                <div class="py-16 text-center text-slate-400">
                    <svg class="size-16 mx-auto mb-4 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    <h3 class="text-base font-bold text-ink">Belum Ada Artikel yang Ditemukan</h3>
                    <p class="mt-1 text-xs text-warm-gray">Coba gunakan kata kunci pencarian lain atau pilih kategori yang berbeda.</p>
                    <a href="{{ route('posts.index') }}" class="inline-block mt-4 text-xs font-bold text-loaction-600 hover:underline">&larr; Kembali ke Semua Artikel</a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="group bg-white rounded-3xl overflow-hidden ring-1 ring-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <!-- Thumbnail -->
                                <a href="{{ route('posts.show', $post->slug) }}" class="block relative aspect-[16/10] overflow-hidden bg-slate-100">
                                    <img 
                                        src="{{ $post->cover_image_url }}" 
                                        alt="{{ $post->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[0.65rem] font-extrabold uppercase tracking-wider bg-white/95 backdrop-blur text-loaction-600 shadow-sm">
                                        {{ $post->category }}
                                    </span>
                                </a>

                                <!-- Content -->
                                <div class="p-6">
                                    <div class="flex items-center gap-2 text-[0.7rem] text-slate-400 mb-2.5">
                                        <span>{{ $post->published_at?->format('d M Y') }}</span>
                                        <span>&bull;</span>
                                        <span>{{ $post->reading_time }} mnt baca</span>
                                    </div>
                                    <h3 class="text-lg font-black text-ink leading-snug group-hover:text-loaction-600 transition">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="mt-2.5 text-xs text-warm-gray line-clamp-3 leading-relaxed">
                                        {{ $post->excerpt }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                                <span class="font-bold text-slate-500 text-[0.72rem]">{{ $post->author_name }}</span>
                                <a href="{{ route('posts.show', $post->slug) }}" class="font-extrabold text-loaction-600 group-hover:translate-x-0.5 transition inline-flex items-center gap-1">
                                    <span>Baca</span>
                                    <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>

    <!-- ═══ BOTTOM CTA BANNER ═══ -->
    <section class="py-16 bg-gradient-to-br from-loaction-500 to-loaction-600 text-white relative overflow-hidden">
        <div class="section-container relative z-10 text-center">
            <h2 class="text-2xl sm:text-4xl font-black tracking-tight max-w-2xl mx-auto">
                Butuh Ruang Cerita atau Pendampingan Psikologis Terpercaya?
            </h2>
            <p class="mt-3 text-sm sm:text-base text-white/90 max-w-xl mx-auto">
                Konsultasikan kendala emosi, minat karir, atau kebutuhan uji kompetensi Anda bersama tim profesional LoAction.
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('kontak') }}" class="rounded-full bg-white px-7 py-3.5 text-xs font-black uppercase tracking-wider text-loaction-600 shadow-xl transition hover:-translate-y-0.5 hover:bg-loaction-50">
                    Jadwalkan Konsultasi Gratis
                </a>
                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="rounded-full bg-ink/30 px-6 py-3.5 text-xs font-bold text-white ring-1 ring-white/30 backdrop-blur transition hover:bg-ink/50">
                    Tanya Admin via WhatsApp &rarr;
                </a>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt ?: Str::limit(strip_tags($post->content), 155))
@section('og_image', $post->cover_image_url)

@section('content')
    <!-- ═══ BREADCRUMB ═══ -->
    <div class="bg-slate-50 border-b border-slate-200/80 py-3.5">
        <div class="section-container">
            <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 overflow-x-auto whitespace-nowrap">
                <a href="{{ route('home') }}" class="hover:text-loaction-600 transition">Beranda</a>
                <span>/</span>
                <a href="{{ route('posts.index') }}" class="hover:text-loaction-600 transition">Artikel</a>
                <span>/</span>
                <a href="{{ route('posts.index', ['kategori' => $post->category]) }}" class="hover:text-loaction-600 transition text-loaction-600">{{ $post->category }}</a>
                <span>/</span>
                <span class="text-ink truncate max-w-xs sm:max-w-md">{{ $post->title }}</span>
            </nav>
        </div>
    </div>

    <!-- ═══ ARTICLE DETAIL ═══ -->
    <article class="py-12 sm:py-16 bg-white">
        <div class="section-container max-w-4xl">
            <!-- Article Header -->
            <header class="text-center max-w-3xl mx-auto mb-10">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <a href="{{ route('posts.index', ['kategori' => $post->category]) }}" class="px-3.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider bg-loaction-50 text-loaction-700 ring-1 ring-loaction-200 hover:bg-loaction-100 transition">
                        {{ $post->category }}
                    </a>
                    <span class="text-xs text-slate-400">&bull;</span>
                    <span class="text-xs font-semibold text-slate-500">{{ $post->reading_time }} menit baca</span>
                    <span class="text-xs text-slate-400">&bull;</span>
                    <span class="text-xs font-semibold text-slate-500">{{ number_format($post->views_count) }} kali dibaca</span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-ink tracking-tight leading-tight">
                    {{ $post->title }}
                </h1>

                <!-- Author info -->
                <div class="mt-6 flex items-center justify-center gap-3">
                    <div class="size-10 rounded-full bg-loaction-500 text-white font-bold text-sm flex items-center justify-center ring-2 ring-loaction-100 shadow-sm">
                        {{ mb_substr($post->author_name, 0, 1) }}
                    </div>
                    <div class="text-left text-xs">
                        <span class="block font-bold text-ink">{{ $post->author_name }}</span>
                        <span class="text-slate-400">Diterbitkan pada {{ $post->published_at?->format('d F Y') }}</span>
                    </div>
                </div>
            </header>

            <!-- Featured Cover Image -->
            <div class="mb-12 rounded-3xl overflow-hidden shadow-xl ring-1 ring-slate-200 aspect-[16/9] bg-slate-100">
                <img 
                    src="{{ $post->cover_image_url }}" 
                    alt="{{ $post->title }}" 
                    class="w-full h-full object-cover"
                >
            </div>

            <!-- Content Area -->
            <div class="prose prose-slate max-w-none prose-headings:font-black prose-headings:text-ink prose-p:text-warm-gray prose-p:leading-relaxed prose-p:text-base prose-li:text-warm-gray prose-blockquote:border-l-4 prose-blockquote:border-loaction-500 prose-blockquote:bg-loaction-50/60 prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:rounded-r-2xl prose-blockquote:text-ink prose-blockquote:font-semibold prose-blockquote:italic">
                {!! $post->content !!}
            </div>

            <!-- Share Buttons & Copy Link -->
            <div class="mt-12 pt-8 border-t border-slate-200">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-warm-gray">Bagikan Artikel Ini:</span>
                    <div class="flex flex-wrap items-center gap-2">
                        @php
                            $shareUrl = rawurlencode(url()->current());
                            $shareTitle = rawurlencode($post->title . ' - Biro Psikologi LoAction');
                        @endphp

                        <!-- WhatsApp -->
                        <a 
                            href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}" 
                            target="_blank" 
                            rel="noopener" 
                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs transition"
                        >
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span>WhatsApp</span>
                        </a>

                        <!-- Twitter/X -->
                        <a 
                            href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}" 
                            target="_blank" 
                            rel="noopener" 
                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-black text-white font-bold text-xs transition"
                        >
                            <svg class="size-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            <span>X / Twitter</span>
                        </a>

                        <!-- Copy Link -->
                        <button 
                            type="button" 
                            id="copyLinkBtn" 
                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition"
                        >
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                            <span id="copyLinkText">Salin Tautan</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Author Profile Card -->
            <div class="mt-12 p-6 sm:p-8 rounded-3xl bg-slate-50 border border-slate-200/80 flex flex-col sm:flex-row items-center sm:items-start gap-5">
                <div class="size-16 rounded-2xl bg-gradient-to-br from-loaction-500 to-loaction-600 text-white font-black text-2xl flex items-center justify-center shrink-0 shadow-md">
                    {{ mb_substr($post->author_name, 0, 1) }}
                </div>
                <div>
                    <span class="text-[0.65rem] font-extrabold uppercase tracking-wider text-loaction-600 block mb-1">Tentang Kontributor</span>
                    <h3 class="text-base font-bold text-ink">{{ $post->author_name }}</h3>
                    <p class="mt-1.5 text-xs text-warm-gray leading-relaxed">
                        Tulisan ini disusun oleh tim profesional Biro Psikologi LoAction yang berpengalaman dalam layanan psikologi terapan, asesmen pendidikan, psikotes industri-organisasi, dan uji kompetensi profesi sejak 2017 dengan prinsip <em>Handle with Care</em>.
                    </p>
                </div>
            </div>

            <!-- Interactive Consultation Banner -->
            <div class="mt-12 rounded-3xl bg-gradient-to-br from-loaction-500 to-loaction-600 p-8 sm:p-10 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <span class="inline-block px-3 py-1 rounded-full text-[0.65rem] font-extrabold uppercase tracking-wider bg-white/20 text-white mb-3">
                        Layanan Pendampingan
                    </span>
                    <h3 class="text-xl sm:text-2xl font-black tracking-tight">
                        Butuh Diskusi Lebih Lanjut Seputar Topik Ini?
                    </h3>
                    <p class="mt-2 text-xs sm:text-sm text-white/90 max-w-xl">
                        Jangan ragu untuk mengonsultasikan kendala atau kebutuhan Anda. Kami siap mendengarkan dan merancang solusi psikologi yang tepat dan personal untuk Anda.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('kontak') }}" class="rounded-full bg-white px-6 py-2.5 text-xs font-extrabold uppercase tracking-wider text-loaction-600 shadow-md hover:bg-loaction-50 transition">
                            Konsultasikan Sekarang
                        </a>
                        <a 
                            href="{{ count($whatsappNumbers) > 1 ? 'javascript:void(0)' : $whatsappUrl }}" 
                            @if(count($whatsappNumbers) > 1) 
                                onclick="toggleWaMultiPopup(event)" 
                            @else 
                                target="_blank" 
                                rel="noopener" 
                            @endif
                            class="rounded-full bg-ink/30 px-5 py-2.5 text-xs font-bold text-white ring-1 ring-white/30 hover:bg-ink/50 transition cursor-pointer"
                        >
                            Chat WhatsApp &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- ═══ RELATED POSTS ═══ -->
    @if($relatedPosts->isNotEmpty())
        <section class="py-16 bg-slate-50 border-t border-slate-200">
            <div class="section-container">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-loaction-600">Rekomendasi Lainnya</span>
                        <h2 class="text-xl sm:text-2xl font-black text-ink tracking-tight mt-0.5">Artikel Terkait</h2>
                    </div>
                    <a href="{{ route('posts.index') }}" class="text-xs font-bold text-loaction-600 hover:underline">
                        Lihat Semua Artikel &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $rel)
                        <article class="group bg-white rounded-3xl overflow-hidden ring-1 ring-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col justify-between">
                            <div>
                                <a href="{{ route('posts.show', $rel->slug) }}" class="block aspect-[16/10] overflow-hidden bg-slate-100">
                                    <img 
                                        src="{{ $rel->cover_image_url }}" 
                                        alt="{{ $rel->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </a>
                                <div class="p-5">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[0.62rem] font-extrabold uppercase tracking-wider bg-loaction-50 text-loaction-600 mb-2">
                                        {{ $rel->category }}
                                    </span>
                                    <h3 class="font-bold text-sm text-ink leading-snug group-hover:text-loaction-600 transition line-clamp-2">
                                        <a href="{{ route('posts.show', $rel->slug) }}">
                                            {{ $rel->title }}
                                        </a>
                                    </h3>
                                    <p class="mt-2 text-[0.72rem] text-warm-gray line-clamp-2">
                                        {{ $rel->excerpt }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-5 pb-5 pt-2 border-t border-slate-100 flex items-center justify-between text-[0.7rem] text-slate-400">
                                <span>{{ $rel->published_at?->format('d M Y') }}</span>
                                <span class="font-bold text-loaction-600 group-hover:translate-x-0.5 transition">Baca &rarr;</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyBtn = document.getElementById('copyLinkBtn');
            const copyText = document.getElementById('copyLinkText');

            if (copyBtn) {
                copyBtn.addEventListener('click', function() {
                    navigator.clipboard.writeText(window.location.href).then(function() {
                        copyText.textContent = 'Tersalin!';
                        copyBtn.classList.add('bg-emerald-100', 'text-emerald-800');
                        setTimeout(function() {
                            copyText.textContent = 'Salin Tautan';
                            copyBtn.classList.remove('bg-emerald-100', 'text-emerald-800');
                        }, 2000);
                    });
                });
            }
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', 'Layanan | LoAction — Biro Psikologi Terapan')
@section('meta_description', 'Layanan psikologi LoAction meliputi personal care, pendidikan, industri & organisasi, dan uji kompetensi SDM.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-[radial-gradient(ellipse_at_20%_50%,rgba(79,174,143,.12),transparent_50%),linear-gradient(180deg,#f2fbf6_0%,#ffffff_100%)] py-16 lg:py-20">
        <div class="section-container text-center reveal">
            <p class="eyebrow justify-center">Layanan Kami</p>
            <h1 class="heading-2 mx-auto max-w-3xl !text-4xl lg:!text-5xl">Layanan Psikologi yang Tepat untuk Setiap Kebutuhan</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-slate-600 lg:text-lg">Empat area layanan utama LoAction dirancang untuk menjawab kebutuhan personal, pendidikan, organisasi, dan uji kompetensi secara profesional.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ DETAIL LAYANAN ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="grid gap-8 lg:gap-10">
                @foreach ($services as $index => $service)
                    <article class="grid items-center gap-8 rounded-[2rem] border border-loaction-100/80 bg-gradient-to-br from-[#fdfcfa] to-cream p-7 shadow-sm transition hover:shadow-card reveal lg:grid-cols-[0.4fr_1fr] lg:p-10 {{ $index % 2 === 1 ? 'lg:direction-rtl' : '' }}">
                        {{-- Icon & title block --}}
                        <div class="text-center lg:text-left">
                            <div class="mx-auto grid size-20 place-items-center rounded-3xl bg-gradient-to-br from-loaction-100 to-loaction-50 text-4xl text-loaction-700 ring-1 ring-loaction-200/50 lg:mx-0">
                                {{ $service['icon'] }}
                            </div>
                            <h2 class="mt-5 text-2xl font-black text-ink lg:text-3xl">{{ $service['title'] }}</h2>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
                        </div>

                        {{-- Service items --}}
                        <div>
                            <h3 class="mb-4 text-xs font-black uppercase tracking-[0.15em] text-loaction-600">Cakupan Layanan</h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['items'] as $item)
                                    <div class="flex items-start gap-3 rounded-xl bg-white p-4 ring-1 ring-loaction-100/60">
                                        <span class="mt-0.5 shrink-0 text-loaction-500">
                                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                        </span>
                                        <span class="text-sm font-bold text-slate-700">{{ $item->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('kontak') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-loaction-700 px-5 py-3 text-sm font-black text-white shadow-md transition hover:-translate-y-1 hover:bg-loaction-800 hover:shadow-lg">
                                {{ $service['cta'] }}
                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ SASARAN KLIEN ═══ --}}
    <section class="section-pad bg-[#fdfbf5]">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Dukungan Menyeluruh</p>
                <h2 class="heading-2">Untuk Setiap Kebutuhan Pengembangan Manusia</h2>
                <p class="mt-4 text-base text-slate-600 lg:text-lg">Layanan LoAction dapat disesuaikan untuk individu, keluarga, institusi pendidikan, perusahaan, dan pengelola SDM.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($audiences as $index => $audience)
                    <article class="group rounded-[1.6rem] bg-white p-6 shadow-sm ring-1 ring-loaction-100/80 transition hover:-translate-y-2 hover:shadow-card reveal" style="transition-delay: {{ $index * 80 }}ms;">
                        <span class="inline-block rounded-lg bg-gradient-to-br from-loaction-500 to-loaction-600 px-2.5 py-1 text-xs font-black text-white shadow-sm">{{ $audience['number'] }}</span>
                        <h3 class="mt-4 text-lg font-black text-ink">{{ $audience['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $audience['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-loaction-900 text-white">
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-black tracking-tight md:text-4xl">Butuh Layanan yang Spesifik?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/75 lg:text-lg">Hubungi LoAction untuk mendiskusikan kebutuhan Anda. Kami akan merancang program yang sesuai.</p>
            <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-honey px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-900 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                Hubungi Kami
            </a>
        </div>
    </section>

@endsection

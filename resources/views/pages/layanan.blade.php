@extends('layouts.app')

@section('title', 'Layanan | LoAction — Biro Psikologi Terapan')
@section('meta_description', 'Layanan psikologi LoAction meliputi personal care, pendidikan, industri & organisasi, dan uji kompetensi SDM.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-[#fff7ed] via-white to-[#fef3e2] py-16 lg:py-20">
        <div class="absolute right-0 top-0 -z-10 size-[400px] rounded-full bg-loaction-200/20 blur-3xl" aria-hidden="true"></div>
        <div class="section-container text-center reveal">
            <div class="inline-flex items-center gap-2 rounded-full bg-loaction-100 px-4 py-2 text-xs font-bold text-loaction-700 mx-auto">
                <span class="size-2 rounded-full bg-loaction-500 animate-pulse"></span>
                Layanan Kami
            </div>
            <h1 class="heading-2 mx-auto mt-4 max-w-3xl !text-4xl lg:!text-5xl">Layanan Psikologi yang Tepat untuk Setiap Kebutuhan</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-warm-gray lg:text-lg">Empat area layanan utama LoAction dirancang untuk menjawab kebutuhan personal, pendidikan, organisasi, dan uji kompetensi secara profesional.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ DETAIL LAYANAN ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="grid gap-8 lg:gap-10">
                @foreach ($services as $index => $service)
                    <article class="grid items-center gap-8 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card reveal lg:grid-cols-[0.4fr_1fr] lg:p-10 {{ $index % 2 === 1 ? 'lg:direction-rtl' : '' }}">
                        {{-- Icon & title block --}}
                        <div class="text-center lg:text-left">
                            <div class="mx-auto grid size-20 place-items-center rounded-3xl bg-gradient-to-br from-loaction-100 to-loaction-50 text-4xl text-loaction-600 ring-1 ring-loaction-200/50 lg:mx-0 transition-transform hover:scale-105">
                                {{ $service['icon'] }}
                            </div>
                            <h2 class="mt-5 text-2xl font-extrabold text-ink lg:text-3xl">{{ $service['title'] }}</h2>
                            <p class="mt-3 text-sm leading-7 text-warm-gray">{{ $service['description'] }}</p>
                        </div>

                        {{-- Service items --}}
                        <div>
                            <h3 class="mb-4 text-xs font-extrabold uppercase tracking-[0.15em] text-loaction-500">Cakupan Layanan</h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['items'] as $item)
                                    <div class="flex items-start gap-3 rounded-xl bg-soft-bg p-4 ring-1 ring-loaction-100/40 transition hover:ring-loaction-200">
                                        <span class="mt-0.5 shrink-0 text-loaction-500">
                                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                        </span>
                                        <span class="text-sm font-semibold text-warm-gray">{{ $item->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('kontak') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-loaction-500 px-5 py-3 text-sm font-extrabold text-white shadow-md transition hover:-translate-y-1 hover:bg-loaction-600 hover:shadow-lg">
                                {{ $service['cta'] }}
                                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ PROSES KERJA ═══ --}}
    <section class="section-pad bg-soft-bg">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Proses Kerja</p>
                <h2 class="heading-2">Bagaimana Kami Bekerja?</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">Empat langkah sederhana untuk mendapatkan layanan psikologi terbaik dari LoAction.</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 reveal">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Konsultasi Awal', 'desc' => 'Hubungi kami untuk mendiskusikan kebutuhan Anda melalui WhatsApp, email, atau form.'],
                        ['num' => '02', 'title' => 'Analisis Kebutuhan', 'desc' => 'Tim kami akan menganalisis kebutuhan dan merekomendasikan layanan yang paling sesuai.'],
                        ['num' => '03', 'title' => 'Pelaksanaan', 'desc' => 'Proses assessment, konseling, atau pelatihan dilakukan oleh psikolog profesional.'],
                        ['num' => '04', 'title' => 'Laporan & Tindak Lanjut', 'desc' => 'Anda mendapatkan laporan hasil dan rekomendasi tindak lanjut yang komprehensif.'],
                    ];
                @endphp
                @foreach ($steps as $index => $step)
                    <div class="process-step rounded-2xl bg-white shadow-sm ring-1 ring-loaction-100/40" style="transition-delay: {{ $index * 100 }}ms;">
                        <div class="step-number">{{ $step['num'] }}</div>
                        <h3 class="text-lg font-extrabold text-ink">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-warm-gray">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-ink text-white relative overflow-hidden">
        <div class="absolute inset-0 -z-10 opacity-10">
            <div class="absolute left-1/4 top-1/4 size-96 rounded-full bg-loaction-500 blur-[120px]"></div>
        </div>
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-extrabold tracking-tight md:text-4xl">Butuh Layanan yang Spesifik?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/70 lg:text-lg">Hubungi LoAction untuk mendiskusikan kebutuhan Anda. Kami akan merancang program yang sesuai.</p>
            <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-loaction-500 px-7 py-4 text-sm font-extrabold uppercase tracking-wide text-white shadow-lg transition hover:-translate-y-1 hover:bg-loaction-600 hover:shadow-xl">
                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                Hubungi Kami
            </a>
        </div>
    </section>

@endsection

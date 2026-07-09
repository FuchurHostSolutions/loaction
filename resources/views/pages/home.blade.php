@extends('layouts.app')

@section('title', 'LoAction | Biro Psikologi Terapan — Handle with Care')

@section('content')

    {{-- ═══ HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-[#fff7ed] via-white to-[#fef3e2] py-16 lg:py-24">
        {{-- Decorative blobs --}}
        <div class="absolute right-[-15%] top-20 -z-10 size-[480px] rounded-full bg-loaction-200/30 blur-3xl" aria-hidden="true"></div>
        <div class="absolute left-[-10%] bottom-10 -z-10 size-[380px] rounded-full bg-loaction-100/40 blur-3xl" aria-hidden="true"></div>

        <div class="section-container grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="reveal">
                <div class="inline-flex items-center gap-2 rounded-full bg-loaction-100 px-4 py-2 text-xs font-bold text-loaction-700">
                    <span class="size-2 rounded-full bg-loaction-500 animate-pulse"></span>
                    Biro Psikologi Terapan Sejak 2017
                </div>
                <h1 class="mt-5 max-w-2xl text-4xl font-extrabold leading-[1.08] tracking-[-0.03em] text-ink sm:text-5xl lg:text-[3.5rem]">
                    <span class="gradient-text">Handle with Care</span> untuk Pengembangan Potensi Manusia
                </h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-warm-gray lg:text-lg lg:leading-8">
                    LoAction menyediakan layanan psikologis yang cepat, tepat, dan disesuaikan dengan kebutuhan individu, keluarga, institusi pendidikan, organisasi, serta pengembangan SDM.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('kontak') }}" class="btn-primary">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                        Jadwalkan Sesi
                    </a>
                    <a href="{{ route('layanan') }}" class="btn-secondary">Lihat Layanan</a>
                </div>

                <div class="mt-10 grid max-w-lg grid-cols-3 gap-3">
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-extrabold text-loaction-600 counter-value" data-target="2017">2017</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray">Berdiri</span>
                    </div>
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-extrabold text-loaction-600 counter-value" data-target="4">4</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray">Area Layanan</span>
                    </div>
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-extrabold text-loaction-600">AHU</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-warm-gray">Berbadan Hukum</span>
                    </div>
                </div>
            </div>

            <div class="relative reveal lg:block" aria-hidden="true">
                <div class="hero-image-container">
                    <img src="{{ asset('images/hero.png') }}" alt="Ilustrasi layanan psikologi LoAction" class="w-full rounded-2xl">
                </div>
                {{-- Floating badges --}}
                <div class="floating-badge -left-4 top-8 hidden lg:flex items-center gap-2" style="animation-delay: -1s;">
                    <span class="grid size-8 place-items-center rounded-lg bg-loaction-100 text-loaction-600">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" /></svg>
                    </span>
                    <span>Tes IQ & Minat Bakat</span>
                </div>
                <div class="floating-badge -right-4 bottom-12 hidden lg:flex items-center gap-2 !bg-ink !text-white" style="animation-delay: -3s;">
                    <span class="grid size-8 place-items-center rounded-lg bg-white/15 text-loaction-400">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                    </span>
                    <span>Recruitment & Coaching</span>
                </div>
                <div class="floating-badge right-8 top-4 hidden lg:flex items-center gap-2" style="animation-delay: -5s;">
                    <span class="grid size-8 place-items-center rounded-lg bg-loaction-100 text-loaction-600">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                    </span>
                    <span>Konseling</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Wave divider --}}
    <div class="wave-divider">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 60L48 51.7C96 43.3 192 26.7 288 21.7C384 16.7 480 23.3 576 30C672 36.7 768 43.3 864 41.7C960 40 1056 30 1152 25C1248 20 1344 20 1392 20L1440 20V0H1392C1344 0 1248 0 1152 0C1056 0 960 0 864 0C768 0 672 0 576 0C480 0 384 0 288 0C192 0 96 0 48 0H0V60Z" fill="white"/>
        </svg>
    </div>

    {{-- ═══ LAYANAN RINGKAS ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Layanan Psikologi LoAction</p>
                <h2 class="heading-2">Apa saja yang dapat kami bantu?</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">Empat area layanan utama untuk kebutuhan personal, pendidikan, organisasi, dan uji kompetensi.</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($services as $index => $service)
                    <article class="service-card reveal" style="transition-delay: {{ $index * 100 }}ms;">
                        <div class="grid size-14 place-items-center rounded-2xl bg-gradient-to-br from-loaction-100 to-loaction-50 text-2xl text-loaction-600 ring-1 ring-loaction-200/50">
                            {{ $service['icon'] }}
                        </div>
                        <h3 class="mt-5 text-lg font-extrabold text-ink">{{ $service['title'] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-warm-gray">{{ $service['description'] }}</p>
                        <a href="{{ route('layanan') }}" class="mt-auto flex items-center gap-1 pt-5 text-sm font-extrabold text-loaction-500 transition hover:gap-2 hover:text-loaction-700">
                            Selengkapnya
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ KENAPA PILIH LOACTION ═══ --}}
    <section class="section-pad bg-soft-bg">
        <div class="section-container grid items-center gap-12 lg:grid-cols-2">
            <div class="reveal-left">
                <div class="rounded-[2rem] bg-gradient-to-br from-loaction-500 via-loaction-600 to-ink p-8 text-white shadow-lg">
                    <span class="inline-block rounded-full bg-white/15 px-4 py-2 text-[0.65rem] font-extrabold uppercase tracking-[0.18em] backdrop-blur">Mengapa Kami</span>
                    <h3 class="mt-12 text-3xl font-extrabold tracking-tight lg:text-4xl">Dipercaya oleh Individu & Organisasi</h3>
                    <p class="mt-3 text-base text-white/75 lg:text-lg">Didukung tenaga profesional dan berpengalaman di bidang psikologi klinis, pendidikan, serta industri.</p>
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="rounded-xl bg-white/10 p-4 backdrop-blur ring-1 ring-white/10">
                            <strong class="block text-2xl font-extrabold">2017</strong>
                            <span class="text-xs text-white/60">Tahun Berdiri</span>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4 backdrop-blur ring-1 ring-white/10">
                            <strong class="block text-2xl font-extrabold">AHU</strong>
                            <span class="text-xs text-white/60">Berbadan Hukum</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <p class="eyebrow">Keunggulan LoAction</p>
                <h2 class="heading-2">Pelayanan Profesional, Tepat & Terpercaya</h2>
                <div class="mt-6 space-y-1">
                    @php
                        $features = [
                            'Psikolog berlisensi dan berpengalaman',
                            'Layanan cepat, tepat, dan sesuai kebutuhan',
                            'Berbadan hukum SK Kemenkumham',
                            'Mencakup personal, pendidikan, industri & uji kompetensi',
                            'Pendekatan "Handle with Care"',
                            'Harga terjangkau dan transparan',
                        ];
                    @endphp
                    @foreach ($features as $feature)
                        <div class="feature-item">
                            <div class="feature-check">
                                <svg class="size-3.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            </div>
                            <span class="text-sm font-semibold text-warm-gray lg:text-base">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('profil') }}" class="btn-primary mt-8">Tentang Kami</a>
            </div>
        </div>
    </section>

    {{-- ═══ TARGET AUDIENS ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Siapa yang Kami Layani</p>
                <h2 class="heading-2">Solusi untuk Setiap Kebutuhan</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">LoAction hadir untuk mendampingi berbagai kalangan dalam aspek psikologis.</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $audiences = [
                        ['icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>', 'title' => 'Individu', 'desc' => 'Konseling personal, tes IQ, minat bakat, dan psikoedukasi untuk pengembangan diri.'],
                        ['icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>', 'title' => 'Keluarga', 'desc' => 'Konseling keluarga untuk menyelesaikan konflik dan membangun komunikasi yang sehat.'],
                        ['icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" /></svg>', 'title' => 'Institusi Pendidikan', 'desc' => 'Tes kesiapan sekolah, minat bakat siswa, dan pelatihan untuk guru dan sekolah.'],
                        ['icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" /></svg>', 'title' => 'Organisasi', 'desc' => 'Rekrutmen, assessment, coaching, dan uji kompetensi SDM untuk perusahaan.'],
                    ];
                @endphp
                @foreach ($audiences as $index => $audience)
                    <article class="audience-card reveal" style="transition-delay: {{ $index * 100 }}ms;">
                        <div class="audience-icon">
                            <span class="flex items-center justify-center text-loaction-600">{!! $audience['icon'] !!}</span>
                        </div>
                        <h3 class="mt-4 text-lg font-extrabold text-ink">{{ $audience['title'] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-warm-gray">{{ $audience['desc'] }}</p>
                        <a href="{{ route('layanan') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-bold text-loaction-500 transition hover:gap-2 hover:text-loaction-700">
                            Pelajari
                            <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ TESTIMONIAL ═══ --}}
    <section class="section-pad bg-soft-bg overflow-hidden">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Testimoni Klien</p>
                <h2 class="heading-2">Apa kata mereka tentang LoAction?</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">Kepuasan klien adalah prioritas utama kami.</p>
            </div>

            <div class="relative mt-12 reveal">
                <div class="overflow-hidden rounded-2xl" id="testimonialViewport">
                    <div class="testimonial-track" id="testimonialTrack">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial-slide">
                                <blockquote class="h-full rounded-[1.4rem] bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card">
                                    <div class="quote-mark">"</div>
                                    <p class="mt-1 text-base font-semibold leading-7 text-ink">{{ $testimonial['quote'] }}</p>
                                    <footer class="mt-5 flex items-center gap-3 border-t border-loaction-50 pt-4">
                                        <div class="grid size-10 place-items-center rounded-full bg-loaction-100 text-sm font-extrabold text-loaction-600">
                                            {{ mb_substr($testimonial['name'], 0, 1) }}
                                        </div>
                                        <div>
                                            <strong class="block text-sm font-extrabold text-ink">{{ $testimonial['name'] }}</strong>
                                            <span class="text-xs text-warm-gray">{{ $testimonial['role'] }}</span>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-center gap-3">
                    <button id="testimonialPrev" class="grid size-10 place-items-center rounded-full border border-loaction-200 bg-white text-loaction-600 shadow-sm transition hover:bg-loaction-50 hover:shadow-card" aria-label="Sebelumnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <div class="flex gap-2" id="testimonialDots"></div>
                    <button id="testimonialNext" class="grid size-10 place-items-center rounded-full border border-loaction-200 bg-white text-loaction-600 shadow-sm transition hover:bg-loaction-50 hover:shadow-card" aria-label="Berikutnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ HUBUNGI KAMI ═══ --}}
    <section class="section-pad bg-gradient-to-br from-loaction-50 via-white to-loaction-50">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Hubungi Kami</p>
                <h2 class="heading-2">Siap Berkonsultasi?</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">Ceritakan kebutuhan Anda dan tim LoAction akan membantu menentukan layanan yang paling sesuai.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-3 reveal">
                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="group flex flex-col items-center gap-4 rounded-2xl bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card hover:-translate-y-1 text-center">
                    <div class="grid size-14 place-items-center rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 text-white transition group-hover:scale-105">
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <div>
                        <strong class="block text-base font-extrabold text-ink">WhatsApp</strong>
                        <span class="mt-1 block text-sm text-warm-gray">Chat langsung dengan tim LoAction</span>
                    </div>
                </a>

                <a href="mailto:hello@loaction.id" class="group flex flex-col items-center gap-4 rounded-2xl bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card hover:-translate-y-1 text-center">
                    <div class="grid size-14 place-items-center rounded-2xl bg-gradient-to-br from-loaction-500 to-loaction-700 text-white transition group-hover:scale-105">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                    </div>
                    <div>
                        <strong class="block text-base font-extrabold text-ink">Email</strong>
                        <span class="mt-1 block text-sm text-warm-gray">hello@loaction.id</span>
                    </div>
                </a>

                <a href="{{ $instagramUrl }}" target="_blank" rel="noopener" class="group flex flex-col items-center gap-4 rounded-2xl bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card hover:-translate-y-1 text-center">
                    <div class="grid size-14 place-items-center rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 text-white transition group-hover:scale-105">
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </div>
                    <div>
                        <strong class="block text-base font-extrabold text-ink">Instagram</strong>
                        <span class="mt-1 block text-sm text-warm-gray">@loaction.id</span>
                    </div>
                </a>
            </div>

            <div class="mt-10 text-center reveal">
                <a href="{{ route('kontak') }}" class="btn-primary">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Jadwalkan Konsultasi Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-ink text-white relative overflow-hidden">
        <div class="absolute inset-0 -z-10 opacity-10">
            <div class="absolute left-1/4 top-1/4 size-96 rounded-full bg-loaction-500 blur-[120px]"></div>
            <div class="absolute right-1/4 bottom-1/4 size-72 rounded-full bg-loaction-400 blur-[100px]"></div>
        </div>
        <div class="section-container text-center reveal">
            <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-bold text-white/80 backdrop-blur mb-6">
                <span class="size-2 rounded-full bg-loaction-400 animate-pulse"></span>
                Mulai Sekarang
            </div>
            <h2 class="text-3xl font-extrabold tracking-tight md:text-4xl lg:text-5xl">Siap Mengambil Langkah Pertama?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-white/70">Tim LoAction siap membantu Anda menemukan layanan psikologi yang paling sesuai.</p>
            <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 rounded-full bg-loaction-500 px-7 py-4 text-sm font-extrabold uppercase tracking-wide text-white shadow-lg transition hover:-translate-y-1 hover:bg-loaction-600 hover:shadow-xl">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Jadwalkan Konsultasi
                </a>
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 rounded-full border-2 border-white/20 px-7 py-4 text-sm font-extrabold uppercase tracking-wide text-white transition hover:-translate-y-1 hover:border-white/50 hover:bg-white/5">
                    Tentang Kami
                </a>
            </div>
        </div>
    </section>

@endsection

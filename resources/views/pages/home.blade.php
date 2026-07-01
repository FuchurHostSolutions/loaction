@extends('layouts.app')

@section('title', 'LoAction | Biro Psikologi Terapan — Handle with Care')

@section('content')

    {{-- ═══ HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-[radial-gradient(ellipse_at_10%_10%,rgba(255,228,168,.55),transparent_40%),radial-gradient(ellipse_at_85%_20%,rgba(79,174,143,.18),transparent_35%),linear-gradient(180deg,#fffaf0_0%,#f2fbf6_100%)] py-16 lg:py-24">
        <div class="absolute right-[-15%] top-20 -z-10 size-[480px] rounded-full bg-peach/20 blur-3xl" aria-hidden="true"></div>
        <div class="absolute left-[-10%] bottom-10 -z-10 size-[380px] rounded-full bg-loaction-300/15 blur-3xl" aria-hidden="true"></div>

        <div class="section-container grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="reveal">
                <p class="eyebrow">Biro Psikologi Terapan Sejak 2017</p>
                <h1 class="mt-4 max-w-2xl text-4xl font-black leading-[1.06] tracking-[-0.04em] text-ink sm:text-5xl lg:text-6xl xl:text-[3.6rem]">
                    <span class="gradient-text">Handle with Care</span> untuk Pengembangan Potensi Manusia
                </h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-slate-600 lg:text-lg lg:leading-8">
                    LoAction menyediakan layanan psikologis yang cepat, tepat, dan disesuaikan dengan kebutuhan individu, keluarga, institusi pendidikan, organisasi, serta pengembangan SDM.
                </p>
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('kontak') }}" class="btn-primary">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                        Jadwalkan Sesi
                    </a>
                    <a href="{{ route('layanan') }}" class="btn-secondary">Lihat Layanan</a>
                </div>

                <div class="mt-10 grid max-w-lg grid-cols-3 gap-3">
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-black text-loaction-700">2017</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-slate-500">Berdiri</span>
                    </div>
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-black text-loaction-700">4</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-slate-500">Area Layanan</span>
                    </div>
                    <div class="stat-card text-center">
                        <strong class="block text-2xl font-black text-loaction-700">AHU</strong>
                        <span class="text-[0.65rem] font-bold uppercase tracking-wider text-slate-500">Berbadan Hukum</span>
                    </div>
                </div>
            </div>

            <div class="relative hidden min-h-[480px] reveal lg:block" aria-hidden="true">
                <div class="absolute left-4 top-0 size-44 rounded-full bg-honey/50 blur-2xl animate-float"></div>
                <div class="absolute bottom-8 right-4 size-56 rounded-full bg-loaction-300/30 blur-2xl animate-float" style="animation-delay: -3s;"></div>
                <div class="absolute inset-x-6 top-8 rounded-[2.4rem] bg-white/75 p-7 shadow-soft ring-1 ring-loaction-100/60 backdrop-blur-sm">
                    <div class="relative h-[370px] overflow-hidden rounded-[1.8rem] bg-gradient-to-br from-loaction-50 via-cream to-white">
                        <div class="absolute left-10 top-14 size-28 rounded-full bg-loaction-500/15"></div>
                        <div class="absolute bottom-10 right-12 size-36 rounded-full bg-peach/40"></div>
                        <div class="absolute left-1/2 top-12 h-48 w-36 -translate-x-1/2 rounded-t-full bg-gradient-to-b from-loaction-700 to-loaction-600 shadow-xl"></div>
                        <div class="absolute left-1/2 top-24 size-20 -translate-x-1/2 rounded-full bg-honey shadow-md"></div>
                        <div class="absolute bottom-16 left-14 h-32 w-24 rounded-t-full bg-loaction-500 shadow-md"></div>
                        <div class="absolute bottom-16 right-14 h-32 w-24 rounded-t-full bg-peach shadow-md"></div>
                        <div class="absolute left-5 top-6 rounded-full bg-white px-4 py-2.5 text-xs font-black text-loaction-700 shadow-card animate-float">
                            <span class="mr-1">☘</span> Konseling
                        </div>
                        <div class="absolute right-5 top-24 rounded-full bg-white px-4 py-2.5 text-xs font-black text-loaction-700 shadow-card animate-float" style="animation-delay: -2s;">
                            <span class="mr-1">✦</span> Assessment
                        </div>
                        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 rounded-full bg-white px-4 py-2.5 text-xs font-black text-loaction-700 shadow-card animate-float" style="animation-delay: -4s;">
                            <span class="mr-1">◎</span> Pelatihan
                        </div>
                    </div>
                </div>
                <div class="absolute -left-2 top-2 rounded-2xl bg-white px-4 py-3 text-xs font-black text-loaction-900 shadow-card animate-float" style="animation-delay: -1s;">
                    🧠 Tes IQ & Minat Bakat
                </div>
                <div class="absolute -right-2 bottom-4 rounded-2xl bg-loaction-900 px-4 py-3 text-xs font-black text-white shadow-card animate-float" style="animation-delay: -5s;">
                    👥 Recruitment & Coaching
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ LAYANAN RINGKAS ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Layanan Psikologi LoAction</p>
                <h2 class="heading-2">Apa saja yang dapat kami bantu?</h2>
                <p class="mt-4 text-base text-slate-600 lg:text-lg">Empat area layanan utama untuk kebutuhan personal, pendidikan, organisasi, dan uji kompetensi.</p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($services as $index => $service)
                    <article class="service-card reveal" style="transition-delay: {{ $index * 100 }}ms;">
                        <div class="grid size-14 place-items-center rounded-2xl bg-gradient-to-br from-loaction-100 to-loaction-50 text-2xl text-loaction-700 ring-1 ring-loaction-200/50">
                            {{ $service['icon'] }}
                        </div>
                        <h3 class="mt-5 text-xl font-black text-ink">{{ $service['title'] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
                        <a href="{{ route('layanan') }}" class="mt-auto flex items-center gap-1 pt-5 text-sm font-black text-loaction-700 transition hover:gap-2 hover:text-loaction-900">
                            Selengkapnya
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ TESTIMONIAL ═══ --}}
    <section class="section-pad bg-[#fdfbf5] overflow-hidden">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Testimoni Klien</p>
                <h2 class="heading-2">Apa kata mereka tentang LoAction?</h2>
                <p class="mt-4 text-base text-slate-600 lg:text-lg">Kepuasan klien adalah prioritas utama kami.</p>
            </div>

            <div class="relative mt-12 reveal">
                <div class="overflow-hidden rounded-2xl" id="testimonialViewport">
                    <div class="testimonial-track" id="testimonialTrack">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial-slide">
                                <blockquote class="h-full rounded-[1.6rem] bg-gradient-to-br from-loaction-50 to-white p-7 ring-1 ring-loaction-100/80 transition hover:shadow-card">
                                    <div class="mb-4 flex gap-1 text-honey">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg class="size-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                    <p class="text-base font-bold leading-7 text-ink">"{{ $testimonial['quote'] }}"</p>
                                    <footer class="mt-5 flex items-center gap-3">
                                        <div class="grid size-10 place-items-center rounded-full bg-loaction-100 text-sm font-black text-loaction-700">
                                            {{ mb_substr($testimonial['name'], 0, 1) }}
                                        </div>
                                        <div>
                                            <strong class="block text-sm font-black text-loaction-800">{{ $testimonial['name'] }}</strong>
                                            <span class="text-xs text-slate-500">{{ $testimonial['role'] }}</span>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-center gap-3">
                    <button id="testimonialPrev" class="grid size-10 place-items-center rounded-full border border-loaction-200 bg-white text-loaction-700 shadow-sm transition hover:bg-loaction-50 hover:shadow-card" aria-label="Sebelumnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <div class="flex gap-2" id="testimonialDots"></div>
                    <button id="testimonialNext" class="grid size-10 place-items-center rounded-full border border-loaction-200 bg-white text-loaction-700 shadow-sm transition hover:bg-loaction-50 hover:shadow-card" aria-label="Berikutnya">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-gradient-to-br from-loaction-700 via-loaction-600 to-loaction-500 text-white">
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-black tracking-tight md:text-4xl lg:text-5xl">Siap Berkonsultasi?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-white/80">Ceritakan kebutuhan Anda dan tim LoAction akan membantu menentukan layanan yang paling sesuai.</p>
            <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-800 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Jadwalkan Konsultasi
                </a>
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 rounded-full border-2 border-white/30 px-7 py-4 text-sm font-black uppercase tracking-wide text-white transition hover:-translate-y-1 hover:border-white/60 hover:bg-white/10">
                    Tentang Kami
                </a>
            </div>
        </div>
    </section>

@endsection

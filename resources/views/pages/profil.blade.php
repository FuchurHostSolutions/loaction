@extends('layouts.app')

@section('title', 'Profil | LoAction — Biro Psikologi Terapan')
@section('meta_description', 'LoAction adalah biro psikologi terapan yang berdiri sejak 2017, berbadan hukum SK Kemenkumham No. AHU-0001501.AH tahun 2019.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-[radial-gradient(ellipse_at_80%_30%,rgba(255,228,168,.4),transparent_50%),linear-gradient(180deg,#f2fbf6_0%,#ffffff_100%)] py-16 lg:py-20">
        <div class="section-container text-center reveal">
            <p class="eyebrow justify-center">Tentang Kami</p>
            <h1 class="heading-2 mx-auto max-w-3xl !text-4xl lg:!text-5xl">Mengenal LoAction Lebih Dekat</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-slate-600 lg:text-lg">Biro psikologi terapan yang berfokus pada pengembangan sumber daya manusia sejak 2017.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ PROFIL BIRO ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container grid items-center gap-10 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="reveal-left">
                <div class="rounded-[2.4rem] bg-gradient-to-br from-loaction-700 via-loaction-600 to-loaction-500 p-8 text-white shadow-soft">
                    <span class="inline-block rounded-full bg-white/15 px-4 py-2 text-[0.65rem] font-black uppercase tracking-[0.18em] backdrop-blur">Profil Biro</span>
                    <h2 class="mt-14 text-4xl font-black tracking-tight lg:text-5xl">LoAction</h2>
                    <p class="mt-3 text-base text-white/80 lg:text-lg">Biro psikologi terapan yang berfokus pada pengembangan sumber daya manusia.</p>
                    <div class="mt-10 rounded-[1.6rem] bg-white/10 p-5 ring-1 ring-white/10 backdrop-blur">
                        <p class="text-[0.65rem] font-black uppercase tracking-[0.15em] text-white/50">Legalitas</p>
                        <p class="mt-1.5 text-lg font-black lg:text-xl">SK Kemenkumham No. AHU-0001501.AH tahun 2019</p>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <p class="eyebrow">Tentang Kami</p>
                <h2 class="heading-2">Didukung Tenaga Profesional dan Berpengalaman</h2>
                <div class="mt-5 space-y-4 text-base leading-7 text-slate-600 lg:text-lg lg:leading-8">
                    <p>LoAction adalah sebuah biro psikologi terapan yang telah berdiri sejak tahun 2017 dan telah berbadan hukum sesuai SK Kemenkumham No. AHU-0001501.AH tahun 2019.</p>
                    <p>LoAction bergerak di bidang pengembangan sumber daya manusia. Didukung oleh tenaga profesional dan berpengalaman di bidang psikologi klinis, pendidikan, serta industri, LoAction memiliki komitmen tinggi untuk memberikan pelayanan terbaik bagi kliennya.</p>
                </div>
                <div class="mt-7 flex flex-wrap gap-3">
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-black text-loaction-700">Psikologi Klinis</span>
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-black text-loaction-700">Pendidikan</span>
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-black text-loaction-700">Industri & Organisasi</span>
                    <span class="rounded-full bg-honey/60 px-4 py-2 text-xs font-black text-loaction-900">Berdiri Sejak 2017</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ VISI & MISI ═══ --}}
    <section class="section-pad bg-loaction-50/50">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Visi & Misi</p>
                <h2 class="heading-2">Fondasi Pelayanan Kami</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                <article class="rounded-[2rem] border border-loaction-100 bg-gradient-to-br from-cream to-white p-8 shadow-sm transition hover:shadow-card reveal">
                    <div class="flex items-center gap-3">
                        <div class="grid size-12 place-items-center rounded-xl bg-loaction-100 text-loaction-600">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                        </div>
                        <p class="eyebrow">Visi</p>
                    </div>
                    <h3 class="mt-5 text-3xl font-black tracking-tight text-ink lg:text-4xl">"Handle with Care"</h3>
                    <p class="mt-4 text-base leading-7 text-slate-600 lg:text-lg lg:leading-8">LoAction memiliki visi "handle with care" yang berarti bahwa kami akan melayani klien dengan sepenuh hati, sehingga tercapai sebuah kepuasan yang merupakan keutamaan dari pelayanan kami.</p>
                </article>

                <article class="rounded-[2rem] bg-gradient-to-br from-loaction-900 to-loaction-800 p-8 text-white shadow-soft transition hover:shadow-lg reveal">
                    <div class="flex items-center gap-3">
                        <div class="grid size-12 place-items-center rounded-xl bg-white/10 text-honey">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                        </div>
                        <p class="text-[0.65rem] font-black uppercase tracking-[0.18em] text-honey">Misi</p>
                    </div>
                    <h3 class="mt-5 text-3xl font-black tracking-tight lg:text-4xl">Cepat, Tepat, dan Sesuai Kebutuhan</h3>
                    <p class="mt-4 text-base leading-7 text-white/75 lg:text-lg lg:leading-8">LoAction memiliki misi untuk mewujudkan kenyamanan serta kepuasan klien, kami menyediakan jasa layanan psikologis yang dapat disesuaikan dengan kebutuhan klien serta cepat dan tepat.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- ═══ TESTIMONIAL ═══ --}}
    <section class="section-pad bg-white overflow-hidden">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Testimoni Klien</p>
                <h2 class="heading-2">Apa kata mereka tentang LoAction?</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3 reveal">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="rounded-[1.6rem] bg-gradient-to-br from-loaction-50 to-white p-7 ring-1 ring-loaction-100/80 transition hover:shadow-card">
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
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-gradient-to-br from-loaction-700 via-loaction-600 to-loaction-500 text-white">
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-black tracking-tight md:text-4xl lg:text-5xl">Siap Berkonsultasi?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-white/80">Hubungi LoAction untuk diskusi lebih lanjut tentang kebutuhan Anda.</p>
            <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-white px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-800 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                Jadwalkan Konsultasi
            </a>
        </div>
    </section>

@endsection

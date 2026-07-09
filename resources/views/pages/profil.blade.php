@extends('layouts.app')

@section('title', 'Profil | LoAction — Biro Psikologi Terapan')
@section('meta_description', 'LoAction adalah biro psikologi terapan yang berdiri sejak 2017, berbadan hukum SK Kemenkumham No. AHU-0001501.AH tahun 2019.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-[#fff7ed] via-white to-[#fef3e2] py-16 lg:py-20">
        <div class="absolute left-0 bottom-0 -z-10 size-[350px] rounded-full bg-loaction-200/20 blur-3xl" aria-hidden="true"></div>
        <div class="section-container text-center reveal">
            <div class="inline-flex items-center gap-2 rounded-full bg-loaction-100 px-4 py-2 text-xs font-bold text-loaction-700 mx-auto">
                <span class="size-2 rounded-full bg-loaction-500 animate-pulse"></span>
                Tentang Kami
            </div>
            <h1 class="heading-2 mx-auto mt-4 max-w-3xl !text-4xl lg:!text-5xl">Mengenal LoAction Lebih Dekat</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-warm-gray lg:text-lg">Biro psikologi terapan yang berfokus pada pengembangan sumber daya manusia sejak 2017.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ PROFIL BIRO ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container grid items-center gap-10 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="reveal-left">
                <div class="rounded-[2rem] bg-gradient-to-br from-loaction-500 via-loaction-600 to-ink p-8 text-white shadow-lg">
                    <span class="inline-block rounded-full bg-white/15 px-4 py-2 text-[0.65rem] font-extrabold uppercase tracking-[0.18em] backdrop-blur">Profil Biro</span>
                    <h2 class="mt-14 text-4xl font-extrabold tracking-tight lg:text-5xl">Lo<span class="text-loaction-200">Action</span></h2>
                    <p class="mt-3 text-base text-white/80 lg:text-lg">Biro psikologi terapan yang berfokus pada pengembangan sumber daya manusia.</p>
                    <div class="mt-10 rounded-[1.4rem] bg-white/10 p-5 ring-1 ring-white/10 backdrop-blur">
                        <p class="text-[0.65rem] font-extrabold uppercase tracking-[0.15em] text-white/50">Legalitas</p>
                        <p class="mt-1.5 text-lg font-extrabold lg:text-xl">SK Kemenkumham No. AHU-0001501.AH tahun 2019</p>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <p class="eyebrow">Tentang Kami</p>
                <h2 class="heading-2">Didukung Tenaga Profesional dan Berpengalaman</h2>
                <div class="mt-5 space-y-4 text-base leading-7 text-warm-gray lg:text-lg lg:leading-8">
                    <p>LoAction adalah sebuah biro psikologi terapan yang telah berdiri sejak tahun 2017 dan telah berbadan hukum sesuai SK Kemenkumham No. AHU-0001501.AH tahun 2019.</p>
                    <p>LoAction bergerak di bidang pengembangan sumber daya manusia. Didukung oleh tenaga profesional dan berpengalaman di bidang psikologi klinis, pendidikan, serta industri, LoAction memiliki komitmen tinggi untuk memberikan pelayanan terbaik bagi kliennya.</p>
                </div>
                <div class="mt-7 flex flex-wrap gap-3">
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-extrabold text-loaction-700">Psikologi Klinis</span>
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-extrabold text-loaction-700">Pendidikan</span>
                    <span class="rounded-full bg-loaction-100 px-4 py-2 text-xs font-extrabold text-loaction-700">Industri & Organisasi</span>
                    <span class="rounded-full bg-loaction-500 px-4 py-2 text-xs font-extrabold text-white">Berdiri Sejak 2017</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ VISI & MISI ═══ --}}
    <section class="section-pad bg-soft-bg">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Visi & Misi</p>
                <h2 class="heading-2">Fondasi Pelayanan Kami</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                <article class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card reveal">
                    <div class="flex items-center gap-3">
                        <div class="grid size-12 place-items-center rounded-xl bg-loaction-100 text-loaction-500">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                        </div>
                        <p class="eyebrow">Visi</p>
                    </div>
                    <h3 class="mt-5 text-3xl font-extrabold tracking-tight text-ink lg:text-4xl">"Handle with Care"</h3>
                    <p class="mt-4 text-base leading-7 text-warm-gray lg:text-lg lg:leading-8">LoAction memiliki visi "handle with care" yang berarti bahwa kami akan melayani klien dengan sepenuh hati, sehingga tercapai sebuah kepuasan yang merupakan keutamaan dari pelayanan kami.</p>
                </article>

                <article class="rounded-[2rem] bg-gradient-to-br from-ink to-loaction-900 p-8 text-white shadow-lg transition hover:shadow-xl reveal">
                    <div class="flex items-center gap-3">
                        <div class="grid size-12 place-items-center rounded-xl bg-white/10 text-loaction-400">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                        </div>
                        <p class="text-[0.65rem] font-extrabold uppercase tracking-[0.18em] text-loaction-400">Misi</p>
                    </div>
                    <h3 class="mt-5 text-3xl font-extrabold tracking-tight lg:text-4xl">Cepat, Tepat, dan Sesuai Kebutuhan</h3>
                    <p class="mt-4 text-base leading-7 text-white/70 lg:text-lg lg:leading-8">LoAction memiliki misi untuk mewujudkan kenyamanan serta kepuasan klien, kami menyediakan jasa layanan psikologis yang dapat disesuaikan dengan kebutuhan klien serta cepat dan tepat.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- ═══ TIM PSIKOLOG ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Tim Profesional</p>
                <h2 class="heading-2">Didukung Psikolog Berpengalaman</h2>
                <p class="mt-4 text-base text-warm-gray lg:text-lg">Tim LoAction terdiri dari psikolog berlisensi yang ahli di berbagai bidang psikologi terapan.</p>
            </div>

            {{-- Team Members --}}
            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 reveal">
                @php
                    $team = [
                        [
                            'name' => 'Aulia Rahma, S.Psi., M.Psi., Psikolog',
                            'role' => 'Psikolog Klinis',
                            'sipp' => 'SIPP: XXX-XX-XXXX',
                            'icon' => '🧠',
                            'initial' => 'AR',
                            'expertise' => ['Konseling Individu & Keluarga', 'Penanganan Stres & Kecemasan', 'Psikoedukasi', 'Assessment Klinis'],
                            'desc' => 'Berpengalaman lebih dari 5 tahun dalam penanganan masalah psikologis individu dan keluarga.',
                        ],
                        [
                            'name' => 'Dian Pratiwi, S.Psi., M.Psi., Psikolog',
                            'role' => 'Psikolog Pendidikan',
                            'sipp' => 'SIPP: XXX-XX-XXXX',
                            'icon' => '📚',
                            'initial' => 'DP',
                            'expertise' => ['Tes IQ & Intelegensi', 'Tes Minat & Bakat', 'Kesiapan Sekolah', 'Konseling Pendidikan'],
                            'desc' => 'Spesialis assessment pendidikan yang telah menangani ribuan peserta didik di berbagai jenjang.',
                        ],
                        [
                            'name' => 'Reza Firmansyah, S.Psi., M.Psi., Psikolog',
                            'role' => 'Psikolog Industri & Organisasi',
                            'sipp' => 'SIPP: XXX-XX-XXXX',
                            'icon' => '💼',
                            'initial' => 'RF',
                            'expertise' => ['Rekrutmen & Seleksi', 'Assessment Kompetensi', 'Coaching & Pelatihan', 'Pengembangan SDM'],
                            'desc' => 'Ahli di bidang psikologi industri dengan pengalaman luas dalam assessment dan pengembangan SDM.',
                        ],
                    ];
                @endphp
                @foreach ($team as $index => $member)
                    <div class="team-card" style="transition-delay: {{ $index * 120 }}ms;">
                        <div class="team-avatar">{{ $member['initial'] }}</div>
                        <h3 class="text-base font-extrabold text-ink leading-snug">{{ $member['name'] }}</h3>
                        <p class="mt-1 text-sm font-bold text-loaction-500">{{ $member['role'] }}</p>
                        <p class="mt-0.5 text-xs text-warm-gray/70">{{ $member['sipp'] }}</p>
                        <p class="mt-3 text-sm leading-7 text-warm-gray">{{ $member['desc'] }}</p>

                        <div class="mt-4 flex flex-wrap justify-center gap-1.5">
                            @foreach ($member['expertise'] as $skill)
                                <span class="rounded-full bg-loaction-50 px-2.5 py-1 text-[0.65rem] font-bold text-loaction-700 ring-1 ring-loaction-100/60">{{ $skill }}</span>
                            @endforeach
                        </div>

                        <div class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-bold text-green-700">
                            <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Berlisensi HIMPSI
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Team Stats --}}
            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 reveal">
                @php
                    $teamStats = [
                        ['value' => '3+', 'label' => 'Psikolog Profesional', 'icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>'],
                        ['value' => '100%', 'label' => 'Berlisensi SIPP', 'icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" /></svg>'],
                        ['value' => '3', 'label' => 'Bidang Spesialisasi', 'icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m0 9V18A2.25 2.25 0 0 1 18 20.25h-1.5m-9 0H6A2.25 2.25 0 0 1 3.75 18v-1.5M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>'],
                        ['value' => '5+', 'label' => 'Tahun Pengalaman', 'icon' => '<svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>'],
                    ];
                @endphp
                @foreach ($teamStats as $stat)
                    <div class="flex items-center gap-4 rounded-2xl bg-soft-bg p-5 ring-1 ring-loaction-100/40">
                        <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-loaction-100 text-loaction-600">
                            {!! $stat['icon'] !!}
                        </div>
                        <div>
                            <strong class="block text-xl font-extrabold text-loaction-600">{{ $stat['value'] }}</strong>
                            <span class="text-sm font-semibold text-warm-gray">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Commitment note --}}
            <div class="mt-14 rounded-[2rem] bg-gradient-to-r from-loaction-50 to-loaction-100/50 p-8 text-center ring-1 ring-loaction-200/40 reveal">
                <p class="text-lg font-extrabold text-ink">Komitmen Tim LoAction</p>
                <p class="mx-auto mt-3 max-w-2xl text-base leading-7 text-warm-gray">Seluruh psikolog LoAction memiliki Surat Izin Praktik Psikologi (SIPP) dan terdaftar resmi di Himpunan Psikologi Indonesia (HIMPSI). Kami berkomitmen untuk memberikan pelayanan yang etis, profesional, dan berbasis bukti ilmiah.</p>
                <a href="{{ route('kontak') }}" class="btn-primary mt-6">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Konsultasi dengan Tim Kami
                </a>
            </div>
        </div>
    </section>

    {{-- ═══ TESTIMONIAL ═══ --}}
    <section class="section-pad bg-soft-bg overflow-hidden">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Testimoni Klien</p>
                <h2 class="heading-2">Apa kata mereka tentang LoAction?</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3 reveal">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="rounded-[1.4rem] bg-white p-7 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card">
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
            <h2 class="text-3xl font-extrabold tracking-tight md:text-4xl lg:text-5xl">Siap Berkonsultasi?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-white/70">Hubungi LoAction untuk diskusi lebih lanjut tentang kebutuhan Anda.</p>
            <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-loaction-500 px-7 py-4 text-sm font-extrabold uppercase tracking-wide text-white shadow-lg transition hover:-translate-y-1 hover:bg-loaction-600 hover:shadow-xl">
                Jadwalkan Konsultasi
            </a>
        </div>
    </section>

@endsection

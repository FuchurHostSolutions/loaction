@extends('layouts.app')

@section('title', 'Uji Kompetensi | LoAction — Assessment SDM Profesional')
@section('meta_description', 'Uji kompetensi SDM oleh LoAction untuk staf, supervisor, dan manajer. Skema assessment yang disesuaikan dengan kebutuhan organisasi.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-loaction-900 py-16 text-white lg:py-24">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_30%_50%,rgba(79,174,143,.15),transparent_60%)]" aria-hidden="true"></div>
        <div class="absolute right-[-10%] top-[-20%] -z-10 size-[500px] rounded-full bg-honey/8 blur-3xl" aria-hidden="true"></div>

        <div class="section-container grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="reveal">
                <p class="text-[0.65rem] font-black uppercase tracking-[0.18em] text-honey">Uji Kompetensi SDM</p>
                <h1 class="mt-4 text-4xl font-black leading-tight tracking-tight md:text-5xl lg:text-[3.4rem]">Assessment untuk Staf, Supervisor, dan Manajer</h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-white/75 lg:text-lg lg:leading-8">LoAction membantu organisasi menilai kesesuaian kompetensi dan potensi SDM melalui skema yang dapat disesuaikan dengan kebutuhan rekrutmen, seleksi, promosi, maupun pengembangan.</p>
                <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-honey px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-900 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/></svg>
                    Ajukan Skema Uji
                </a>
            </div>

            <div class="grid gap-4 reveal-right">
                @foreach ($competencies as $index => $competency)
                    <div class="competency-card" style="transition-delay: {{ $index * 100 }}ms;">
                        <div class="flex items-start gap-4">
                            <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-honey/20 text-honey">
                                @if ($competency['role'] === 'Staff')
                                    <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                @elseif ($competency['role'] === 'Supervisor')
                                    <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                                @else
                                    <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                @endif
                            </div>
                            <div>
                                <strong class="block text-2xl font-black text-honey">{{ $competency['role'] }}</strong>
                                <span class="mt-1 block text-sm leading-6 text-white/75">{{ $competency['text'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ SKEMA DETAIL ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">Skema Assessment</p>
                <h2 class="heading-2">Skema yang Dapat Disesuaikan</h2>
                <p class="mt-4 text-base text-slate-600 lg:text-lg">Setiap skema dirancang berdasarkan kebutuhan spesifik organisasi Anda.</p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4 reveal">
                @php
                    $skema = [
                        ['title' => 'SDM Umum', 'desc' => 'Skema uji kompetensi untuk staf, supervisor, dan manajer.', 'icon' => '📋'],
                        ['title' => 'Rekrutmen Staf', 'desc' => 'Skema rekrutmen dan seleksi level staf baru.', 'icon' => '👤'],
                        ['title' => 'Rekrutmen Supervisor', 'desc' => 'Skema rekrutmen dan seleksi level supervisor.', 'icon' => '👥'],
                        ['title' => 'Rekrutmen Manajer', 'desc' => 'Skema rekrutmen dan seleksi level manajer.', 'icon' => '⭐'],
                    ];
                @endphp

                @foreach ($skema as $index => $item)
                    <div class="rounded-[1.6rem] border border-loaction-100 bg-gradient-to-b from-[#fdfcfa] to-cream p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-card" style="transition-delay: {{ $index * 80 }}ms;">
                        <span class="text-3xl">{{ $item['icon'] }}</span>
                        <h3 class="mt-4 text-lg font-black text-ink">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="section-pad bg-gradient-to-br from-loaction-700 via-loaction-600 to-loaction-500 text-white">
        <div class="section-container text-center reveal">
            <h2 class="text-3xl font-black tracking-tight md:text-4xl lg:text-5xl">Butuh Assessment SDM?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-white/80">Diskusikan kebutuhan organisasi Anda dengan tim LoAction.</p>
            <a href="{{ route('kontak') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-white px-7 py-4 text-sm font-black uppercase tracking-wide text-loaction-800 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                Ajukan Skema Uji
            </a>
        </div>
    </section>

@endsection

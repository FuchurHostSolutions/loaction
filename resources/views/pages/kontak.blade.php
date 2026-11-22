@extends('layouts.app')

@section('title', 'Kontak | LoAction — Jadwalkan Konsultasi')
@section('meta_description', 'Hubungi LoAction untuk menjadwalkan konsultasi psikologi. Kami melayani personal care, pendidikan, industri, dan uji kompetensi.')

@section('content')

    {{-- ═══ PAGE HERO ═══ --}}
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-[#fff7ed] via-white to-[#fef3e2] py-16 lg:py-20">
        <div class="absolute right-0 bottom-0 -z-10 size-[350px] rounded-full bg-loaction-200/20 blur-3xl" aria-hidden="true"></div>
        <div class="section-container text-center reveal">
            <div class="inline-flex items-center gap-2 rounded-full bg-loaction-100 px-4 py-2 text-xs font-bold text-loaction-700 mx-auto">
                <span class="size-2 rounded-full bg-loaction-500 animate-pulse"></span>
                Hubungi Kami
            </div>
            <h1 class="heading-2 mx-auto mt-4 max-w-3xl !text-4xl lg:!text-5xl">Jadwalkan Konsultasi dengan LoAction</h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-warm-gray lg:text-lg">Tim LoAction siap membantu Anda menentukan layanan yang paling sesuai untuk kebutuhan Anda.</p>
        </div>
    </section>

    <div class="section-divider"></div>

    {{-- ═══ KONTAK & FORM ═══ --}}
    <section class="section-pad bg-white">
        <div class="section-container grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">
            {{-- Left: contact info --}}
            <div class="reveal-left">
                <p class="eyebrow">Informasi Kontak</p>
                <h2 class="heading-2">Ceritakan Kebutuhan Anda</h2>
                <p class="mt-4 text-base leading-7 text-warm-gray lg:text-lg lg:leading-8">Anda bisa menghubungi kami melalui salah satu kanal berikut, atau langsung mengisi form di samping.</p>

                <div class="mt-7 grid gap-4">
                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener" class="group flex items-center gap-4 rounded-2xl bg-soft-bg p-5 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card">
                        <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white">
                            <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-sm font-extrabold text-ink">Instagram</strong>
                            <span class="text-sm text-warm-gray transition group-hover:text-loaction-600">@loaction.id</span>
                        </div>
                    </a>

                    <a href="{{ $whatsappUrl }}" class="group flex items-center gap-4 rounded-2xl bg-soft-bg p-5 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card">
                        <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 text-white">
                            <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-sm font-extrabold text-ink">WhatsApp</strong>
                            <span class="text-sm text-warm-gray transition group-hover:text-loaction-600">Chat langsung dengan LoAction</span>
                        </div>
                    </a>

                    <a href="mailto:hello@loaction.id" class="group flex items-center gap-4 rounded-2xl bg-soft-bg p-5 shadow-sm ring-1 ring-loaction-100/60 transition hover:shadow-card">
                        <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-loaction-500 to-loaction-700 text-white">
                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        </div>
                        <div>
                            <strong class="block text-sm font-extrabold text-ink">Email</strong>
                            <span class="text-sm text-warm-gray transition group-hover:text-loaction-600">hello@loaction.id</span>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Right: form --}}
            <form action="{{ route('consultation.submit') }}" method="POST" class="rounded-[2rem] bg-soft-bg p-6 shadow-soft ring-1 ring-loaction-100/60 reveal-right lg:p-8" novalidate>
                @csrf
                <div class="hidden" style="display:none;" aria-hidden="true">
                    <input type="text" name="b_address" tabindex="-1" autocomplete="off">
                </div>

                @if (session('status'))
                    <div class="mb-6 rounded-2xl bg-green-50 p-5 ring-1 ring-green-200">
                        <div class="flex items-start gap-3">
                            <svg class="mt-0.5 size-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div class="space-y-3">
                                <div>
                                    <strong class="block text-sm font-extrabold text-green-900">Permintaan Berhasil Terkirim!</strong>
                                    <p class="mt-1 text-xs text-green-700 leading-relaxed">{{ session('status') }}</p>
                                </div>
                                @if (session('whatsapp_url'))
                                    <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-xl bg-green-600 px-4 py-2.5 text-xs font-extrabold text-white shadow-sm transition hover:bg-green-700 hover:shadow-md">
                                        <svg class="size-4 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                        Lanjutkan Chat via WhatsApp Sekarang (Respon Cepat)
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 flex items-center gap-3 rounded-2xl bg-red-50 px-5 py-4 text-sm font-bold text-red-700">
                        <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                        Mohon periksa kembali data yang Anda isi.
                    </div>
                @endif

                <h3 class="mb-5 text-xl font-extrabold text-ink">Form Konsultasi</h3>

                <div class="grid gap-5 md:grid-cols-2">
                    <label class="field-label md:col-span-2">
                        Nama Lengkap
                        <input name="name" value="{{ old('name') }}" type="text" class="field-input" placeholder="Nama Anda" required>
                        @error('name') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label">
                        Email
                        <input name="email" value="{{ old('email') }}" type="email" class="field-input" placeholder="email@example.com">
                        @error('email') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label">
                        WhatsApp
                        <input name="phone" value="{{ old('phone') }}" type="tel" class="field-input" placeholder="08xxxxxxxxxx" required>
                        @error('phone') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label md:col-span-2">
                        Layanan yang Dibutuhkan
                        <select name="service" class="field-input" required>
                            <option value="">Pilih layanan</option>
                            @foreach ($services as $service)
                                <option value="{{ $service['title'] }}" @selected(old('service') === $service['title'])>{{ $service['title'] }}</option>
                            @endforeach
                        </select>
                        @error('service') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label">
                        Metode Sesi
                        <select name="session_type" class="field-input">
                            <option value="offline" @selected(old('session_type', 'offline') === 'offline')>Tatap Muka (Offline)</option>
                            <option value="online" @selected(old('session_type') === 'online')>Online (Zoom / Meet)</option>
                        </select>
                        @error('session_type') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label">
                        Preferensi Waktu
                        <select name="preferred_time" class="field-input">
                            <option value="fleksibel" @selected(old('preferred_time', 'fleksibel') === 'fleksibel')>Fleksibel / Kapan Saja</option>
                            <option value="pagi" @selected(old('preferred_time') === 'pagi')>Pagi (09:00 - 12:00)</option>
                            <option value="siang" @selected(old('preferred_time') === 'siang')>Siang (13:00 - 15:00)</option>
                            <option value="sore" @selected(old('preferred_time') === 'sore')>Sore (16:00 - 18:00)</option>
                        </select>
                        @error('preferred_time') <span class="field-error">{{ $message }}</span> @enderror
                    </label>

                    <label class="field-label md:col-span-2">
                        Pesan Singkat
                        <textarea name="message" rows="4" class="field-input" placeholder="Contoh: Saya ingin menjadwalkan tes minat bakat untuk siswa SMA.">{{ old('message') }}</textarea>
                        @error('message') <span class="field-error">{{ $message }}</span> @enderror
                    </label>
                </div>

                <button type="submit" class="btn-primary mt-6 w-full justify-center">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Kirim Permintaan Konsultasi
                </button>
            </form>
        </div>
    </section>

    {{-- ═══ FAQ ═══ --}}
    <section class="section-pad bg-soft-bg">
        <div class="section-container">
            <div class="mx-auto max-w-3xl text-center reveal">
                <p class="eyebrow justify-center">FAQ</p>
                <h2 class="heading-2">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="mx-auto mt-10 max-w-3xl grid gap-3 reveal">
                @php
                    $faqs = [
                        ['q' => 'Bagaimana cara menjadwalkan konsultasi?', 'a' => 'Anda dapat menghubungi kami melalui WhatsApp, email, atau mengisi form konsultasi di halaman ini. Tim kami akan segera merespons dalam 1x24 jam.'],
                        ['q' => 'Apakah layanan LoAction tersedia secara online?', 'a' => 'Ya, beberapa layanan kami tersedia secara online seperti konseling, psikoedukasi, dan webinar. Silakan hubungi kami untuk informasi lebih lanjut.'],
                        ['q' => 'Berapa biaya konsultasi?', 'a' => 'Biaya layanan bervariasi tergantung jenis dan cakupan layanan yang dipilih. Hubungi kami untuk mendapatkan penawaran yang sesuai kebutuhan Anda.'],
                        ['q' => 'Apakah psikolog LoAction berlisensi?', 'a' => 'Ya, seluruh psikolog LoAction memiliki Surat Izin Praktik Psikologi (SIPP) dan terdaftar resmi di HIMPSI.'],
                    ];
                @endphp
                @foreach ($faqs as $index => $faq)
                    <div class="faq-item">
                        <button class="faq-question" onclick="this.closest('.faq-item').classList.toggle('open')">
                            {{ $faq['q'] }}
                            <svg class="size-5 text-loaction-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p class="text-sm leading-7 text-warm-gray">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

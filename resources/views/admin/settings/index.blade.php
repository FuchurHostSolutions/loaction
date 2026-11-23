@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')
@section('page_title', 'Pengaturan Website (CMS)')
@section('page_description', 'Kelola informasi kontak, WhatsApp, sosial media, jam operasional, identitas, dan SEO website secara dinamis')

@section('content')
    <div class="max-w-5xl">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Tab Buttons -->
            <div class="flex items-center gap-2 overflow-x-auto border-b border-slate-200 pb-2">
                <button 
                    type="button" 
                    onclick="switchTab('tab-contact')" 
                    id="btn-tab-contact" 
                    class="tab-btn px-4 py-2.5 rounded-xl text-xs font-extrabold flex items-center gap-2 transition bg-loaction-500 text-white shadow-sm"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                    <span>Kontak & WhatsApp</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchTab('tab-location')" 
                    id="btn-tab-location" 
                    class="tab-btn px-4 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                    <span>Lokasi & Sosial Media</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchTab('tab-identity')" 
                    id="btn-tab-identity" 
                    class="tab-btn px-4 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/></svg>
                    <span>Branding & Beranda</span>
                </button>

                <button 
                    type="button" 
                    onclick="switchTab('tab-seo')" 
                    id="btn-tab-seo" 
                    class="tab-btn px-4 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                    <span>SEO & Webmaster</span>
                </button>
            </div>

            <!-- TAB 1: KONTAK & WHATSAPP -->
            <div id="tab-contact" class="tab-content bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-6">
                <div>
                    <h3 class="text-base font-extrabold text-ink">Kontak & Jalur WhatsApp</h3>
                    <p class="text-xs text-warm-gray mt-0.5">Semua tombol konsultasi WhatsApp dan floating chat di website publik terhubung langsung ke nomor ini.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="whatsapp_number" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Nomor WhatsApp Tujuan <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="whatsapp_number" 
                            id="whatsapp_number" 
                            value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '081234567890') }}" 
                            required 
                            placeholder="081234567890 atau 6281234567890" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-bold font-mono outline-none transition"
                            oninput="updateWaPreview()"
                        >
                        <p class="mt-1 text-[0.68rem] text-slate-400">Bisa diawali dengan 08... atau 628... (otomatis diformat sistem ke format internasional).</p>
                    </div>

                    <div>
                        <label for="whatsapp_display" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Tampilan Teks Nomor WhatsApp
                        </label>
                        <input 
                            type="text" 
                            name="whatsapp_display" 
                            id="whatsapp_display" 
                            value="{{ old('whatsapp_display', $settings['whatsapp_display'] ?? '+62 812-3456-7890') }}" 
                            placeholder="+62 812-3456-7890" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-semibold outline-none transition"
                        >
                        <p class="mt-1 text-[0.68rem] text-slate-400">Format teks yang tampil di layar kontak untuk dibaca klien.</p>
                    </div>
                </div>

                <div>
                    <label for="whatsapp_default_message" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Pesan Pembuka Otomatis WhatsApp
                    </label>
                    <textarea 
                        name="whatsapp_default_message" 
                        id="whatsapp_default_message" 
                        rows="2" 
                        placeholder="Halo LoAction, saya ingin konsultasi layanan psikologi..." 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                        oninput="updateWaPreview()"
                    >{{ old('whatsapp_default_message', $settings['whatsapp_default_message'] ?? 'Halo LoAction, saya ingin konsultasi layanan psikologi.') }}</textarea>
                    <p class="mt-1 text-[0.68rem] text-slate-400">Teks template yang otomatis terisi di kolom chat WhatsApp klien saat menekan tombol konsultasi.</p>
                </div>

                <!-- Live WhatsApp Preview Box -->
                <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-emerald-950">Pratinjau Tautan Chat Langsung</span>
                            <span id="waPreviewUrl" class="text-[0.7rem] font-mono text-emerald-800 break-all">Memuat tautan...</span>
                        </div>
                    </div>
                    <a id="waPreviewBtn" href="#" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-extrabold shadow-sm transition inline-flex items-center gap-1.5 self-start sm:self-auto shrink-0">
                        <span>Tes Buka WA &rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-3 border-t border-slate-100">
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Email Resmi <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email', $settings['email'] ?? 'hello@loaction.id') }}" 
                            required 
                            placeholder="hello@loaction.id" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Telepon Kantor / CS
                        </label>
                        <input 
                            type="text" 
                            name="phone" 
                            id="phone" 
                            value="{{ old('phone', $settings['phone'] ?? '+62 812-3456-7890') }}" 
                            placeholder="+62 812-3456-7890" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition"
                        >
                    </div>
                </div>
            </div>

            <!-- TAB 2: LOKASI & SOSIAL MEDIA -->
            <div id="tab-location" class="tab-content hidden bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-6">
                <div>
                    <h3 class="text-base font-extrabold text-ink">Lokasi Kantor & Media Sosial</h3>
                    <p class="text-xs text-warm-gray mt-0.5">Informasi operasional yang tampil pada halaman kontak, profil biro, dan footer situs.</p>
                </div>

                <div>
                    <label for="address" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Alamat Kantor Operasional
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="2" 
                        placeholder="Jl. Boulevard Raya No. 18, Jakarta / Bandung..." 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >{{ old('address', $settings['address'] ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="operating_hours" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Jam Operasional Layanan
                        </label>
                        <input 
                            type="text" 
                            name="operating_hours" 
                            id="operating_hours" 
                            value="{{ old('operating_hours', $settings['operating_hours'] ?? 'Senin – Sabtu: 08.30 – 17.00 WIB') }}" 
                            placeholder="Senin – Sabtu: 08.30 – 17.00 WIB" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="maps_url" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Link Google Maps
                        </label>
                        <input 
                            type="url" 
                            name="maps_url" 
                            id="maps_url" 
                            value="{{ old('maps_url', $settings['maps_url'] ?? '') }}" 
                            placeholder="https://maps.google.com/..." 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-3 border-t border-slate-100">
                    <div>
                        <label for="instagram_url" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Link Profil Instagram
                        </label>
                        <input 
                            type="url" 
                            name="instagram_url" 
                            id="instagram_url" 
                            value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" 
                            placeholder="https://www.instagram.com/loaction.id" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="instagram_handle" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Username Instagram (Teks Label)
                        </label>
                        <input 
                            type="text" 
                            name="instagram_handle" 
                            id="instagram_handle" 
                            value="{{ old('instagram_handle', $settings['instagram_handle'] ?? '@loaction.id') }}" 
                            placeholder="@loaction.id" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition"
                        >
                    </div>
                </div>
            </div>

            <!-- TAB 3: BRANDING & BERANDA -->
            <div id="tab-identity" class="tab-content hidden bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-6">
                <div>
                    <h3 class="text-base font-extrabold text-ink">Identitas & Teks Beranda</h3>
                    <p class="text-xs text-warm-gray mt-0.5">Sesuaikan nama brand, slogan, dan copy narasi utama di halaman depan.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="site_name" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Nama Brand / Entitas <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="site_name" 
                            id="site_name" 
                            value="{{ old('site_name', $settings['site_name'] ?? 'LoAction') }}" 
                            required 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-black outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="site_tagline" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Tagline Utama
                        </label>
                        <input 
                            type="text" 
                            name="site_tagline" 
                            id="site_tagline" 
                            value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" 
                            placeholder="Biro Psikologi Terapan & Uji Kompetensi SDM" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-bold outline-none transition"
                        >
                    </div>
                </div>

                <div>
                    <label for="hero_title" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Judul Utama Banner Hero Beranda
                    </label>
                    <input 
                        type="text" 
                        name="hero_title" 
                        id="hero_title" 
                        value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" 
                        placeholder="Layanan Psikologi Terapan yang Mengedepankan Kualitas & Empati" 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-extrabold outline-none transition"
                    >
                </div>

                <div>
                    <label for="hero_subtitle" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Subjudul Banner Hero Beranda
                    </label>
                    <textarea 
                        name="hero_subtitle" 
                        id="hero_subtitle" 
                        rows="2" 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-3 border-t border-slate-100">
                    <div>
                        <label for="legal_info" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Info Legalitas / SK Kemenkumham
                        </label>
                        <input 
                            type="text" 
                            name="legal_info" 
                            id="legal_info" 
                            value="{{ old('legal_info', $settings['legal_info'] ?? 'SK Kemenkumham No. AHU-0001501.AH (2019)') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-semibold outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="about_excerpt" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                            Ringkasan Profil di Footer
                        </label>
                        <textarea 
                            name="about_excerpt" 
                            id="about_excerpt" 
                            rows="2" 
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                        >{{ old('about_excerpt', $settings['about_excerpt'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- TAB 4: SEO & ANALITIK -->
            <div id="tab-seo" class="tab-content hidden bg-white rounded-3xl p-6 sm:p-8 shadow-sm ring-1 ring-slate-200/80 space-y-6">
                <div>
                    <h3 class="text-base font-extrabold text-ink">Optimasi Mesin Pencari (SEO) & Analitik</h3>
                    <p class="text-xs text-warm-gray mt-0.5">Konfigurasi metadata Google Search dan integrasi pelacakan statistik.</p>
                </div>

                <div>
                    <label for="meta_description" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Default Meta Description
                    </label>
                    <textarea 
                        name="meta_description" 
                        id="meta_description" 
                        rows="3" 
                        placeholder="Deskripsi singkat yang tampil saat link website muncul di hasil pencarian Google..." 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                    <p class="mt-1 text-[0.68rem] text-slate-400">Disarankan antara 140–160 karakter untuk performa SEO terbaik.</p>
                </div>

                <div>
                    <label for="meta_keywords" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Target Kata Kunci (Keywords)
                    </label>
                    <input 
                        type="text" 
                        name="meta_keywords" 
                        id="meta_keywords" 
                        value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" 
                        placeholder="biro psikologi, konseling, tes minat bakat, uji kompetensi bnsp" 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-medium outline-none transition"
                    >
                    <p class="mt-1 text-[0.68rem] text-slate-400">Pisahkan dengan koma.</p>
                </div>

                <div class="pt-3 border-t border-slate-100">
                    <label for="google_analytics_id" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Google Analytics Measurement ID
                    </label>
                    <input 
                        type="text" 
                        name="google_analytics_id" 
                        id="google_analytics_id" 
                        value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? '') }}" 
                        placeholder="Contoh: G-XXXXXXXXXX" 
                        class="w-full max-w-sm px-4 py-2.5 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-xs font-mono font-bold outline-none transition"
                    >
                    <p class="mt-1 text-[0.68rem] text-slate-400">Masukkan ID Google Analytics 4 (GA4) Anda jika ingin mengaktifkan tracking eksternal.</p>
                </div>
            </div>

            <!-- Sticky Save Bar -->
            <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm ring-1 ring-slate-200/80 flex items-center justify-between">
                <span class="text-xs font-semibold text-warm-gray">Pastikan data yang diinput sudah benar sebelum menyimpan.</span>
                <button type="submit" class="px-6 py-3 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-sm shadow-lg shadow-loaction-500/25 transition active:scale-95 flex items-center gap-2">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                    <span>Simpan Perubahan Pengaturan</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        function switchTab(tabId) {
            // Hide all contents
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            
            // Remove active classes from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-loaction-500', 'text-white', 'shadow-sm');
                btn.classList.add('text-slate-600', 'hover:bg-slate-100');
            });

            // Show selected content
            const content = document.getElementById(tabId);
            if (content) content.classList.remove('hidden');

            // Set active button
            const activeBtn = document.getElementById('btn-' + tabId);
            if (activeBtn) {
                activeBtn.classList.add('bg-loaction-500', 'text-white', 'shadow-sm');
                activeBtn.classList.remove('text-slate-600', 'hover:bg-slate-100');
            }
        }

        function updateWaPreview() {
            const numInput = document.getElementById('whatsapp_number');
            const msgInput = document.getElementById('whatsapp_default_message');
            const previewUrl = document.getElementById('waPreviewUrl');
            const previewBtn = document.getElementById('waPreviewBtn');

            if (!numInput || !previewUrl || !previewBtn) return;

            let clean = (numInput.value || '').replace(/[^0-9]/g, '');
            if (clean.startsWith('0')) {
                clean = '62' + clean.substring(1);
            }
            if (!clean) clean = '6281234567890';

            const msg = msgInput ? msgInput.value : '';
            const fullUrl = 'https://wa.me/' + clean + '?text=' + encodeURIComponent(msg);

            previewUrl.textContent = fullUrl;
            previewBtn.href = fullUrl;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateWaPreview();
        });
    </script>
@endsection

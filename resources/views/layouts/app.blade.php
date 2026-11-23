<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', setting('meta_description', 'LoAction adalah biro psikologi terapan yang melayani personal care, pendidikan, industri-organisasi, dan uji kompetensi SDM sejak 2017.'))">
    <meta name="keywords" content="@yield('meta_keywords', setting('meta_keywords', 'biro psikologi, psikolog, konseling, tes IQ, minat bakat, uji kompetensi, SDM, LoAction'))">

    <title>@yield('title', setting('site_name', 'LoAction') . ' | ' . setting('site_tagline', 'Biro Psikologi Terapan'))</title>

    @if($gaId = setting('google_analytics_id'))
        <!-- Google Analytics (GA4) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $gaId }}');
        </script>
    @endif

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Canonical & Robots -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:site_name" content="LoAction Biro Psikologi">
    <meta property="og:title" content="@yield('title', 'LoAction | Biro Psikologi Terapan')">
    <meta property="og:description" content="@yield('meta_description', 'Handle with care — Layanan psikologis untuk personal care, pendidikan, industri-organisasi, dan uji kompetensi SDM.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'LoAction | Biro Psikologi Terapan')">
    <meta name="twitter:description" content="@yield('meta_description', 'Handle with care — Biro psikologi terapan terpercaya sejak 2017.')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Schema.org JSON-LD Structured Data for Local & Professional Service SEO -->
    <script type="application/ld+json">
    {!! json_encode([
        chr(64) . 'context'    => 'https://schema.org',
        chr(64) . 'type'       => 'ProfessionalService',
        'name'        => 'LoAction - Biro Psikologi Terapan',
        'legalName'   => 'Biro Psikologi LoAction',
        'url'         => url('/'),
        'logo'        => asset('images/logo.png'),
        'image'       => asset('images/logo.png'),
        'description' => 'Biro psikologi terapan berbadan hukum (SK Kemenkumham No. AHU-0001501.AH Tahun 2019) dengan tagline \'Handle with Care\' melayani asesmen, konseling individu, psikotes sekolah, dan uji kompetensi SDM.',
        'telephone'   => '+6281234567890',
        'email'       => 'hello@loaction.id',
        'priceRange'  => '$$',
        'address'     => [
            chr(64) . 'type' => 'PostalAddress',
            'addressCountry' => 'ID',
        ],
        'sameAs'      => [
            $instagramUrl ?? 'https://www.instagram.com/loaction.id',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-5 focus:top-5 focus:z-[100] focus:rounded-xl focus:bg-loaction-600 focus:px-4 focus:py-3 focus:text-white">
        Lewati ke konten utama
    </a>

    <!-- ═══ HEADER ═══ -->
    <header class="sticky top-0 z-50 transition-all duration-300" id="siteHeader">
        <!-- Top bar -->
        <div class="bg-ink text-white">
            <div class="section-container flex min-h-10 items-center justify-between gap-4 py-1.5">
                <div class="flex items-center gap-5 text-xs font-bold text-white/70">
                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener" class="hidden items-center gap-1.5 transition hover:text-loaction-400 sm:flex">
                        <svg class="size-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        {{ setting('instagram_handle', '@loaction.id') }}
                    </a>
                    <a href="mailto:{{ setting('email', 'hello@loaction.id') }}" class="hidden items-center gap-1.5 transition hover:text-loaction-400 md:flex">
                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        {{ setting('email', 'hello@loaction.id') }}
                    </a>
                </div>
                <a href="{{ route('kontak') }}" class="rounded-full bg-loaction-500 px-4 py-1.5 text-xs font-extrabold uppercase tracking-wide text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-loaction-600 hover:shadow-md">
                    Jadwalkan Konsultasi
                </a>
            </div>
        </div>

        <!-- Main nav -->
        <nav class="border-b border-loaction-100/40 bg-white/90 backdrop-blur-xl transition-all duration-300" aria-label="Navigasi utama" id="mainNav">
            <div class="section-container flex min-h-[4.5rem] items-center justify-between gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="LoAction beranda">
                    <img src="{{ asset('images/logo.png') }}" alt="LoAction Logo" class="h-11 w-11 rounded-full object-cover shadow-sm transition-transform duration-300 hover:scale-105">
                    <div class="hidden sm:block">
                        <span class="text-lg font-extrabold text-ink leading-tight">Lo<span class="text-loaction-500">Action</span></span>
                        <span class="block text-[0.6rem] font-bold uppercase tracking-widest text-warm-gray">Biro Psikologi</span>
                    </div>
                </a>

                <button id="navToggle" type="button" class="grid size-10 place-items-center rounded-xl bg-loaction-50 text-loaction-600 transition hover:bg-loaction-100 lg:hidden" aria-label="Buka menu" aria-expanded="false">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="hidden items-center gap-8 text-sm font-bold text-ink lg:flex" id="desktopMenu">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    <a class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a>
                    <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a>
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Artikel</a>
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                    <a href="{{ route('kontak') }}" class="ml-2 rounded-full bg-loaction-500 px-5 py-2.5 text-xs font-extrabold uppercase tracking-wide text-white shadow-md transition hover:-translate-y-0.5 hover:bg-loaction-600 hover:shadow-lg">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile menu overlay -->
    <div id="mobileOverlay" class="mobile-menu-overlay" aria-hidden="true"></div>
    <div id="mobilePanel" class="mobile-menu-panel" aria-hidden="true">
        <div class="flex items-center justify-between border-b border-loaction-100 p-5">
            <span class="text-lg font-extrabold text-ink">Menu</span>
            <button id="mobileClose" class="grid size-10 place-items-center rounded-xl bg-loaction-50 text-loaction-600 transition hover:bg-loaction-100">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="flex flex-col gap-1 p-4">
            <a class="mobile-link rounded-xl px-4 py-3.5 text-sm font-extrabold transition {{ request()->routeIs('home') ? 'bg-loaction-50 text-loaction-600' : 'text-ink hover:bg-loaction-50' }}" href="{{ route('home') }}">Beranda</a>
            <a class="mobile-link rounded-xl px-4 py-3.5 text-sm font-extrabold transition {{ request()->routeIs('layanan') ? 'bg-loaction-50 text-loaction-600' : 'text-ink hover:bg-loaction-50' }}" href="{{ route('layanan') }}">Layanan</a>
            <a class="mobile-link rounded-xl px-4 py-3.5 text-sm font-extrabold transition {{ request()->routeIs('profil') ? 'bg-loaction-50 text-loaction-600' : 'text-ink hover:bg-loaction-50' }}" href="{{ route('profil') }}">Profil</a>
            <a class="mobile-link rounded-xl px-4 py-3.5 text-sm font-extrabold transition {{ request()->routeIs('posts.*') ? 'bg-loaction-50 text-loaction-600' : 'text-ink hover:bg-loaction-50' }}" href="{{ route('posts.index') }}">Artikel</a>
            <a class="mobile-link rounded-xl px-4 py-3.5 text-sm font-extrabold transition {{ request()->routeIs('kontak') ? 'bg-loaction-50 text-loaction-600' : 'text-ink hover:bg-loaction-50' }}" href="{{ route('kontak') }}">Kontak</a>
        </div>
        <div class="mt-auto border-t border-loaction-100 p-5">
            <a href="{{ route('kontak') }}" class="btn-primary w-full justify-center text-center mobile-link">Jadwalkan Konsultasi</a>
        </div>
    </div>

    <!-- ═══ MAIN ═══ -->
    <main id="main">
        @yield('content')
    </main>

    <!-- ═══ FOOTER ═══ -->
    <footer class="bg-ink pt-16 pb-8 text-white">
        <div class="section-container">
            <div class="grid gap-10 lg:grid-cols-[1.4fr_0.6fr_0.6fr_0.8fr]">
                <!-- Brand -->
                <div>
                    <div class="mb-5 flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="LoAction Logo" class="size-12 rounded-full object-cover shadow-md">
                        <div>
                            <span class="text-xl font-extrabold">Lo<span class="text-loaction-400">Action</span></span>
                            <span class="block text-[0.6rem] font-bold uppercase tracking-widest text-white/50">Biro Psikologi Terapan</span>
                        </div>
                    </div>
                    <p class="max-w-sm text-sm leading-7 text-white/60">{{ setting('about_excerpt', 'Biro psikologi terapan untuk personal care, pendidikan, industri-organisasi, dan uji kompetensi SDM.') }} <strong class="text-loaction-400">{{ setting('tagline', 'Handle with care') }}</strong></p>
                    <div class="mt-5 flex gap-3">
                        <a href="{{ $instagramUrl }}" target="_blank" rel="noopener" class="grid size-10 place-items-center rounded-xl bg-white/8 text-white/70 transition hover:bg-loaction-500 hover:text-white" aria-label="Instagram">
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="{{ $whatsappUrl }}" class="grid size-10 place-items-center rounded-xl bg-white/8 text-white/70 transition hover:bg-green-600 hover:text-white" aria-label="WhatsApp">
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Nav links -->
                <div>
                    <h3 class="mb-5 text-xs font-extrabold uppercase tracking-[0.18em] text-loaction-400">Navigasi</h3>
                    <div class="grid gap-3 text-sm font-semibold text-white/60">
                        <a href="{{ route('home') }}" class="transition hover:text-white hover:translate-x-1">Beranda</a>
                        <a href="{{ route('layanan') }}" class="transition hover:text-white hover:translate-x-1">Layanan</a>
                        <a href="{{ route('profil') }}" class="transition hover:text-white hover:translate-x-1">Profil Biro</a>
                        <a href="{{ route('posts.index') }}" class="transition hover:text-white hover:translate-x-1">Artikel & Edukasi</a>
                        <a href="{{ route('kontak') }}" class="transition hover:text-white hover:translate-x-1">Kontak</a>
                    </div>
                </div>

                <!-- Layanan -->
                <div>
                    <h3 class="mb-5 text-xs font-extrabold uppercase tracking-[0.18em] text-loaction-400">Layanan</h3>
                    <div class="grid gap-3 text-sm font-semibold text-white/60">
                        <span>Personal Care</span>
                        <span>Pendidikan</span>
                        <span>Industri & Organisasi</span>
                        <span>Uji Kompetensi</span>
                    </div>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="mb-5 text-xs font-extrabold uppercase tracking-[0.18em] text-loaction-400">Hubungi Kami</h3>
                    <div class="grid gap-3 text-sm font-semibold text-white/60">
                        <a href="{{ $instagramUrl }}" target="_blank" rel="noopener" class="flex items-center gap-2 transition hover:text-white">
                            <svg class="size-4 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            {{ setting('instagram_handle', '@loaction.id') }}
                        </a>
                        <a href="mailto:{{ setting('email', 'hello@loaction.id') }}" class="flex items-center gap-2 transition hover:text-white">
                            <svg class="size-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                            {{ setting('email', 'hello@loaction.id') }}
                        </a>
                        <a href="{{ $whatsappUrl }}" class="flex items-center gap-2 transition hover:text-white">
                            <svg class="size-4 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp LoAction
                        </a>
                    </div>
                </div>
            </div>

            <!-- Divider & Copyright -->
            <div class="mt-14 border-t border-white/10 pt-6 flex flex-col items-center gap-3 sm:flex-row sm:justify-between">
                <p class="text-xs text-white/40">© {{ date('Y') }} {{ setting('site_name', 'LoAction') }}. Semua hak dilindungi.</p>
                <p class="text-xs text-white/30">{{ setting('legal_info', 'SK Kemenkumham No. AHU-0001501.AH (2019)') }}</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="{{ $whatsappUrl }}" class="wa-float" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
        <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="hidden sm:inline">Chat WhatsApp</span>
    </a>
</body>
</html>

<!doctype html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') | LoAction</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans text-ink antialiased">
    <div class="min-h-full flex flex-col lg:flex-row">
        
        <!-- Mobile Header Bar -->
        <header class="lg:hidden bg-ink text-white flex items-center justify-between px-4 py-3 sticky top-0 z-40 shadow-sm">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/logo.png') }}" alt="LoAction Logo" class="h-8 w-auto max-h-8 shrink-0" style="max-height: 32px; width: auto;">
                <span class="font-bold text-sm tracking-tight text-white">LoAction <span class="text-loaction-400">Admin</span></span>
            </div>
            <button type="button" id="mobileMenuBtn" class="p-2 text-white/80 hover:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-loaction-400" aria-label="Menu">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </header>

        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-ink text-white flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0 lg:static lg:h-screen lg:sticky lg:top-0 shrink-0">
            <!-- Brand header -->
            <div class="h-16 flex items-center justify-between px-6 border-b border-white/10 shrink-0">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 min-w-0">
                    <img src="{{ asset('images/logo.png') }}" alt="LoAction Logo" class="h-8 w-auto max-h-8 shrink-0" style="max-height: 32px; width: auto;">
                    <div class="leading-tight min-w-0">
                        <span class="block font-bold text-sm tracking-tight text-white truncate">LoAction</span>
                        <span class="block text-[0.65rem] font-semibold tracking-wider uppercase text-loaction-400 truncate">Admin Portal</span>
                    </div>
                </a>
                <button type="button" id="sidebarCloseBtn" class="lg:hidden text-white/70 hover:text-white p-1 rounded">
                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-4 py-5 space-y-1">
                <p class="px-3 text-[0.65rem] font-extrabold uppercase tracking-widest text-white/40 mb-2">Utama</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.consultations.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.consultations.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.666.052 1.32.38 1.657.965l1.642 2.855c.371.645 1.258.645 1.629 0l1.643-2.855c.336-.585.99-.913 1.656-.965 1.09-.085 2.17-.207 3.239-.364 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                        <span>Konsultasi</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\Consultation::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-amber-500 text-ink">{{ $pendingCount }}</span>
                    @endif
                </a>

                <p class="pt-5 px-3 text-[0.65rem] font-extrabold uppercase tracking-widest text-white/40 mb-2">Konten Website</p>

                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.services.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/></svg>
                    Layanan
                </a>

                <a href="{{ route('admin.audiences.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.audiences.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    Target Audiens
                </a>

                <a href="{{ route('admin.competencies.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.competencies.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                    Uji Kompetensi
                </a>

                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                    Testimoni
                </a>

                <p class="pt-5 px-3 text-[0.65rem] font-extrabold uppercase tracking-widest text-white/40 mb-2">Sistem</p>

                <a href="{{ route('admin.logs.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.logs.*') ? 'bg-loaction-500 text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Log Aktivitas</span>
                    </div>
                </a>
            </nav>

            <!-- Bottom User & Logout -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center justify-between gap-3 mb-3 px-2">
                    <div class="min-w-0 flex items-center gap-2.5">
                        <div class="size-8 rounded-full bg-loaction-500 text-white flex items-center justify-center font-bold text-xs shrink-0">
                            {{ mb_substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-[0.65rem] text-white/60 truncate">{{ Auth::user()->email ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-white/10 text-[0.7rem] font-bold text-white/80 hover:bg-white/20 hover:text-white transition">
                        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        Website
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-red-500/20 text-red-300 hover:bg-red-500/30 hover:text-red-200 text-[0.7rem] font-bold transition">
                            <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Desktop Topbar -->
            <header class="hidden lg:flex items-center justify-between px-8 py-4 bg-white border-b border-slate-200">
                <div>
                    <h1 class="text-xl font-extrabold text-ink tracking-tight">@yield('page_title', 'Dashboard')</h1>
                    <p class="text-xs text-warm-gray">@yield('page_description', 'Kelola operasional dan konten website LoAction')</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-loaction-600 bg-loaction-50 hover:bg-loaction-100 px-3.5 py-2 rounded-xl transition">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                        Lihat Beranda
                    </a>
                </div>
            </header>

            <!-- Alerts -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @if (session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-emerald-50 p-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200/80 shadow-sm animate-fade-up">
                        <svg class="size-5 shrink-0 text-emerald-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div class="flex-1">{{ session('success') }}</div>
                    </div>
                @endif

                @if (session('info'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-sky-50 p-4 text-sm font-semibold text-sky-800 ring-1 ring-sky-200/80 shadow-sm animate-fade-up">
                        <svg class="size-5 shrink-0 text-sky-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
                        <div class="flex-1">{{ session('info') }}</div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-rose-50 p-4 text-sm text-rose-800 ring-1 ring-rose-200/80 shadow-sm animate-fade-up">
                        <div class="flex items-center gap-2 font-bold text-rose-900 mb-1">
                            <svg class="size-5 shrink-0 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                            Terdapat beberapa kesalahan:
                        </div>
                        <ul class="list-disc list-inside space-y-0.5 text-xs text-rose-700 pl-6">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Drawer Overlay -->
    <div id="drawerOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('mobileMenuBtn');
            const closeBtn = document.getElementById('sidebarCloseBtn');
            const overlay = document.getElementById('drawerOverlay');

            function toggleSidebar() {
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                }
            }

            if (menuBtn) menuBtn.addEventListener('click', toggleSidebar);
            if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>

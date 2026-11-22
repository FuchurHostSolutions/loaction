<!doctype html>
<html lang="id" class="h-full bg-gradient-to-br from-[#fff7ed] via-white to-[#fef3e2]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masuk Admin | LoAction</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 sm:p-6 font-sans text-ink antialiased">
    <div class="w-full max-w-md">
        <!-- Logo and Brand -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="LoAction Logo" class="h-12 w-auto max-h-12 shrink-0" style="max-height: 48px; width: auto;">
                <div class="text-left">
                    <span class="block text-xl font-extrabold tracking-tight text-ink">LoAction</span>
                    <span class="block text-xs font-semibold text-loaction-600 tracking-wider uppercase">Biro Psikologi Terapan</span>
                </div>
            </a>
            <h1 class="mt-6 text-2xl font-black text-ink tracking-tight">Masuk ke Portal Admin</h1>
            <p class="mt-1.5 text-xs sm:text-sm text-warm-gray">Gunakan email atau username akun admin Anda</p>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl ring-1 ring-slate-200/80">
            @if (session('info'))
                <div class="mb-5 rounded-2xl bg-sky-50 p-3.5 text-xs font-semibold text-sky-800 ring-1 ring-sky-200/80">
                    {{ session('info') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 rounded-2xl bg-rose-50 p-3.5 text-xs font-semibold text-rose-800 ring-1 ring-rose-200/80">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="login" class="block text-xs font-bold uppercase tracking-wider text-warm-gray mb-1.5">
                        Email atau Username <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="login" 
                        id="login" 
                        value="{{ old('login') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-semibold outline-none transition"
                    >
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-warm-gray">
                            Kata Sandi <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required 
                            autocomplete="current-password"
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-loaction-500 focus:ring-2 focus:ring-loaction-200 text-sm font-semibold outline-none transition pr-10"
                        >
                        <button type="button" id="togglePasswordBtn" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1" aria-label="Lihat kata sandi">
                            <svg id="eyeIcon" class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="size-4 rounded border-slate-300 text-loaction-600 focus:ring-loaction-400">
                        <span class="text-xs font-medium text-warm-gray">Ingat saya</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-loaction-500 hover:bg-loaction-600 text-white font-extrabold text-sm tracking-wide shadow-lg shadow-loaction-500/25 transition active:scale-[0.99] flex items-center justify-center gap-2">
                        <span>Masuk ke Akun</span>
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to home -->
        <p class="text-center mt-6 text-xs text-warm-gray">
            <a href="{{ route('home') }}" class="font-bold text-loaction-600 hover:text-loaction-700 transition">
                &larr; Kembali ke Website LoAction
            </a>
        </p>
    </div>

    <script>
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const passwordInput = document.getElementById('password');
        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });
        }
    </script>
</body>
</html>

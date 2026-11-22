<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required'    => 'Email atau Username wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $loginInput = trim($credentials['login']);
        $remember = $request->boolean('remember');

        // Resolusi email jika user memasukkan username
        $email = $loginInput;
        if (! filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $loginInput . '@loaction.id')
                ->orWhere('name', $loginInput)
                ->orWhere('name', 'like', $loginInput . ' %')
                ->first();

            if ($user) {
                $email = $user->email;
            } else {
                $email = $loginInput . '@loaction.id';
            }
        }

        if (Auth::attempt(['email' => $email, 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            ActivityLog::record(
                action: 'auth.login',
                description: "Admin '{$user->name}' ({$user->email}) berhasil masuk ke portal admin.",
                actionType: 'auth',
                subject: $user,
                properties: ['login_input' => $loginInput, 'remember' => $remember]
            );

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        ActivityLog::record(
            action: 'auth.failed',
            description: "Percobaan masuk gagal untuk kredensial login: '{$loginInput}'.",
            actionType: 'auth',
            properties: ['login_input' => $loginInput]
        );

        return back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors(['login' => 'Email/Username atau kata sandi tidak cocok.']);
    }

    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user) {
            ActivityLog::record(
                action: 'auth.logout',
                description: "Admin '{$user->name}' keluar dari portal admin.",
                actionType: 'auth',
                user: $user
            );
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('info', 'Anda telah berhasil keluar dari sistem admin.');
    }
}

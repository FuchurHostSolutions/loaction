<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (str_starts_with((string) config('app.url'), 'https://') || app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Share social URLs with all views globally
        View::share([
            'instagramUrl' => 'https://www.instagram.com/p/DSl2deij9Ig/?igsh=ajM1b3B5eXFwaWtp',
            'whatsappUrl'  => 'https://wa.me/6281234567890?text=Halo%20LoAction,%20saya%20ingin%20konsultasi%20layanan%20psikologi.',
        ]);
    }
}

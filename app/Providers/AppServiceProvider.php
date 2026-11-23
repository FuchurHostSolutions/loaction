<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (!function_exists('setting')) {
            function setting(string $key, mixed $default = null): mixed {
                return \App\Models\Setting::get($key, $default);
            }
        }

        if (!function_exists('whatsapp_url')) {
            function whatsapp_url(?string $customText = null): string {
                return \App\Models\Setting::whatsappUrl($customText);
            }
        }
    }

    public function boot(): void
    {
        if (str_starts_with((string) config('app.url'), 'https://') || app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Share dynamic settings & social URLs with all views globally
        View::composer('*', function ($view) {
            $view->with([
                'siteSettings' => \App\Models\Setting::getAllSettings(),
                'whatsappUrl'  => \App\Models\Setting::whatsappUrl(),
                'instagramUrl' => \App\Models\Setting::instagramUrl(),
            ]);
        });
    }
}

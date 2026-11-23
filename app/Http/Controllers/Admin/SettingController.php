<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the CMS settings management page.
     */
    public function index(): View
    {
        $settings = Setting::getAllSettings();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update CMS website settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // General / Brand
            'site_name'                => ['required', 'string', 'max:255'],
            'site_tagline'             => ['nullable', 'string', 'max:255'],
            'legal_info'               => ['nullable', 'string', 'max:255'],
            'hero_title'               => ['nullable', 'string', 'max:500'],
            'hero_subtitle'            => ['nullable', 'string', 'max:1000'],
            'about_excerpt'            => ['nullable', 'string', 'max:1000'],

            // Contact
            'whatsapp_number'          => ['required', 'string', 'max:50'],
            'whatsapp_display'         => ['nullable', 'string', 'max:50'],
            'whatsapp_default_message' => ['nullable', 'string', 'max:500'],
            'email'                    => ['required', 'email', 'max:255'],
            'phone'                    => ['nullable', 'string', 'max:50'],

            // Location & Social
            'address'                  => ['nullable', 'string', 'max:500'],
            'operating_hours'          => ['nullable', 'string', 'max:255'],
            'instagram_url'            => ['nullable', 'url', 'max:500'],
            'instagram_handle'         => ['nullable', 'string', 'max:100'],
            'maps_url'                 => ['nullable', 'url', 'max:500'],

            // SEO
            'meta_description'         => ['nullable', 'string', 'max:500'],
            'meta_keywords'            => ['nullable', 'string', 'max:500'],
            'google_analytics_id'      => ['nullable', 'string', 'max:50'],
        ]);

        $groups = [
            'site_name'                => 'general',
            'site_tagline'             => 'general',
            'legal_info'               => 'general',
            'hero_title'               => 'general',
            'hero_subtitle'            => 'general',
            'about_excerpt'            => 'general',
            'whatsapp_number'          => 'contact',
            'whatsapp_display'         => 'contact',
            'whatsapp_default_message' => 'contact',
            'email'                    => 'contact',
            'phone'                    => 'contact',
            'address'                  => 'location',
            'operating_hours'          => 'location',
            'instagram_url'            => 'social',
            'instagram_handle'         => 'social',
            'maps_url'                 => 'location',
            'meta_description'         => 'seo',
            'meta_keywords'            => 'seo',
            'google_analytics_id'      => 'seo',
        ];

        foreach ($validated as $key => $value) {
            $group = $groups[$key] ?? 'general';
            Setting::set($key, $value, $group);
        }

        // Clear public page caches so updates reflect immediately
        Cache::forget('loaction_public_home');
        Cache::forget(Setting::CACHE_KEY);

        ActivityLog::record(
            action: 'setting.update',
            description: "Memperbarui konfigurasi pengaturan umum website (CMS).",
            actionType: 'master_data'
        );

        $activeTab = $request->input('active_tab', 'contact');
        $tabAnchor = match ($activeTab) {
            'tab-location', 'location' => 'location',
            'tab-identity', 'identity' => 'identity',
            'tab-seo', 'seo'           => 'seo',
            default                    => 'contact',
        };

        return redirect()->to(route('admin.settings.index') . '#' . $tabAnchor)
            ->with('success', 'Pengaturan website berhasil diperbarui dan telah aktif.');
    }
}

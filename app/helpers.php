<?php

if (!function_exists('setting')) {
    /**
     * Get a website setting value by key with optional fallback.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('whatsapp_url')) {
    /**
     * Generate dynamic WhatsApp chat link with optional custom text.
     */
    function whatsapp_url(?string $customText = null): string
    {
        return \App\Models\Setting::whatsappUrl($customText);
    }
}

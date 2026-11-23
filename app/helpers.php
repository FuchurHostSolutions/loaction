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
     * Generate dynamic WhatsApp chat link with optional custom text and optional number.
     */
    function whatsapp_url(?string $customText = null, ?string $number = null): string
    {
        return \App\Models\Setting::whatsappUrl($customText, $number);
    }
}

if (!function_exists('whatsapp_numbers')) {
    /**
     * Get list of all active WhatsApp numbers.
     */
    function whatsapp_numbers(?string $customText = null): array
    {
        return \App\Models\Setting::whatsappNumbers($customText);
    }
}

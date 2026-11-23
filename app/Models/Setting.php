<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    public const CACHE_KEY = 'loaction_settings';

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget(self::CACHE_KEY);
        });

        static::deleted(function () {
            Cache::forget(self::CACHE_KEY);
        });
    }

    /**
     * Retrieve all settings as a key-value associative array (cached).
     */
    public static function getAllSettings(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get a specific setting value with fallback.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = static::getAllSettings();

        return array_key_exists($key, $settings) && !is_null($settings[$key])
            ? $settings[$key]
            : $default;
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'type'  => $type,
            ]
        );

        Cache::forget(self::CACHE_KEY);

        return $setting;
    }

    /**
     * Helper to generate dynamic WhatsApp click-to-chat URL.
     */
    public static function whatsappUrl(?string $customText = null): string
    {
        $rawNumber = static::get('whatsapp_number', '6281234567890');
        $cleanNumber = preg_replace('/[^0-9]/', '', (string) $rawNumber);

        if (str_starts_with($cleanNumber, '0')) {
            $cleanNumber = '62' . substr($cleanNumber, 1);
        }

        $defaultMessage = static::get(
            'whatsapp_default_message',
            'Halo LoAction, saya ingin konsultasi layanan psikologi.'
        );

        $message = $customText ?: $defaultMessage;

        return 'https://wa.me/' . $cleanNumber . '?text=' . rawurlencode($message);
    }

    /**
     * Helper to get Instagram URL.
     */
    public static function instagramUrl(): string
    {
        return static::get(
            'instagram_url',
            'https://www.instagram.com/p/DSl2deij9Ig/?igsh=ajM1b3B5eXFwaWtp'
        );
    }
}

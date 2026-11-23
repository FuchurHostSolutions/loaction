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
    public static function whatsappUrl(?string $customText = null, ?string $number = null): string
    {
        $rawNumber = $number ?: static::get('whatsapp_number', '081234567890');
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
     * Get all active WhatsApp numbers as an array of structured items.
     *
     * @return array<int, array{number: string, clean_number: string, display: string, label: string, url: string, is_primary: bool}>
     */
    public static function whatsappNumbers(?string $customText = null): array
    {
        $defaultMessage = static::get(
            'whatsapp_default_message',
            'Halo LoAction, saya ingin konsultasi layanan psikologi.'
        );
        $message = $customText ?: $defaultMessage;

        $json = static::get('whatsapp_numbers');
        $items = [];

        if ($json) {
            $decoded = is_string($json) ? json_decode($json, true) : $json;
            if (is_array($decoded) && !empty($decoded)) {
                foreach ($decoded as $index => $item) {
                    $rawNumber = trim((string) ($item['number'] ?? ''));
                    if (empty($rawNumber)) {
                        continue;
                    }

                    $cleanNumber = preg_replace('/[^0-9]/', '', $rawNumber);
                    if (str_starts_with($cleanNumber, '0')) {
                        $cleanNumber = '62' . substr($cleanNumber, 1);
                    }

                    $label = !empty($item['label']) ? trim($item['label']) : 'Customer Service ' . ($index + 1);
                    $display = !empty($item['display']) ? trim($item['display']) : ('+' . $cleanNumber);

                    $items[] = [
                        'number'       => $rawNumber,
                        'clean_number' => $cleanNumber,
                        'display'      => $display,
                        'label'        => $label,
                        'url'          => 'https://wa.me/' . $cleanNumber . '?text=' . rawurlencode($message),
                        'is_primary'   => $index === 0,
                    ];
                }
            }
        }

        // Fallback to legacy single number if whatsapp_numbers is empty
        if (empty($items)) {
            $rawNumber = static::get('whatsapp_number', '081234567890');
            $cleanNumber = preg_replace('/[^0-9]/', '', (string) $rawNumber);
            if (str_starts_with($cleanNumber, '0')) {
                $cleanNumber = '62' . substr($cleanNumber, 1);
            }
            $display = static::get('whatsapp_display', '+62 812-3456-7890');

            $items[] = [
                'number'       => (string) $rawNumber,
                'clean_number' => $cleanNumber,
                'display'      => $display,
                'label'        => 'Customer Service',
                'url'          => 'https://wa.me/' . $cleanNumber . '?text=' . rawurlencode($message),
                'is_primary'   => true,
            ];
        }

        return $items;
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

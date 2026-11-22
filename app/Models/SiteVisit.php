<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SiteVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'url',
        'method',
        'referer',
        'user_agent',
        'device',
        'visited_date',
    ];

    protected $casts = [
        'visited_date' => 'date',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    /**
     * Catat kunjungan halaman dengan proteksi anti-spam debounce 3 menit.
     */
    public static function track(Request $request): ?self
    {
        $path = '/' . ltrim($request->path(), '/');
        $ip = $request->ip() ?? '127.0.0.1';
        $ua = $request->userAgent() ?? '';

        $device = self::detectDevice($ua);

        // Jangan hitung bot search engine sebagai pengunjung reguler bila diinginkan, atau tandai device='bot'
        $isBot = ($device === 'bot');

        // Debounce: jika IP yang sama membuka URL yang sama dalam 3 menit terakhir, jangan catat duplikat
        $recent = self::where('ip_address', $ip)
            ->where('url', $path)
            ->where('created_at', '>=', now()->subMinutes(3))
            ->exists();

        if ($recent) {
            return null;
        }

        return self::create([
            'ip_address'   => $ip,
            'url'          => mb_substr($path, 0, 255),
            'method'       => $request->method(),
            'referer'      => $request->header('referer') ? mb_substr($request->header('referer'), 0, 500) : null,
            'user_agent'   => $ua ? mb_substr($ua, 0, 500) : null,
            'device'       => $device,
            'visited_date' => today()->toDateString(),
        ]);
    }

    /**
     * Deteksi tipe perangkat berdasarkan User Agent.
     */
    public static function detectDevice(string $ua): string
    {
        $lower = strtolower($ua);

        if (preg_match('/(bot|crawl|spider|slurp|googlebot|bingbot|yandexbot|duckduckbot|facebookexternalhit|whatsapp)/i', $lower)) {
            return 'bot';
        }

        if (preg_match('/(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk)/i', $lower)) {
            return 'tablet';
        }

        if (preg_match('/(mobile|iphone|ipod|android.*mobile|blackberry|iemobile|opera mini|webos|ucbrowser)/i', $lower)) {
            return 'mobile';
        }

        return 'desktop';
    }

    /**
     * Label ramah manusia untuk halaman yang dikunjungi.
     */
    public function getPageTitleAttribute(): string
    {
        $path = trim($this->url, '/');

        return match ($path) {
            '', '/'   => 'Beranda',
            'layanan' => 'Layanan Psikologi',
            'profil'  => 'Profil & Visi Misi',
            'kontak'  => 'Form Jadwalkan Konsultasi',
            default   => '/' . $path,
        };
    }
}

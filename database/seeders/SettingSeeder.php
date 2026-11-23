<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Identitas & Branding
            [
                'key'   => 'site_name',
                'value' => 'LoAction',
                'group' => 'general',
                'type'  => 'text',
            ],
            [
                'key'   => 'site_tagline',
                'value' => 'Biro Psikologi Terapan & Uji Kompetensi SDM',
                'group' => 'general',
                'type'  => 'text',
            ],
            [
                'key'   => 'hero_title',
                'value' => 'Layanan Psikologi Terapan yang Mengedepankan Kualitas & Empati',
                'group' => 'general',
                'type'  => 'text',
            ],
            [
                'key'   => 'hero_subtitle',
                'value' => 'Mendampingi individu, institusi pendidikan, dan organisasi bisnis untuk bertumbuh optimal melalui pendekatan psikologi saintifik dan berlisensi.',
                'group' => 'general',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'about_excerpt',
                'value' => 'Biro psikologi terapan untuk personal care, pendidikan, industri-organisasi, dan uji kompetensi SDM. Handle with care sejak 2017.',
                'group' => 'general',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'legal_info',
                'value' => 'SK Kemenkumham No. AHU-0001501.AH (2019)',
                'group' => 'general',
                'type'  => 'text',
            ],

            // Kontak & Komunikasi
            [
                'key'   => 'whatsapp_number',
                'value' => '081234567890',
                'group' => 'contact',
                'type'  => 'text',
            ],
            [
                'key'   => 'whatsapp_display',
                'value' => '+62 812-3456-7890',
                'group' => 'contact',
                'type'  => 'text',
            ],
            [
                'key'   => 'whatsapp_default_message',
                'value' => 'Halo LoAction, saya ingin konsultasi layanan psikologi.',
                'group' => 'contact',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'email',
                'value' => 'hello@loaction.id',
                'group' => 'contact',
                'type'  => 'text',
            ],
            [
                'key'   => 'phone',
                'value' => '+62 812-3456-7890',
                'group' => 'contact',
                'type'  => 'text',
            ],

            // Alamat & Sosial Media
            [
                'key'   => 'address',
                'value' => 'Jl. Boulevard Raya No. 18, Jakarta / Bandung, Indonesia',
                'group' => 'location',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'operating_hours',
                'value' => 'Senin – Sabtu: 08.30 – 17.00 WIB',
                'group' => 'location',
                'type'  => 'text',
            ],
            [
                'key'   => 'instagram_url',
                'value' => 'https://www.instagram.com/p/DSl2deij9Ig/?igsh=ajM1b3B5eXFwaWtp',
                'group' => 'social',
                'type'  => 'text',
            ],
            [
                'key'   => 'instagram_handle',
                'value' => '@loaction.id',
                'group' => 'social',
                'type'  => 'text',
            ],
            [
                'key'   => 'maps_url',
                'value' => 'https://maps.google.com',
                'group' => 'location',
                'type'  => 'text',
            ],

            // SEO & Webmaster
            [
                'key'   => 'meta_description',
                'value' => 'Biro psikologi terapan di Indonesia. Layanan konseling personal, tes minat bakat anak & pendidikan, psikotes rekrutmen kerja, dan uji sertifikasi kompetensi BNSP.',
                'group' => 'seo',
                'type'  => 'textarea',
            ],
            [
                'key'   => 'meta_keywords',
                'value' => 'biro psikologi, konseling psikolog, tes minat bakat anak, psikotes kerja, uji kompetensi bnsp, loaction',
                'group' => 'seo',
                'type'  => 'text',
            ],
            [
                'key'   => 'google_analytics_id',
                'value' => '',
                'group' => 'seo',
                'type'  => 'text',
            ],
        ];

        foreach ($settings as $settingData) {
            Setting::updateOrCreate(
                ['key' => $settingData['key']],
                $settingData
            );
        }
    }
}

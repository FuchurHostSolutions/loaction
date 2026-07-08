<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Shared data available across all pages via the layout.
     */
    protected function sharedData(): array
    {
        return [
            'instagramUrl' => 'https://www.instagram.com/p/DSl2deij9Ig/?igsh=ajM1b3B5eXFwaWtp',
            'whatsappUrl'  => 'https://wa.me/6281234567890?text=Halo%20LoAction,%20saya%20ingin%20konsultasi%20layanan%20psikologi.',
        ];
    }

    /**
     * All available services.
     */
    protected function services(): array
    {
        return [
            [
                'icon'        => '☘',
                'title'       => 'Personal Care',
                'description' => 'Pendampingan psikologis untuk individu dan keluarga agar lebih memahami diri, mengelola tantangan, serta mengambil keputusan dengan lebih sehat.',
                'items'       => ['Konseling individu atau keluarga', 'Tes IQ', 'Tes minat dan bakat', 'Psikoedukasi'],
                'cta'         => 'Konsultasikan kebutuhan',
            ],
            [
                'icon'        => '✦',
                'title'       => 'Pendidikan',
                'description' => 'Assessment dan konseling untuk membantu peserta didik, orang tua, sekolah, serta lembaga pendidikan mengenali potensi dan kesiapan belajar.',
                'items'       => ['Konseling pendidikan', 'Tes IQ integrasi', 'Tes minat dan bakat', 'Tes kesiapan sekolah SD sampai SMA', 'Pelatihan dan webinar'],
                'cta'         => 'Diskusikan program',
            ],
            [
                'icon'        => '◎',
                'title'       => 'Industri & Organisasi',
                'description' => 'Layanan psikologi industri untuk mendukung keputusan SDM yang objektif, terukur, dan selaras dengan kebutuhan organisasi.',
                'items'       => ['Rekrutmen dan seleksi karyawan baru', 'Review kompetensi dan potensi', 'Pelatihan coaching'],
                'cta'         => 'Rancang assessment',
            ],
            [
                'icon'        => '✓',
                'title'       => 'Uji Kompetensi',
                'description' => 'Pemetaan dan evaluasi kompetensi untuk level staf, supervisor, dan manajer, termasuk kebutuhan seleksi dan pengembangan karier.',
                'items'       => ['Skema SDM: staf, supervisor, manajer', 'Skema rekrutmen dan seleksi staf', 'Skema rekrutmen dan seleksi supervisor', 'Skema rekrutmen dan seleksi manajer'],
                'cta'         => 'Ajukan kebutuhan',
            ],
        ];
    }

    /**
     * Testimonials data.
     */
    protected function testimonials(): array
    {
        return [
            ['quote' => 'Pelayanannya profesional, komunikatif, dan membantu kami memahami kebutuhan assessment dengan lebih jelas.', 'name' => 'Klien Organisasi', 'role' => 'HR Department'],
            ['quote' => 'Hasil tes dan penjelasannya membantu kami mengambil keputusan pendidikan anak dengan lebih tenang.', 'name' => 'Orang Tua Siswa', 'role' => 'Layanan Pendidikan'],
            ['quote' => 'Materi psikoedukasinya mudah dipahami dan relevan dengan kebutuhan peserta.', 'name' => 'Peserta Webinar', 'role' => 'Program Pelatihan'],
        ];
    }
}

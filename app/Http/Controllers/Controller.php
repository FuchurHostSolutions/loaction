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
     * Competency levels data.
     */
    protected function competencies(): array
    {
        return [
            ['role' => 'Staff', 'text' => 'Uji kompetensi dasar, potensi kerja, dan kesesuaian peran.'],
            ['role' => 'Supervisor', 'text' => 'Review kemampuan koordinasi, problem solving, dan kepemimpinan operasional.'],
            ['role' => 'Manager', 'text' => 'Pemetaan kompetensi strategis, pengambilan keputusan, dan leadership.'],
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

    /**
     * Target audience data.
     */
    protected function audiences(): array
    {
        return [
            ['number' => '01', 'title' => 'Individu & Keluarga', 'text' => 'Ruang aman untuk memahami diri, memperbaiki relasi, serta mengelola masalah personal dan keluarga.'],
            ['number' => '02', 'title' => 'Siswa & Orang Tua', 'text' => 'Pemetaan kemampuan, minat, bakat, dan kesiapan sekolah untuk mendukung keputusan pendidikan.'],
            ['number' => '03', 'title' => 'Sekolah & Lembaga', 'text' => 'Konseling pendidikan, assessment, webinar, dan pelatihan yang relevan dengan kebutuhan lembaga.'],
            ['number' => '04', 'title' => 'Perusahaan & Organisasi', 'text' => 'Seleksi, review kompetensi, pemetaan potensi, dan coaching untuk keputusan SDM yang lebih akurat.'],
        ];
    }
}

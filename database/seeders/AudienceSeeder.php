<?php

namespace Database\Seeders;

use App\Models\Audience;
use Illuminate\Database\Seeder;

class AudienceSeeder extends Seeder
{
    public function run(): void
    {
        $audiences = [
            [
                'number'     => '01',
                'title'      => 'Individu & Dewasa',
                'text'       => 'Ruang aman dan konfidensial untuk memahami diri, mengurai beban pikiran, mengelola kecemasan, serta membangun relasi yang lebih sehat.',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'number'     => '02',
                'title'      => 'Anak, Remaja & Orang Tua',
                'text'       => 'Pendampingan tumbuh kembang emosi anak, asesmen kesiapan sekolah, tes minat bakat, dan konsultasi parenting keluarga.',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'number'     => '03',
                'title'      => 'Institusi Pendidikan & Sekolah',
                'text'       => 'Mitra strategis sekolah untuk psikotes berkala siswa, pemetaan gaya belajar, webinar guru, dan pendampingan konseling sekolah.',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'number'     => '04',
                'title'      => 'Korporasi & BUMN',
                'text'       => 'Solusi terpadu psikologi industri mulai dari seleksi talenta baru, asesmen promosi, EAP karyawan, hingga uji kompetensi SDM.',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'number'     => '05',
                'title'      => 'Komunitas & Lembaga Publik',
                'text'       => 'Psikoedukasi, seminar kesehatan mental, dan program edukasi publik untuk membangun kesadaran kesehatan jiwa masyarakat.',
                'sort_order' => 5,
                'is_active'  => true,
            ],
        ];

        foreach ($audiences as $data) {
            Audience::updateOrCreate(
                ['number' => $data['number']],
                $data
            );
        }
    }
}

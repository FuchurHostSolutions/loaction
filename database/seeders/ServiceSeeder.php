<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'icon'        => '☘',
                'title'       => 'Personal Care',
                'slug'        => 'personal-care',
                'description' => 'Pendampingan psikologis untuk individu dan keluarga agar lebih memahami diri, mengelola tantangan emosional, serta mengambil keputusan hidup dengan lebih sehat dan bermakna.',
                'cta'         => 'Konsultasikan Kebutuhan',
                'sort_order'  => 1,
                'is_active'   => true,
                'items'       => [
                    'Konseling Individu & Dewasa',
                    'Konseling Pasangan & Keluarga',
                    'Tes IQ & Potensi Inteligensi',
                    'Tes Minat & Bakat Personal',
                    'Penanganan Stres, Kecemasan & Regulasi Emosi',
                    'Psikoedukasi & Mental Wellness',
                ],
            ],
            [
                'icon'        => '✦',
                'title'       => 'Pendidikan',
                'slug'        => 'pendidikan',
                'description' => 'Assessment komprehensif dan bimbingan psikologis untuk membantu peserta didik, orang tua, dan lembaga pendidikan mengenali potensi belajar, minat, dan kesiapan tumbuh kembang anak.',
                'cta'         => 'Diskusikan Program Sekolah',
                'sort_order'  => 2,
                'is_active'   => true,
                'items'       => [
                    'Tes Kesiapan Masuk Sekolah (TK & SD)',
                    'Tes IQ & Profil Inteligensi Terintegrasi',
                    'Tes Minat, Bakat & Penjurusan (SMP, SMA, Kuliah)',
                    'Konseling Kesulitan Belajar & Atensi Anak',
                    'Pelatihan Guru, Guru BK & Webinar Parenting',
                    'Pemetaan Kebutuhan Khusus & Sensori Belajar',
                ],
            ],
            [
                'icon'        => '◎',
                'title'       => 'Industri & Organisasi',
                'slug'        => 'industri-organisasi',
                'description' => 'Layanan psikologi industri dan asesmen SDM untuk mendukung keputusan manajemen yang objektif, berbasis data perilaku terukur, dan selaras dengan kebutuhan strategis organisasi.',
                'cta'         => 'Rancang Asesmen SDM',
                'sort_order'  => 3,
                'is_active'   => true,
                'items'       => [
                    'Rekrutmen & Psikotes Calon Karyawan Baru',
                    'Assessment Center & Pemetaan Potensi Karyawan',
                    'Executive & Performance Coaching',
                    'Employee Assistance Program (EAP) / Konseling Karyawan',
                    'Pelatihan Kepemimpinan, Komunikasi & Budaya Kerja',
                    'Review Kompetensi & Analisis Beban Kerja',
                ],
            ],
            [
                'icon'        => '✓',
                'title'       => 'Uji Kompetensi',
                'slug'        => 'uji-kompetensi',
                'description' => 'Sertifikasi dan evaluasi standar kompetensi kerja untuk level staf hingga manajemen puncak, mendukung promosi jabatan objektif serta pemenuhan standar kualifikasi industri.',
                'cta'         => 'Ajukan Skema Uji',
                'sort_order'  => 4,
                'is_active'   => true,
                'items'       => [
                    'Skema SDM: Staf Administrasi & Operasional',
                    'Skema SDM: Supervisor & Tim Koordinator',
                    'Skema SDM: Manajer & Kepala Divisi',
                    'Uji Portofolio & Wawancara Kompetensi Terstruktur',
                    'Pemetaan Kesenjangan Kompetensi (Gap Analysis)',
                    'Sertifikasi Pendukung Pengembangan Karier Karyawan',
                ],
            ],
        ];

        foreach ($services as $data) {
            $items = $data['items'];
            unset($data['items']);

            $service = Service::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            // Re-seed items cleanly
            $service->items()->delete();

            foreach ($items as $index => $itemName) {
                ServiceItem::create([
                    'service_id' => $service->id,
                    'name'       => $itemName,
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }
}

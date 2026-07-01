<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Competency;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        $this->seedServices();
        $this->seedTestimonials();
        $this->seedAudiences();
        $this->seedCompetencies();
        $this->seedDummyConsultations();
    }

    private function seedServices(): void
    {
        $services = [
            [
                'icon'        => '☘',
                'title'       => 'Personal Care',
                'slug'        => 'personal-care',
                'description' => 'Pendampingan psikologis untuk individu dan keluarga agar lebih memahami diri, mengelola tantangan, serta mengambil keputusan dengan lebih sehat.',
                'cta'         => 'Konsultasikan kebutuhan',
                'sort_order'  => 1,
                'items'       => [
                    'Konseling individu atau keluarga',
                    'Tes IQ',
                    'Tes minat dan bakat',
                    'Psikoedukasi',
                ],
            ],
            [
                'icon'        => '✦',
                'title'       => 'Pendidikan',
                'slug'        => 'pendidikan',
                'description' => 'Assessment dan konseling untuk membantu peserta didik, orang tua, sekolah, serta lembaga pendidikan mengenali potensi dan kesiapan belajar.',
                'cta'         => 'Diskusikan program',
                'sort_order'  => 2,
                'items'       => [
                    'Konseling pendidikan',
                    'Tes IQ integrasi',
                    'Tes minat dan bakat',
                    'Tes kesiapan sekolah SD sampai SMA',
                    'Pelatihan dan webinar',
                ],
            ],
            [
                'icon'        => '◎',
                'title'       => 'Industri & Organisasi',
                'slug'        => 'industri-organisasi',
                'description' => 'Layanan psikologi industri untuk mendukung keputusan SDM yang objektif, terukur, dan selaras dengan kebutuhan organisasi.',
                'cta'         => 'Rancang assessment',
                'sort_order'  => 3,
                'items'       => [
                    'Rekrutmen dan seleksi karyawan baru',
                    'Review kompetensi dan potensi',
                    'Pelatihan coaching',
                ],
            ],
            [
                'icon'        => '✓',
                'title'       => 'Uji Kompetensi',
                'slug'        => 'uji-kompetensi',
                'description' => 'Pemetaan dan evaluasi kompetensi untuk level staf, supervisor, dan manajer, termasuk kebutuhan seleksi dan pengembangan karier.',
                'cta'         => 'Ajukan kebutuhan',
                'sort_order'  => 4,
                'items'       => [
                    'Skema SDM: staf, supervisor, manajer',
                    'Skema rekrutmen dan seleksi staf',
                    'Skema rekrutmen dan seleksi supervisor',
                    'Skema rekrutmen dan seleksi manajer',
                ],
            ],
        ];

        foreach ($services as $data) {
            $items = $data['items'];
            unset($data['items']);

            $service = Service::create($data);

            foreach ($items as $index => $itemName) {
                ServiceItem::create([
                    'service_id' => $service->id,
                    'name'       => $itemName,
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }

    private function seedTestimonials(): void
    {
        $testimonials = [
            [
                'quote'      => 'Pelayanannya profesional, komunikatif, dan membantu kami memahami kebutuhan assessment dengan lebih jelas.',
                'name'       => 'Rina Handayani',
                'role'       => 'HR Manager — PT Nusantara Jaya',
                'rating'     => 5,
                'sort_order' => 1,
            ],
            [
                'quote'      => 'Hasil tes dan penjelasannya membantu kami mengambil keputusan pendidikan anak dengan lebih tenang.',
                'name'       => 'Budi Santoso',
                'role'       => 'Orang Tua Siswa',
                'rating'     => 5,
                'sort_order' => 2,
            ],
            [
                'quote'      => 'Materi psikoedukasinya mudah dipahami dan relevan dengan kebutuhan peserta.',
                'name'       => 'Dewi Lestari',
                'role'       => 'Peserta Webinar — Program Pelatihan',
                'rating'     => 5,
                'sort_order' => 3,
            ],
            [
                'quote'      => 'Proses rekrutmen jadi lebih objektif dan terukur setelah menggunakan layanan assessment dari LoAction.',
                'name'       => 'Ahmad Fauzi',
                'role'       => 'Direktur SDM — Koperasi Maju Bersama',
                'rating'     => 5,
                'sort_order' => 4,
            ],
            [
                'quote'      => 'Konseling keluarga di LoAction sangat membantu. Psikolognya sabar, hangat, dan sangat profesional.',
                'name'       => 'Siti Nurhaliza',
                'role'       => 'Klien Personal Care',
                'rating'     => 5,
                'sort_order' => 5,
            ],
            [
                'quote'      => 'Tes minat bakat sangat membantu anak saya menentukan jurusan kuliah yang tepat. Terima kasih LoAction!',
                'name'       => 'Hendra Wijaya',
                'role'       => 'Orang Tua Siswa SMA',
                'rating'     => 5,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::create($data);
        }
    }

    private function seedAudiences(): void
    {
        $audiences = [
            ['number' => '01', 'title' => 'Individu & Keluarga', 'text' => 'Ruang aman untuk memahami diri, memperbaiki relasi, serta mengelola masalah personal dan keluarga.', 'sort_order' => 1],
            ['number' => '02', 'title' => 'Siswa & Orang Tua',   'text' => 'Pemetaan kemampuan, minat, bakat, dan kesiapan sekolah untuk mendukung keputusan pendidikan.', 'sort_order' => 2],
            ['number' => '03', 'title' => 'Sekolah & Lembaga',   'text' => 'Konseling pendidikan, assessment, webinar, dan pelatihan yang relevan dengan kebutuhan lembaga.', 'sort_order' => 3],
            ['number' => '04', 'title' => 'Perusahaan & Organisasi', 'text' => 'Seleksi, review kompetensi, pemetaan potensi, dan coaching untuk keputusan SDM yang lebih akurat.', 'sort_order' => 4],
        ];

        foreach ($audiences as $data) {
            Audience::create($data);
        }
    }

    private function seedCompetencies(): void
    {
        $competencies = [
            ['role' => 'Staff',      'text' => 'Uji kompetensi dasar, potensi kerja, dan kesesuaian peran.',                                    'sort_order' => 1],
            ['role' => 'Supervisor', 'text' => 'Review kemampuan koordinasi, problem solving, dan kepemimpinan operasional.',                     'sort_order' => 2],
            ['role' => 'Manager',    'text' => 'Pemetaan kompetensi strategis, pengambilan keputusan, dan leadership.',                           'sort_order' => 3],
        ];

        foreach ($competencies as $data) {
            Competency::create($data);
        }
    }

    private function seedDummyConsultations(): void
    {
        $services = Service::all();

        $dummies = [
            ['name' => 'Fitri Rahmawati',  'email' => 'fitri@example.com',   'phone' => '081234567001', 'message' => 'Saya ingin menjadwalkan tes IQ untuk anak saya yang berusia 6 tahun.', 'status' => 'processed'],
            ['name' => 'Agus Prasetyo',     'email' => 'agus.p@example.com',  'phone' => '081234567002', 'message' => 'Perusahaan kami membutuhkan assessment untuk 20 karyawan baru.',     'status' => 'pending'],
            ['name' => 'Maya Sari',         'email' => 'maya.s@example.com',  'phone' => '081234567003', 'message' => 'Saya dan suami ingin konseling keluarga.',                           'status' => 'pending'],
            ['name' => 'Rahmat Hidayat',    'email' => 'rahmat@example.com',  'phone' => '081234567004', 'message' => 'Kami ingin mengadakan webinar psikoedukasi untuk guru-guru kami.',   'status' => 'processed'],
            ['name' => 'Lina Kusuma',       'email' => null,                  'phone' => '081234567005', 'message' => 'Mau tanya soal tes minat bakat untuk anak SMA kelas 11.',           'status' => 'pending'],
            ['name' => 'Dimas Ardianto',    'email' => 'dimas@example.com',   'phone' => '081234567006', 'message' => 'Butuh uji kompetensi untuk promosi jabatan supervisor.',             'status' => 'pending'],
            ['name' => 'Wulan Pertiwi',     'email' => 'wulan.p@example.com', 'phone' => '081234567007', 'message' => 'Ingin coaching untuk tim manajer kami, ada 5 orang.',               'status' => 'cancelled'],
            ['name' => 'Irfan Nugroho',     'email' => 'irfan@example.com',   'phone' => '081234567008', 'message' => 'Rekrutmen dan seleksi untuk posisi staf administrasi.',              'status' => 'processed'],
            ['name' => 'Kartini Suharto',   'email' => 'kartini@example.com', 'phone' => '081234567009', 'message' => 'Sekolah kami butuh tes kesiapan masuk SD untuk 45 calon siswa.',    'status' => 'pending'],
            ['name' => 'Bambang Sutejo',    'email' => null,                  'phone' => '081234567010', 'message' => 'Saya ingin konseling individual terkait masalah karier.',            'status' => 'pending'],
        ];

        foreach ($dummies as $dummy) {
            $service = $services->random();
            Consultation::create([
                ...$dummy,
                'service_id'   => $service->id,
                'service_name' => $service->title,
            ]);
        }
    }
}

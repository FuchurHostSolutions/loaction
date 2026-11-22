<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'quote'      => 'Layanan assessment center dari LoAction sangat profesional dan laporan psikologinya sangat detail. Memudahkan kami di divisi HR menentukan kandidat promosi jabatan dengan objektif.',
                'name'       => 'Rina Handayani, S.Psi.',
                'role'       => 'HR Director — PT Mitra Solusi Nusantara',
                'rating'     => 5,
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Hasil tes minat dan bakat sangat akurat dan membuka wawasan anak saya dalam memilih jurusan kuliah. Penjelasan psikolognya hangat, komunikatif, dan sangat solutif bagi kami sebagai orang tua.',
                'name'       => 'Budi Santoso',
                'role'       => 'Orang Tua Siswa — SMA Negeri 1',
                'rating'     => 5,
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'quote'      => 'LoAction menjadi mitra terpercaya sekolah kami selama 3 tahun terakhir untuk psikotes kesiapan belajar calon siswa SD dan konseling anak. Pelayanannya selalu tepat waktu dan berstandar tinggi.',
                'name'       => 'Dra. Sri Wahyuni, M.Pd.',
                'role'       => 'Kepala Sekolah — Yayasan Pendidikan Harapan',
                'rating'     => 5,
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Konseling personal di LoAction benar-benar menjadi ruang aman bagi saya saat mengalami burnout kerja. Psikolognya sangat mendengarkan tanpa menghakimi dan memberi panduan praktis yang bisa saya terapkan sehari-hari.',
                'name'       => 'Andi Pratama',
                'role'       => 'Klien Personal Care — IT Professional',
                'rating'     => 5,
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Proses uji kompetensi SDM level manajerial berjalan transparan, tertib, dan laporannya sangat komprehensif. Sangat kami rekomendasikan untuk perusahaan swasta maupun BUMN.',
                'name'       => 'Ahmad Fauzi, S.E.',
                'role'       => 'Head of People Operations — PT Cipta Kreasi Abadi',
                'rating'     => 5,
                'sort_order' => 5,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Webinar psikoedukasi tentang manajemen stres guru yang diadakan LoAction sangat interaktif dan aplikatif. Seluruh guru merasa termotivasi dan lebih siap menghadapi dinamika belajar mengajar.',
                'name'       => 'Dewi Lestari, S.Pd.',
                'role'       => 'Koordinator Guru BK — SMK Negeri 2',
                'rating'     => 5,
                'sort_order' => 6,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Setelah konseling keluarga di LoAction, komunikasi antara saya dan pasangan jauh lebih terbuka dan saling memahami. Pendekatan psikolognya sangat mengayomi dan profesional.',
                'name'       => 'Siti Nurhaliza & Keluarga',
                'role'       => 'Klien Konseling Keluarga',
                'rating'     => 5,
                'sort_order' => 7,
                'is_active'  => true,
            ],
            [
                'quote'      => 'Psikotes massal untuk 80 calon staf administrasi diselesaikan tepat waktu dengan laporan ranking kompetensi yang sangat memudahkan seleksi final kami. Sangat puas dengan kerja sama ini.',
                'name'       => 'Hendra Kusuma',
                'role'       => 'Talent Acquisition Lead — Logistik Cepat Indonesia',
                'rating'     => 5,
                'sort_order' => 8,
                'is_active'  => true,
            ],
        ];

        // Clean existing testimonials and insert fresh ones
        Testimonial::truncate();

        foreach ($testimonials as $data) {
            Testimonial::create($data);
        }
    }
}

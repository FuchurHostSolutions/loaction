<?php

namespace Database\Seeders;

use App\Models\Consultation;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::all();
        if ($services->isEmpty()) {
            return;
        }

        // Wipe existing consultations for fresh realistic dataset
        Consultation::truncate();

        $leads = [
            // Month -5 (5 months ago)
            [
                'name'         => 'Rudi Hermawan',
                'email'        => 'rudi.hermawan@perusahaan-abc.co.id',
                'phone'        => '081289123401',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Kami ingin menjadwalkan assessment psikotes untuk 15 kandidat staf akuntansi minggu depan. Mohon penawaran harganya.',
                'status'       => 'processed',
                'days_ago'     => 155,
            ],
            [
                'name'         => 'Endang Sulistyo',
                'email'        => 'endang.s@gmail.com',
                'phone'        => '085712349002',
                'service_slug' => 'personal-care',
                'message'      => 'Ingin konsultasi psikologi seputar manajemen stres dan kecemasan akibat tekanan pekerjaan.',
                'status'       => 'processed',
                'days_ago'     => 150,
            ],
            [
                'name'         => 'Nurul Hidayati',
                'email'        => 'nurul.h@sekolahbintang.sch.id',
                'phone'        => '082198765003',
                'service_slug' => 'pendidikan',
                'message'      => 'Sekolah kami ingin tes kesiapan masuk SD untuk 30 calon murid baru. Apakah ada paket sekolah?',
                'status'       => 'processed',
                'days_ago'     => 140,
            ],
            [
                'name'         => 'Bambang Trihatmodjo',
                'email'        => 'bambang.t@koperasi.id',
                'phone'        => '081377889004',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Butuh sertifikasi uji kompetensi SDM level supervisor untuk 3 orang tim kami.',
                'status'       => 'processed',
                'days_ago'     => 135,
            ],

            // Month -4 (4 months ago)
            [
                'name'         => 'Dian Anggraini',
                'email'        => 'dian.anggraini@yahoo.com',
                'phone'        => '081908765005',
                'service_slug' => 'personal-care',
                'message'      => 'Saya dan suami ingin mendaftar konseling pernikahan. Lebih prefer jadwal di hari Sabtu.',
                'status'       => 'processed',
                'days_ago'     => 120,
            ],
            [
                'name'         => 'Wahyu Setiawan',
                'email'        => 'wahyu.s@techsolution.id',
                'phone'        => '081122334006',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Ingin assessment center untuk promosi 5 orang team leader menjadi assistant manager.',
                'status'       => 'processed',
                'days_ago'     => 115,
            ],
            [
                'name'         => 'Tri Handayani',
                'email'        => 'tri.handayani@gmail.com',
                'phone'        => '085699881007',
                'service_slug' => 'pendidikan',
                'message'      => 'Anak saya kelas 9 SMP butuh tes minat bakat untuk menentukan lanjut SMA atau SMK.',
                'status'       => 'processed',
                'days_ago'     => 110,
            ],
            [
                'name'         => 'Gunawan Wibisono',
                'email'        => null,
                'phone'        => '087812345008',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Mau tanya persyaratan uji kompetensi level staf HRD. Apakah ada pelatihan persiapan?',
                'status'       => 'cancelled',
                'days_ago'     => 105,
            ],
            [
                'name'         => 'Lestari Indah',
                'email'        => 'lestari.i@gmail.com',
                'phone'        => '081298761009',
                'service_slug' => 'personal-care',
                'message'      => 'Konsultasi personal untuk anak remaja saya yang mulai menarik diri dari pergaulan.',
                'status'       => 'processed',
                'days_ago'     => 98,
            ],

            // Month -3 (3 months ago)
            [
                'name'         => 'Fajar Nugraha',
                'email'        => 'fajar.n@ptmaju.co.id',
                'phone'        => '081345678010',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Kebutuhan rekrutmen massal operator pabrik sebanyak 50 orang pada bulan depan.',
                'status'       => 'processed',
                'days_ago'     => 88,
            ],
            [
                'name'         => 'Ratna Juwita',
                'email'        => 'ratna.juwita@gmail.com',
                'phone'        => '085811223011',
                'service_slug' => 'pendidikan',
                'message'      => 'Tes IQ terintegrasi untuk anak saya kelas 3 SD yang disarankan guru BK.',
                'status'       => 'processed',
                'days_ago'     => 82,
            ],
            [
                'name'         => 'Bayu Prasetya',
                'email'        => 'bayu.p@startup.co',
                'phone'        => '081234908012',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Ingin mengadakan sesi coaching kepemimpinan untuk manajer divisi produk.',
                'status'       => 'processed',
                'days_ago'     => 75,
            ],
            [
                'name'         => 'Siti Marwah',
                'email'        => null,
                'phone'        => '087788990013',
                'service_slug' => 'personal-care',
                'message'      => 'Ingin konseling online lewat Zoom untuk masalah penyesuaian diri di tempat kerja baru.',
                'status'       => 'processed',
                'days_ago'     => 70,
            ],
            [
                'name'         => 'Aris Munandar',
                'email'        => 'aris.m@bumn.co.id',
                'phone'        => '081399001014',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Pengajuan uji kompetensi level manager bidang MSDM untuk 2 orang kandidat.',
                'status'       => 'processed',
                'days_ago'     => 65,
            ],

            // Month -2 (2 months ago)
            [
                'name'         => 'Eka Kurniawan',
                'email'        => 'eka.kurniawan@gmail.com',
                'phone'        => '081277665015',
                'service_slug' => 'personal-care',
                'message'      => 'Butuh sesi konseling psikolog klinis untuk penanganan trauma ringan pasca insiden.',
                'status'       => 'processed',
                'days_ago'     => 58,
            ],
            [
                'name'         => 'Maya Anggraeni',
                'email'        => 'maya.a@smkn3.sch.id',
                'phone'        => '085233445016',
                'service_slug' => 'pendidikan',
                'message'      => 'Webinar psikoedukasi tentang penanganan kecanduan gawai untuk siswa dan orang tua.',
                'status'       => 'processed',
                'days_ago'     => 52,
            ],
            [
                'name'         => 'Doni Firmansyah',
                'email'        => 'doni.f@retailindo.com',
                'phone'        => '081288997017',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Psikotes seleksi store manager untuk 4 cabang baru di wilayah Jawa Barat.',
                'status'       => 'processed',
                'days_ago'     => 48,
            ],
            [
                'name'         => 'Anita Rahmawati',
                'email'        => 'anita.r@gmail.com',
                'phone'        => '081933445018',
                'service_slug' => 'pendidikan',
                'message'      => 'Mau tanya biaya tes minat bakat untuk siswa SMA kelas 11.',
                'status'       => 'cancelled',
                'days_ago'     => 42,
            ],
            [
                'name'         => 'Hendro Siswanto',
                'email'        => 'hendro.s@perusahaan.co.id',
                'phone'        => '081366778019',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Uji kompetensi skema rekrutmen staf untuk 10 orang karyawan kontrak.',
                'status'       => 'processed',
                'days_ago'     => 38,
            ],
            [
                'name'         => 'Kusuma Dewi',
                'email'        => 'kusuma.d@gmail.com',
                'phone'        => '085711229020',
                'service_slug' => 'personal-care',
                'message'      => 'Konseling keluarga terkait pola asuh anak usia dini dengan psikolog anak.',
                'status'       => 'processed',
                'days_ago'     => 35,
            ],

            // Month -1 (Last month)
            [
                'name'         => 'Teguh Prakoso',
                'email'        => 'teguh.p@ptlogistik.id',
                'phone'        => '081255443021',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Layanan Employee Assistance Program (EAP) untuk 120 staf gudang dan operasional.',
                'status'       => 'processed',
                'days_ago'     => 28,
            ],
            [
                'name'         => 'Farida Ulfa',
                'email'        => 'farida.ulfa@gmail.com',
                'phone'        => '082233449022',
                'service_slug' => 'personal-care',
                'message'      => 'Konseling individu untuk mengatasi kejenuhan kerja dan mencari arah karier baru.',
                'status'       => 'processed',
                'days_ago'     => 25,
            ],
            [
                'name'         => 'Yusuf Maulana',
                'email'        => 'yusuf.m@smaharapan.sch.id',
                'phone'        => '081388776023',
                'service_slug' => 'pendidikan',
                'message'      => 'Paket tes minat bakat kelas 12 (90 siswa) sebelum pendaftaran SNBP/SNBT.',
                'status'       => 'processed',
                'days_ago'     => 22,
            ],
            [
                'name'         => 'Agung Prabowo',
                'email'        => 'agung.p@otomotif.co.id',
                'phone'        => '081199887024',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Uji kompetensi manajerial untuk promosi kepala cabang. Butuh info jadwal terdekat.',
                'status'       => 'processed',
                'days_ago'     => 18,
            ],
            [
                'name'         => 'Rina Astuti',
                'email'        => 'rina.astuti@gmail.com',
                'phone'        => '085677889025',
                'service_slug' => 'personal-care',
                'message'      => 'Ingin tes IQ dan konsultasi anak saya usia 6 tahun sebelum mendaftar SD.',
                'status'       => 'processed',
                'days_ago'     => 15,
            ],
            [
                'name'         => 'Denny Santoso',
                'email'        => null,
                'phone'        => '087855667026',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Mau menanyakan tes psikologi online untuk calon karyawan di luar kota.',
                'status'       => 'processed',
                'days_ago'     => 12,
            ],

            // Current Month (Recent / Active Leads)
            [
                'name'         => 'Fitri Rahmawati',
                'email'        => 'fitri.rahmawati@gmail.com',
                'phone'        => '081234567027',
                'service_slug' => 'personal-care',
                'message'      => 'Saya ingin menjadwalkan tes IQ dan bakat untuk anak saya yang berusia 8 tahun. Apakah ada jadwal hari Minggu?',
                'status'       => 'pending',
                'days_ago'     => 8,
            ],
            [
                'name'         => 'Agus Prasetyo',
                'email'        => 'agus.p@manufacturing.co.id',
                'phone'        => '081299887028',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Perusahaan kami membutuhkan psikotes seleksi untuk 20 orang calon engineer dan staf logistik.',
                'status'       => 'pending',
                'days_ago'     => 6,
            ],
            [
                'name'         => 'Maya Sari Indah',
                'email'        => 'maya.sari@gmail.com',
                'phone'        => '085712349029',
                'service_slug' => 'personal-care',
                'message'      => 'Saya dan pasangan ingin konseling keluarga tatap muka akhir pekan ini.',
                'status'       => 'pending',
                'days_ago'     => 5,
            ],
            [
                'name'         => 'Rahmat Hidayat',
                'email'        => 'rahmat.h@sditalfalah.sch.id',
                'phone'        => '081388990030',
                'service_slug' => 'pendidikan',
                'message'      => 'Kami ingin mengundang tim psikolog LoAction untuk mengisi workshop penanganan anak tantrum untuk guru PAUD dan TK.',
                'status'       => 'processed',
                'days_ago'     => 4,
            ],
            [
                'name'         => 'Lina Kusuma Wardhani',
                'email'        => null,
                'phone'        => '087899001031',
                'service_slug' => 'pendidikan',
                'message'      => 'Mohon info biaya tes minat bakat untuk anak SMA kelas 11 yang bingung memilih jurusan.',
                'status'       => 'pending',
                'days_ago'     => 3,
            ],
            [
                'name'         => 'Dimas Ardianto',
                'email'        => 'dimas.ardi@bumn-energi.co.id',
                'phone'        => '081122445032',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Butuh sertifikasi uji kompetensi skema supervisor operasional untuk 6 orang pengawas lapangan.',
                'status'       => 'pending',
                'days_ago'     => 2,
            ],
            [
                'name'         => 'Wulan Pertiwi',
                'email'        => 'wulan.pertiwi@corp.id',
                'phone'        => '081266778033',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Ingin mengajukan sesi coaching kepemimpinan untuk 5 orang kepala cabang baru.',
                'status'       => 'pending',
                'days_ago'     => 2,
            ],
            [
                'name'         => 'Irfan Nugroho',
                'email'        => 'irfan.n@consultant.co',
                'phone'        => '085699001034',
                'service_slug' => 'industri-organisasi',
                'message'      => 'Asesmen rekrutmen untuk staf hukum dan compliance perusahaan kami.',
                'status'       => 'processed',
                'days_ago'     => 1,
            ],
            [
                'name'         => 'Kartini Suharto',
                'email'        => 'kartini.s@sekolahanak.sch.id',
                'phone'        => '081399881035',
                'service_slug' => 'pendidikan',
                'message'      => 'Sekolah kami butuh tes kesiapan masuk SD untuk 45 calon siswa gelombang kedua.',
                'status'       => 'pending',
                'days_ago'     => 1,
            ],
            [
                'name'         => 'Bambang Sutejo',
                'email'        => null,
                'phone'        => '087788112036',
                'service_slug' => 'personal-care',
                'message'      => 'Saya ingin konseling personal terkait transisi karier dan stres kerja.',
                'status'       => 'pending',
                'days_ago'     => 0,
            ],
            [
                'name'         => 'Nabila Putri Santoso',
                'email'        => 'nabila.putri@gmail.com',
                'phone'        => '081299110037',
                'service_slug' => 'personal-care',
                'message'      => 'Halo LoAction, saya ingin konsultasi online seputar kecemasan dan insomnia. Apakah psikolog klinis tersedia malam hari?',
                'status'       => 'pending',
                'days_ago'     => 0,
            ],
            [
                'name'         => 'Taufik Rahman, S.T.',
                'email'        => 'taufik@logistix.co.id',
                'phone'        => '081377441038',
                'service_slug' => 'uji-kompetensi',
                'message'      => 'Apakah bisa asesmen uji kompetensi skema manajer dilaksanakan di kantor kami di Cikarang?',
                'status'       => 'pending',
                'days_ago'     => 0,
            ],
        ];

        foreach ($leads as $lead) {
            $service = $services->firstWhere('slug', $lead['service_slug']) ?? $services->first();
            $createdDate = Carbon::now()->subDays($lead['days_ago'])->subHours(rand(1, 10))->subMinutes(rand(1, 50));

            Consultation::create([
                'name'         => $lead['name'],
                'email'        => $lead['email'],
                'phone'        => $lead['phone'],
                'service_id'   => $service->id,
                'service_name' => $service->title,
                'message'      => $lead['message'],
                'status'       => $lead['status'],
                'created_at'   => $createdDate,
                'updated_at'   => $lead['status'] === 'pending' ? $createdDate : $createdDate->copy()->addDays(rand(1, 3)),
            ]);
        }
    }
}

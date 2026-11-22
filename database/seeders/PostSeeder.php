<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'Mengenal Burnout vs Kelelahan Kerja Biasa: Gejala, Fase, dan Cara Mengatasinya',
                'slug'         => 'mengenal-burnout-vs-kelelahan-kerja-biasa',
                'category'     => 'Kesehatan Mental',
                'excerpt'      => 'Sering merasa lelah tanpa henti, sinis terhadap pekerjaan, dan kehilangan motivasi? Pahami perbedaan kelelahan fisik biasa dengan sindrom burnout serta langkah pemulihannya.',
                'cover_image'  => 'https://images.unsplash.com/photo-1541199249251-f713e6145474?auto=format&fit=crop&w=1200&q=80',
                'author_name'  => 'Tim Psikolog Klinis LoAction',
                'reading_time' => 4,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'views_count'  => 142,
                'content'      => <<<EOT
<p class="lead">Di era kerja modern dengan tuntutan serbacepat, batas antara kehidupan pribadi dan profesional kerap kabur. Kelelahan fisik usai menyelesaikan deadline proyek besar adalah hal wajar. Namun, saat rasa lelah tidak kunjung pulih bahkan setelah istirahat di akhir pekan, Anda mungkin sedang mengalami <strong>Burnout Syndrome</strong>.</p>

<h3>Apa Perbedaan Kelelahan Biasa dan Burnout?</h3>
<p>Kelelahan fisik biasa umumnya dapat diatasi dengan tidur yang cukup, rekreasi santai, atau libur 1–2 hari. Begitu energi terisi, motivasi kerja akan kembali seperti sedia kala.</p>
<p>Sebaliknya, <em>Burnout</em> adalah kondisi kelelahan emosional, mental, dan fisik kronis yang diakibatkan oleh stres berkepanjangan tanpa mekanisme penanganan (coping mechanism) yang efektif. Menurut Organisasi Kesehatan Dunia (WHO), burnout memiliki 3 pilar tanda utama:</p>
<ul>
    <li><strong>Kelelahan ekstrem (Exhaustion):</strong> Merasa terkuras energinya terus-menerus sejak bangun pagi hingga malam hari.</li>
    <li><strong>Depersonalisasi & Sinisme:</strong> Mulai menjaga jarak emosional dari rekan kerja, klien, atau perusahaan, serta sering mengeluh sinis.</li>
    <li><strong>Penurunan Efikasi Diri:</strong> Merasa diri tidak kompeten, hasil kerja tidak ada artinya, dan kehilangan rasa percaya diri profesional.</li>
</ul>

<blockquote>
    "Burnout bukan tanda kelemahan karakter, melainkan sinyal biologis dan psikologis bahwa kapasitas adaptasi Anda telah melampaui batas tanpa jeda pemulihan yang seimbang."
</blockquote>

<h3>Langkah Praktis Menghadapi Burnout</h3>
<ol>
    <li><strong>Kenali Sinyal Tubuh Lebih Awal:</strong> Perhatikan gejala fisik seperti sakit kepala tegang berulang, insomnia, atau gangguan pencernaan.</li>
    <li><strong>Terapkan Batasan Digital (Digital Detox):</strong> Matikan notifikasi chat kerja setelah jam operasional kantor berakhir.</li>
    <li><strong>Refleksikan Makna & Beban Kerja:</strong> Bicarakan kapasitas beban tugas dengan atasan atau tim Anda secara objektif.</li>
    <li><strong>Konsultasikan dengan Tenaga Profesional:</strong> Jika rasa cemas dan keputusasaan berlangsung lebih dari 2 minggu, bimbingan konseling bersama psikolog berlisensi akan membantu Anda memetakan akar stres serta merekonstruksi pola pikir yang lebih adaptif.</li>
</ol>
EOT
            ],
            [
                'title'        => 'Pentingnya Asesmen Minat Bakat dan Gaya Belajar Sejak Dini untuk Anak',
                'slug'         => 'pentingnya-asesmen-minat-bakat-anak-sejak-dini',
                'category'     => 'Pendidikan & Anak',
                'excerpt'      => 'Memahami potensi unik dan gaya belajar anak membantu orang tua dan guru menyusun metode pendampingan yang tepat tanpa membebani mentalitas anak.',
                'cover_image'  => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80',
                'author_name'  => 'Psikolog Pendidikan LoAction',
                'reading_time' => 5,
                'is_published' => true,
                'published_at' => now()->subDays(6),
                'views_count'  => 218,
                'content'      => <<<EOT
<p class="lead">Setiap anak lahir dengan komposisi kecerdasan majemuk (multiple intelligences) dan kepribadian yang berbeda. Memaksakan satu standar prestasi tunggal sering kali membuat anak merasa minder dan kehilangan antusiasme belajar alami mereka.</p>

<h3>Mengapa Asesmen Psikologi Pendidikan Diperlukan?</h3>
<p>Asesmen psikologi di bidang pendidikan bukan bertujuan untuk memberi label "pintar" atau "kurang pintar". Tujuannya adalah memetakan peta kognitif, modalitas sensorik dalam menyerap informasi, serta dominasi minat anak secara saintifik.</p>

<p>Melalui asesmen minat bakat, orang tua dan pendidik memperoleh wawasan mengenai:</p>
<ul>
    <li><strong>Gaya Belajar Dominan:</strong> Apakah anak bertipe Visual (mudah memahami gambar/grafik), Auditori (mudah menyerap lewat cerita dan diskusi), atau Kinestetik (harus banyak praktik dan bergerak).</li>
    <li><strong>Daya Tahan Kerja & Konsentrasi:</strong> Seberapa lama rentang fokus anak dan apa pemicu distraksi utamanya.</li>
    <li><strong>Kecenderungan Minat Karir di Masa Depan:</strong> Membantu pemilihan jurusan sekolah menengah atau perguruan tinggi yang selaras dengan panggilan jiwa anak.</li>
</ul>

<h3>Pendekatan "Handle with Care" dari LoAction</h3>
<p>Di Biro Psikologi LoAction, asesmen anak dilakukan dengan suasana yang menyenangkan, ramah anak, dan bebas dari intimidasi tes konvensional. Laporan hasil psikotes dilengkapi dengan sesi konsultasi interaktif bersama orang tua agar rekomendasi dapat diaplikasikan secara nyata dalam pola asuh sehari-hari di rumah.</p>
EOT
            ],
            [
                'title'        => 'Membangun Budaya Kerja Sehat & Retensi Karyawan Melalui People Analytics',
                'slug'         => 'membangun-budaya-kerja-sehat-dan-retensi-karyawan',
                'category'     => 'Karir & Organisasi',
                'excerpt'      => 'Bagaimana pendekatan psikologi industri dan organisasi (PIO) membantu manajemen HR memprediksi performa tim, mengurangi turnover, dan meningkatkan employee engagement.',
                'cover_image'  => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80',
                'author_name'  => 'Konsultan PIO LoAction',
                'reading_time' => 4,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'views_count'  => 312,
                'content'      => <<<EOT
<p class="lead">Tingginya angka perputaran karyawan (turnover rate) sering kali bukan hanya persoalan besaran kompensasi finansial, melainkan ketidakcocokan nilai budaya (culture fit), gaya kepemimpinan yang toksik, atau ketiadaan jenjang pengembangan kompetensi yang terarah.</p>

<h3>Peran Psikologi Industri & Organisasi dalam Bisnis</h3>
<p>Pendekatan Psikologi Industri & Organisasi (PIO) memandang karyawan sebagai aset insani yang memiliki dinamika motivasi, emosi, dan aspirasi. Dengan memanfaatkan alat tes psikometri yang tervalidasi serta asesmen kompetensi kerja, divisi Human Resources dapat:</p>
<ul>
    <li><strong>Memilih Kandidat yang Tepat (Right Person on the Right Place):</strong> Menilai kesesuaian profil kepribadian kerja dengan tuntutan posisi dan kultur divisi.</li>
    <li><strong>Pemetaan Potensi Kepemimpinan (Leadership Assessment):</strong> Menemukan calon suksesor pemimpin masa depan organisasi yang memiliki integritas dan kecerdasan emosional mumpuni.</li>
    <li><strong>Analisis Iklim Kerja & Kepuasan:</strong> Mengukur tingkat keterlibatan karyawan (employee engagement) sebelum terjadi penurunan performa atau gelombang resignasi massal.</li>
</ul>

<blockquote>
    "Perusahaan yang hebat tidak hanya merekrut orang pintar, tetapi juga menciptakan ekosistem psikologis yang aman (psychological safety) di mana setiap anggota berani berinovasi dan berbicara terbuka."
</blockquote>
EOT
            ],
            [
                'title'        => 'Panduan Lengkap Uji Sertifikasi BNSP: Keuntungan, Syarat, dan Tahapan Asesmen',
                'slug'         => 'panduan-lengkap-uji-sertifikasi-bnsp',
                'category'     => 'Uji Kompetensi',
                'excerpt'      => 'Ketahui mengapa sertifikasi kompetensi dari Badan Nasional Sertifikasi Profesi (BNSP) menjadi nilai tambah signifikan dalam persaingan industri kerja masa kini.',
                'cover_image'  => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
                'author_name'  => 'Asesor Kompetensi LoAction',
                'reading_time' => 5,
                'is_published' => true,
                'published_at' => now()->subDays(14),
                'views_count'  => 405,
                'content'      => <<<EOT
<p class="lead">Di tengah persaingan pasar tenaga kerja regional dan global yang kian kompetitif, ijazah formal perguruan tinggi sering kali perlu dilengkapi dengan sertifikasi keahlian terstandarisasi untuk membuktikan kompetensi kerja nyata.</p>

<h3>Apa itu Sertifikasi BNSP?</h3>
<p>Badan Nasional Sertifikasi Profesi (BNSP) adalah lembaga independen yang bertanggung jawab langsung kepada Presiden RI untuk menjamin mutu kompetensi tenaga kerja Indonesia melalui skema Standar Kompetensi Kerja Nasional Indonesia (SKKNI).</p>

<p>Manfaat utama mengantongi sertifikat kompetensi BNSP:</p>
<ul>
    <li><strong>Pengakuan Resmi Nasional & Regional (ASEAN MRA):</strong> Keahlian Anda diakui secara legal dan formal oleh dunia industri.</li>
    <li><strong>Daya Saing Karier Lebih Unggul:</strong> Menjadi pembeda utama saat melamar promosi jabatan atau posisi strategis di instansi/perusahaan multinasional.</li>
    <li><strong>Peningkatan Kredibilitas Profesional:</strong> Memastikan prosedur kerja Anda selaras dengan standar keselamatan, efisiensi, dan etika profesi terbaik.</li>
</ul>

<h3>5 Skema Uji Kompetensi Unggulan di LoAction</h3>
<p>Biro Psikologi LoAction bekerja sama dengan LSP terlisensi menyelenggarakan uji kompetensi profesional untuk berbagai skema, antara lain:</p>
<ol>
    <li>Asisten Psikolog</li>
    <li>Staff / Officer Human Resources (HR)</li>
    <li>Supervisor Rekrutmen & Seleksi</li>
    <li>Konselor Karir & Pendidikan</li>
    <li>Fasilitator Pelatihan & Pengembangan SDM</li>
</ol>
<p>Hubungi admin LoAction untuk jadwal uji kompetensi terdekat dan persyaratan portofolio yang perlu dipersiapkan!</p>
EOT
            ],
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate(
                ['slug' => $postData['slug']],
                $postData
            );
        }
    }
}

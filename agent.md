# AGENT.MD — Panduan Pengembangan & Operasional LoAction

Dokumen ini adalah acuan utama (single source of truth) untuk AI Agent dan pengembang agar pengembangan website **LoAction** tetap terarah, konsisten, dan mematuhi workflow deployment yang telah ditetapkan.

---

## 1. Profil Proyek

* **Nama Proyek:** LoAction (Biro Psikologi Terapan)
* **Deskripsi:** Website company profile dan portal intake konsultasi biro psikologi terapan berbadan hukum (SK Kemenkumham No. AHU-0001501.AH Tahun 2019).
* **Tagline:** *Handle with Care* — Layanan psikologi untuk individu, pendidikan, organisasi, dan uji kompetensi SDM.
* **Repository GitHub:** `https://github.com/FuchurHostSolutions/loaction.git`
* **Branch Utama:** `main`

---

## 2. Tech Stack & Environment

| Komponen | Spesifikasi / Konfigurasi |
| :--- | :--- |
| **Framework** | Laravel 12.x |
| **PHP Lokal** | PHP 8.2 (XAMPP `C:\xampp\php\php.exe`) — **Wajib ada ekstensi `ext-intl`** |
| **PHP Server** | PHP 8.4-FPM di Ubuntu/Debian server (`10.10.10.6`) |
| **Frontend** | Tailwind CSS v4, Blade Templating, Vite |
| **Admin Panel** | Filament v5 (`/admin`) |
| **Database** | MariaDB/MySQL di server remote `10.10.10.6` via ZeroTier (Database: `loaction_db`) |
| **Web Server Production**| Nginx di `/var/www/loaction` (`10.10.10.6`) |

---

## 3. Aturan Baku Pengembangan (Golden Rules)

1. **Gunakan PHP XAMPP di Komputer Lokal:**
   * Selalu jalankan `artisan` dan `composer` dengan PHP yang memiliki modul `ext-intl` (PHP XAMPP).
   * Perintah lokal: `C:\xampp\php\php.exe artisan <command>`
2. **Koneksi Database:**
   * Nama database adalah `loaction_db` (bukan `loacation_db`).
   * Host database mengarah ke server `10.10.10.6` port `3306`.
3. **Data Dinamis vs Hardcoded:**
   * Seluruh konten layanan, audiens, testimoni, dan kompetensi harus bersumber dari Database/Model Eloquent, bukan array hardcoded di dalam Blade atau Controller.
4. **Keamanan & Validasi:**
   * Semua form publik wajib dilindungi validasi ketat, CSRF token, dan rate limiting (`throttle`).
   * Jangan pernah meng-commit file kredensial `.env` atau folder cache runtime `storage/framework/*`.
5. **Autentikasi Filament Panel (`/admin`):**
   * Model `User.php` **wajib** mengimplementasikan `Filament\Models\Contracts\FilamentUser` dan method `canAccessPanel()` agar tidak terblokir (HTTP 403) pada environment production.
   * Halaman login mendukung input fleksibel via **Email atau Username** (`App\Filament\Pages\Auth\Login`).
   * Kredensial akun terdaftar:
     * User: `iqbal` (atau `iqbal@loaction.id`) | Password: `iqbal`
     * User: `admin` (atau `admin@loaction.id`) | Password: `admin1234`
     * User: `psikolog@loaction.id` | Password: `psikolog1234`

---

## 4. Alur Kerja Wajib (Git & Server Deployment)

> [!IMPORTANT]
> **ATURAN WAJIB DEPLOYMENT:**
> **Setiap kali sebuah task selesai dikerjakan dan diverifikasi secara lokal, langsung lakukan commit, push ke GitHub, dan pull ke server produksi.**

### Langkah Deployment Standar:

```bash
# 1. Stage & Commit di Lokal
git add .
git commit -m "feat/fix: <deskripsi pekerjaan yang selesai>"

# 2. Push ke GitHub
git push origin main

# 3. Pull ke Server Produksi (via SSH 10.10.10.6)
# Jalankan perintah remote:
cd /var/www/loaction && git pull origin main && php artisan optimize:clear
```

Jika terdapat migrasi baru atau pembaruan composer:
```bash
cd /var/www/loaction && php artisan migrate --force && php artisan optimize
```

---

## 5. Roadmap & Status Pekerjaan

### Fase 1: Perbaikan Pondasi & Stabilitas (SELESAI)
- [x] Memperbaiki konflik ekstensi `ext-intl` pada PHP lokal.
- [x] Memperbaiki konfigurasi `bind-address` dan hak akses MariaDB di server `10.10.10.6`.
- [x] Membuat model yang hilang: `Audience.php` dan `Competency.php`.
- [x] Membuat modular seeders: `AdminUserSeeder`, `ServiceSeeder`, `AudienceSeeder`, `CompetencySeeder`, `TestimonialSeeder`, `ConsultationSeeder`.
- [x] Membersihkan duplikasi route dan unused imports di `routes/web.php`.
- [x] Memperbaiki `$PROFILE` PowerShell agar otomatis memprioritaskan PHP XAMPP.

### Fase 2: Peningkatan UX & Konversi Leads (SELESAI)
- [x] **Direct WhatsApp Action:** Tombol langsung ke WhatsApp di banner sukses pasca-submit form konsultasi dengan pesan pra-isi otomatis.
- [x] **Enhancement Form Konsultasi:** Menambahkan field *Metode Sesi (Online / Offline)* dan *Preferensi Waktu* pada form dan database.
- [x] **Spam Protection:** Pemasangan Honeypot (`b_address`) dan middleware `throttle:5,1` pada route `POST /kontak`.

### Fase 3: Peningkatan Panel Admin Filament (SELESAI)
- [x] **Aksi Cepat WhatsApp di Tabel Konsultasi:** Tombol aksi 1-klik untuk langsung membuka chat WhatsApp ke nomor klien beserta pesan salam resmi.
- [x] **Aksi Cepat Update Status:** Tombol 1-klik untuk mengubah status konsultasi menjadi *Processed*.
- [x] **Status Badge Colors:** Badge warna dinamis (`warning` untuk Pending, `success` untuk Processed, `danger` untuk Cancelled).
- [x] **Filter Tabel Konsultasi:** Filter status, tipe layanan (`service_id`), dan metode sesi (`session_type`).
- [x] **Resource Baru di Filament:**
  - `AudienceResource` (mengelola target audiens / segmen pasar).
  - `CompetencyResource` (mengelola skema uji kompetensi & asesmen SDM).
- [x] **Autentikasi & Custom Login Page:** Mendukung login via Username atau Email, mengimplementasikan `FilamentUser` pada model `User` agar tidak terblokir (HTTP 403) di production.

### Fase 4: Integrasi Konten & SEO (SEDANG BERJALAN)
- [x] Tampilkan data `$audiences` dan `$competencies` secara dinamis di `pages/home.blade.php`.
- [x] Optimasi responsivitas mobile-first pada halaman Beranda (penyesuaian padding layar kecil, touch target tombol adaptif, card grid responsif, perbaikan nesting tag HTML).
- [x] **Fix Login Production:** 
  - Mengonfigurasi `trustProxies(at: '*')` di `bootstrap/app.php` dan `URL::forceScheme('https')` di `AppServiceProvider.php` agar Livewire mengenali skema HTTPS di balik reverse proxy Cloudflare. Sebelumnya, URL Livewire di-generate dengan `http://` sehingga browser memblokir request form login karena **Mixed Content** (HTTPS form to HTTP endpoint).
  - Mengatur permission `.env` ke `644` dan `SESSION_DOMAIN=null` agar cookie sesi tersimpan otomatis sesuai host domain.
  - **Migrasi Cache & Sesi ke Database MariaDB:** 
    - Cache: `CACHE_STORE=database` dengan tabel `cache` dan `cache_locks`.
    - Sesi: `SESSION_DRIVER=database` dengan tabel `sessions`.
    - Cookie: Mengganti nama cookie sesi menjadi `SESSION_COOKIE=loaction_admin_session` dengan `SESSION_SECURE_COOKIE=true`. Perubahan nama cookie ini secara permanen memutus konflik duplikat cookie domain lama (`.loaction.buildsys.site` vs `loaction.buildsys.site`) di browser user yang sebelumnya menyebabkan request redirect pasca-login membaca cookie sesi kosong lama.
- [x] **Fix Placeholder Login:** Hapus hint placeholder "admin@loaction.id atau iqbal" dari form login Filament.
- [x] **Fix Icon Kompetensi:** Icon berhasil diganti dari heroicon class name ke emoji (👤👥💼✨) agar tampil di halaman Beranda.
- [ ] Tambahkan Schema Markup JSON-LD `MedicalBusiness` di layout `app.blade.php`.
- [ ] Buat sitemap dinamis (`sitemap.xml`) dan `robots.txt`.

### Fase 5: Fitur Lanjutan (Future)
- [ ] Halaman detail per layanan (`/layanan/{slug}`) lengkap dengan alur asesmen dan FAQ.
- [ ] Modul Blog / Psikoedukasi terintegrasi di Filament.
- [ ] Section logo klien & mitra institusi di halaman Beranda.

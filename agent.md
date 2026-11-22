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

### Fase 2: Peningkatan UX & Konversi Leads (DALAM PROGRESS / PRIORITAS BERIKUTNYA)
- [ ] **Direct WhatsApp Action:** Tambahkan modal/tombol langsung ke WhatsApp setelah submit form konsultasi dengan pesan pra-isi.
- [ ] **Enhancement Form Konsultasi:** Tambah opsi *Metode Sesi (Online/Offline)* dan *Preferensi Waktu*.
- [ ] **Spam Protection:** Pasang Honeypot dan middleware `throttle:5,1` pada route `POST /kontak`.

### Fase 3: Peningkatan Panel Admin Filament
- [ ] **Aksi Cepat WhatsApp di Tabel Konsultasi:** Tombol 1-klik untuk langsung chat ke nomor klien.
- [ ] **Status Badge Colors:** Warna `warning` (Pending), `success` (Processed), `danger` (Cancelled).
- [ ] **Filter Status & Layanan:** Mempermudah admin menyaring leads yang belum diproses.
- [ ] **Resource Baru di Filament:**
  - `AudienceResource` (mengelola target audiens).
  - `CompetencyResource` (mengelola skema uji kompetensi).
  - `UserResource` (mengelola akun admin & psikolog).

### Fase 4: Integrasi Konten & SEO
- [ ] Tampilkan data `$audiences` dan `$competencies` secara dinamis di `pages/home.blade.php`.
- [ ] Tambahkan Schema Markup JSON-LD `MedicalBusiness` di layout `app.blade.php`.
- [ ] Buat sitemap dinamis (`sitemap.xml`) dan `robots.txt`.

### Fase 5: Fitur Lanjutan (Future)
- [ ] Halaman detail per layanan (`/layanan/{slug}`) lengkap dengan alur asesmen dan FAQ.
- [ ] Modul Blog / Psikoedukasi terintegrasi di Filament.
- [ ] Section logo klien & mitra institusi di halaman Beranda.

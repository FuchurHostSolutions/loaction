# LoAction Laravel Website

Website company profile **LoAction** berbasis **Laravel + Blade + Tailwind CSS + Vite**.

## Fitur

- Landing page satu halaman untuk LoAction.
- Konten profil biro, visi, misi, layanan, uji kompetensi, testimoni, dan kontak.
- Blade templating dengan data layanan dari `HomeController`.
- Tailwind CSS via Vite.
- Navigasi responsif mobile/desktop.
- Form konsultasi Laravel dengan validasi dan flash message demo.
- Tombol WhatsApp mengambang dan link Instagram.

## Struktur utama

```text
app/Http/Controllers/HomeController.php
routes/web.php
resources/views/layouts/app.blade.php
resources/views/pages/home.blade.php
resources/css/app.css
resources/js/app.js
```

## Cara menjalankan lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
php artisan serve
```

Buka:

```text
http://127.0.0.1:8000
```

## Build untuk production

```bash
npm run build
php artisan optimize
```

## Bagian yang perlu diganti sebelum production

1. Nomor WhatsApp pada `HomeController.php`:

```php
'whatsappUrl' => 'https://wa.me/6281234567890?...'
```

2. Email footer di `resources/views/layouts/app.blade.php`:

```html
hello@loaction.id
```

3. Testimoni placeholder di `HomeController.php`.
4. Jika form ingin benar-benar mengirim data, sambungkan `submitConsultation()` ke database, email, atau WhatsApp API.

## Catatan

Folder `vendor/` dan `node_modules/` tidak disertakan di ZIP. Jalankan `composer install` dan `npm install` setelah ekstraksi.

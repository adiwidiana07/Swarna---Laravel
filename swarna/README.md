# SWARNA - Company Profile

Website company profile kreatif studio SWARNA yang menampilkan portofolio, divisi, dan galeri karya.

## Fitur

- Halaman Home dengan Hero, About, Portfolio, dan CTA
- Halaman Divisi (Apparel, Decor, Design)
- Galeri Karya dengan filter kategori dan lightbox
- Halaman About dan Contact
- Admin Dashboard untuk mengelola konten
- Login Admin untuk akses dashboard
- Desain responsif dengan tema gelap mewah

## Teknologi

- Laravel 12
- Tailwind CSS v4
- Vite
- MySQL
- AOS (Animate on Scroll)
- Swiper JS

## Instalasi

```bash
# Clone repositori
git clone <repository-url>
cd swarna

# Install dependencies PHP
composer install

# Install dependencies JS
npm install

# Copy .env
cp .env.example .env

# Generate key
php artisan key:generate

# Buat database MySQL 'swarna' lalu jalankan migrasi
php artisan migrate

# Seed data awal
php artisan db:seed

# Buat storage link
php artisan storage:link

# Build assets
npm run build
```

## Login Admin

- **URL:** `/login`
- **Username:** `admin`
- **Password:** `password`

## Development

```bash
# Jalankan Laravel dev server
php artisan serve

# Jalankan Vite dev server (di terminal terpisah)
npm run dev
```

## Struktur Direktori

```
swarna/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/        # Controller untuk admin panel
│   │   └── AuthController.php
│   └── Models/            # Eloquent Models
├── database/
│   ├── migrations/        # Migrasi database
│   └── seeders/           # Data seeder
├── public/
│   ├── css/               # Stylesheet
│   ├── js/                # JavaScript
│   └── img/               # Gambar
├── resources/
│   └── views/             # Blade templates
│       ├── admin/         # Halaman admin
│       ├── auth/          # Halaman login
│       └── layouts/       # Layout utama
└── routes/
    └── web.php            # Route definitions
```

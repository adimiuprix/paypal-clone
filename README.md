# Paypal Clone

Aplikasi web yang mengkloning situs PayPal untuk mempermudah simulasi urusan transaksi dan autentikasi.

## Fitur

- Autentikasi pengguna (Sign In/Sign Up)
- Dashboard akun
- Simulasi transaksi dan pembayaran
- Integrasi UI mirip PayPal menggunakan Tailwind CSS

## Persyaratan

- PHP ^8.2
- Composer
- Node.js (dengan npm)
- MySQL atau database lain yang didukung Laravel (seperti SQLite untuk development)

## Instalasi

1. Kloning repository ini:
   ```bash
   git clone https://github.com/adimiuprix/paypal-clone.git
   cd paypal-clone
   ```

2. Install dependensi PHP menggunakan Composer:
   ```bash
   composer install
   ```

3. Salin file konfigurasi environment:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

## Cara Penggunaan

1. Jalankan server development:
   ```bash
   php artisan serve
   ```
   Aplikasi akan berjalan di `http://localhost:8000`.

2. Untuk development dengan frontend assets dan queue:
   ```bash
   composer run dev
   ```
   Ini akan menjalankan server Laravel, listener queue, dan Vite dev server secara bersamaan.

3. Buka browser dan kunjungi `http://localhost:8000` untuk mengakses aplikasi.

## Testing

Jalankan semua test menggunakan PHPUnit:
```bash
php artisan test
```

Atau menggunakan script Composer:
```bash
composer run test
```

## Kontribusi

Silakan fork repository ini dan buat pull request untuk kontribusi. Pastikan untuk menjalankan test sebelum submit.

## Lisensi

Aplikasi ini menggunakan lisensi MIT.

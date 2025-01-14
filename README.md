# Perpustakaan Backend

Perpustakaan Backend ini merupakan dashboard untuk manajemen peminjaman pada perpustakaan, yang terintegrasi dengan API. Proyek ini dibangun menggunakan Laravel 11 dan menggunakan Laravel Sanctum sebagai autentikasinya. Aplikasi ini dibuat untuk memenuhi nilai uji kompetensi.

## Fitur

- Manajemen buku
- Manajemen anggota perpustakaan
- Manajemen peminjaman dan pengembalian buku
- Autentikasi menggunakan Laravel Sanctum
- API untuk integrasi dengan frontend

## Instalasi

1. Clone repositori ini:
    ```bash
    git clone https://github.com/username/perpustakaan-backend.git
    ```
2. Masuk ke direktori proyek:
    ```bash
    cd perpustakaan-backend
    ```
3. Install dependencies menggunakan Composer:
    ```bash
    composer install
    ```
4. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
    ```bash
    cp .env.example .env
    ```
5. Generate application key:
    ```bash
    php artisan key:generate
    ```
6. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```

## Menjalankan Aplikasi

1. Jalankan server pengembangan Laravel:
    ```bash
    php artisan serve
    ```
2. Akses aplikasi di browser melalui URL:
    ```
    http://localhost:8000
    ```

## Autentikasi

Proyek ini menggunakan Laravel Sanctum untuk autentikasi. Pastikan untuk membaca dokumentasi Laravel Sanctum untuk informasi lebih lanjut tentang cara menggunakannya.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori ini dan buat pull request dengan perubahan yang Anda buat.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).


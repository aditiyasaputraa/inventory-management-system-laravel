# Inventory Management System - Laravel

Inventory Management System adalah aplikasi web berbasis Laravel untuk mengelola data inventaris barang, kategori, supplier, transaksi barang masuk, barang keluar, laporan, dan QR Code barang. Project ini dibuat sebagai portofolio Fullstack Developer menggunakan Laravel, MySQL, Tailwind CSS, Chart.js, PDF Export, dan Excel Export.

## Fitur Utama

* Authentication Login & Register
* Dashboard dinamis berdasarkan database
* Grafik transaksi barang masuk dan keluar menggunakan Chart.js
* CRUD Data Barang
* CRUD Kategori Barang
* CRUD Supplier
* Upload gambar barang
* Search dan filter data barang
* Transaksi barang masuk dengan update stok otomatis
* Transaksi barang keluar dengan validasi stok
* Export laporan PDF
* Export laporan Excel
* QR Code untuk setiap barang
* Role Middleware untuk pembatasan akses user
* Tampilan dashboard modern dan responsif

## Teknologi yang Digunakan

* Laravel 10
* PHP 8.1
* MySQL
* Tailwind CSS
* Laravel Breeze
* Chart.js
* DomPDF
* Laravel Excel
* Simple QR Code
* Git & GitHub

## Screenshot

### Dashboard

Tambahkan screenshot dashboard di sini.

### Data Barang

Tambahkan screenshot halaman data barang di sini.

### QR Code Barang

Tambahkan screenshot halaman QR Code di sini.

### Laporan

Tambahkan screenshot halaman laporan di sini.

## Instalasi Project

Clone repository:

```bash
git clone https://github.com/aditiyasaputraa/inventory-management-system-laravel.git
```

Masuk ke folder project:

```bash
cd inventory-management-system-laravel
```

Install dependency Laravel:

```bash
composer install
```

Install dependency Node.js:

```bash
npm install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur konfigurasi database di file `.env`:

```env
DB_DATABASE=db_inventaris_barang
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

Jalankan Vite:

```bash
npm run dev
```

Jalankan server Laravel:

```bash
php artisan serve
```

Akses aplikasi:

```text
http://127.0.0.1:8000
```

## Role User

Aplikasi ini mendukung role user seperti:

* Admin
* Staff
* Manager

Role digunakan untuk membatasi akses halaman tertentu pada sistem.

## Status Project

Project ini masih dapat dikembangkan lebih lanjut, seperti:

* Manajemen user dari dashboard
* Notifikasi stok realtime
* Deploy online
* API inventory
* Riwayat aktivitas lebih detail

## Developer

Dibuat oleh:

**Aditiya Saputra**
Fullstack Developer Portfolio Project

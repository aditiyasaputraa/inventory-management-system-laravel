# 📦 Inventory Management System

Sistem Inventaris Barang berbasis web yang dikembangkan menggunakan Laravel untuk membantu pengelolaan data barang, kategori, supplier, transaksi barang masuk dan barang keluar secara lebih terstruktur dan efisien.

![Dashboard](screenshots/Screenshot%202026-06-19%20025332.png)

## 🚀 Fitur Utama

### Dashboard

* Statistik inventaris secara realtime
* Total barang, kategori, supplier, dan pengguna
* Monitoring stok rendah
* Aktivitas transaksi terbaru

### Manajemen Data

* CRUD Data Barang
* CRUD Kategori Barang
* CRUD Supplier

### Transaksi Inventaris

* Barang Masuk
* Barang Keluar
* Update stok otomatis
* Validasi stok saat transaksi keluar

### Laporan

* Export PDF
* Export Excel
* Laporan Data Barang
* Laporan Barang Masuk
* Laporan Barang Keluar

### QR Code

* Generate QR Code untuk setiap barang
* Mempermudah identifikasi inventaris

### Manajemen Pengguna

* Role Admin
* Role Staff
* Role Manager
* Pengaturan akun
* Ganti password
* Hak akses berdasarkan role

## 🛠️ Teknologi yang Digunakan

### Backend

* Laravel 10
* PHP 8.1
* MySQL

### Frontend

* Blade Template
* Tailwind CSS
* JavaScript
* Chart.js

### Library Tambahan

* Laravel Breeze
* DomPDF
* Laravel Excel
* Simple QR Code

## 📸 Tampilan Sistem

### Dashboard

Tambahkan screenshot dashboard di sini.

### Data Barang

Tambahkan screenshot data barang di sini.

### Barang Masuk

Tambahkan screenshot barang masuk di sini.

### Barang Keluar

Tambahkan screenshot barang keluar di sini.

### Laporan

Tambahkan screenshot laporan di sini.

### Manajemen Pengguna

Tambahkan screenshot halaman pengguna di sini.

## ⚙️ Instalasi

Clone repository:

```bash
git clone https://github.com/aditiyasaputraa/inventory-management-system-laravel.git
```

Masuk ke folder project:

```bash
cd inventory-management-system-laravel
```

Install dependency:

```bash
composer install
npm install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate key:

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`

```env
DB_DATABASE=db_inventaris_barang
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

Buat storage link:

```bash
php artisan storage:link
```

Jalankan aplikasi:

```bash
php artisan serve
npm run dev
```

## 👥 Role Pengguna

### Admin

* Mengelola seluruh sistem
* Mengelola user dan role
* Mengelola laporan

### Staff

* Mengelola data barang
* Mengelola barang masuk
* Mengelola barang keluar

### Manager

* Melihat dashboard
* Mengakses laporan

## 🎯 Tujuan Pengembangan

Project ini dibuat sebagai portofolio pengembangan aplikasi web berbasis Laravel untuk menunjukkan kemampuan dalam:

* Backend Development
* Database Management
* CRUD Operations
* Authentication & Authorization
* Role Based Access Control
* Reporting System
* Inventory Management

## 👨‍💻 Developer

**Aditiya Saputra**

Mahasiswa Teknologi Informasi
Universitas Bina Sarana Informatika (UBSI)

GitHub:
https://github.com/aditiyasaputraa

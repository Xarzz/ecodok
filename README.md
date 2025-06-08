<h1 align="center">🌿 ECODOK - Aplikasi Dokumentasi Adiwiyata</h1>

<p align="center">
  Aplikasi dokumentasi berbasis web untuk mempermudah guru dalam memantau kegiatan Adiwiyata siswa-siswi SMKN 1 Probolinggo.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-red?style=flat&logo=laravel" />
  <img src="https://img.shields.io/badge/PHP-8.1-blue?style=flat&logo=php" />
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat" />
</p>

---

## 🚀 Fitur Utama

- ✅ CRUD Jadwal Kegiatan (Siraman, Cek Kebersihan, Buang Sampah)
- ✅ CRUD Data Kelas
- 🧑‍🏫 Role: Admin (guru Adiwiyata)
- 📂 Struktur dokumentasi (Drive link opsional)
- 🚧 Fitur siswa & dokumentasi upload masih dalam pengembangan

---

## 📦 Requirement

- PHP >= 8.1
- Composer
- Laravel 10.x
- MySQL / MariaDB
- XAMPP / Laragon / Laravel Sail

---

## 🔧 Instalasi Lokal

1. **Clone repository**
bash
git clone https://github.com/username/ecodok.git
cd ecodok

2. **Install dependency**
composer install

3. **Copy file .env**
cp .env.example .env

4. **Konfigurasi database**
DB_DATABASE=ecodok
DB_USERNAME=root
DB_PASSWORD= // sesuaikan dengan settingan XAMPP kamu

5. **Import database**
- Buka phpMyAdmin
- Buat database baru: ecodok
- Import file dbecodok.sql yang ada di folder /database/ atau repo

6. **Generate application key**
php artisan key:generate

7. **Jalankan aplikasi**
php artisan serve

8. **Login ke Aplikasi**
- Gunakan Role: Admin
- Username, email dan password bisa di cek di database localhost

## Alur Aplikasi

1. **Login**
- Admin login sebagai guru Adiwiyata

2. **CRUD**
- Tambah jadwal kegiatan piket harian untuk kelas
- Pantau status (Sudah/Belum) dari kegiatan tersebut

3. **Dokumentasi**
- Dokumentasi bisa ditambahkan via link Google Drive 'opsional'

## Struktur Penting
├── app/
├── database/
│   ├── seeders/
│   └── dbecodok.sql  <- file SQL siap import
├── resources/
│   └── views/
│       ├── admin/
│       ├── auth/
|       └── layouts/
├── routes/
│   └── web.php


## Catatan
- Fitur dokumentasi oleh siswa belum aktif
- Belum menggunakan file upload (Drive masih manual)
- Gunakan akun admin untuk kelola jadwal dan kelas

## Author
- Nama: Muhammad Uhib Ibadatarrahman
- Sekolah: SMKN 1 Probolinggo

## License

Aplikasi ini menggunakan lisensi MIT - bebas digunakan dan dikembangkan lebih lanjut
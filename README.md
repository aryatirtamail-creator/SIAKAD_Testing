# Sistem Informasi Akademik

Aplikasi web sederhana untuk mengelola data akademik perguruan tinggi. Aplikasi dibuat menggunakan Laravel 12, menyediakan antarmuka web untuk pengelolaan data dan REST API dengan autentikasi token.

## Fitur

- Registrasi, login, dan pengelolaan profil pengguna.
- Dashboard setelah pengguna login.
- CRUD data mahasiswa, dosen, dan mata kuliah.
- Halaman kelas.
- REST API untuk registrasi/login serta membaca data mahasiswa dan mata kuliah.
- Autentikasi API menggunakan Laravel Sanctum.

## Teknologi

- PHP 8.2+
- Laravel 12
- SQLite (database bawaan) atau database lain yang didukung Laravel
- Laravel Sanctum
- Vite, Tailwind CSS, dan Alpine.js

## Persiapan

Pastikan PHP beserta ekstensi yang dibutuhkan Laravel, Composer, Node.js, dan npm sudah terpasang.

Jalankan perintah berikut dari folder `testing`:

```powershell
cd testing
composer install
npm install
Copy-Item .env.example .env
php artisan key:generate
if (!(Test-Path database/database.sqlite)) { New-Item database/database.sqlite -ItemType File }
php artisan migrate --seed
```

Konfigurasi bawaan memakai SQLite di `database/database.sqlite`. Perintah di atas membuat file database jika belum ada.

Untuk memakai database lain, ubah pengaturan `DB_*` di `.env`, lalu jalankan migrasi.

## Menjalankan aplikasi

Jalankan server Laravel:

```powershell
php artisan serve
```

Untuk mengaktifkan Vite selama pengembangan, buka terminal lain di folder `testing`:

```powershell
npm run dev
```

Buka alamat yang ditampilkan oleh `php artisan serve` (biasanya `http://127.0.0.1:8000`). Aset untuk build dapat dibuat dengan:

```powershell
npm run build
```

## Akun pengembangan

Seeder membuat pengguna berikut:

- Email: `test@example.com`
- Kata sandi: `password`

Gunakan akun ini hanya untuk pengembangan lokal. Untuk penggunaan nyata, gunakan kata sandi yang aman dan jangan memakai data akun contoh.

## Halaman web

Halaman dashboard, Mahasiswa, Dosen, Mata Kuliah, dan Kelas tersedia setelah login. Halaman Mahasiswa, Dosen, dan Mata Kuliah mendukung tambah, lihat daftar, ubah, dan hapus data.

## REST API

Semua endpoint menggunakan prefiks `/api`.

| Method | Endpoint | Autentikasi | Keterangan |
|---|---|---|---|
| `POST` | `/api/register` | Tidak | Registrasi; kirim `name`, `email`, `password`, dan `c_password` |
| `POST` | `/api/login` | Tidak | Login; kirim `email` dan `password` |
| `GET` | `/api/user` | Bearer token | Mengambil pengguna yang sedang login |
| `GET` | `/api/mahasiswa` | Bearer token | Mengambil daftar mahasiswa |
| `GET` | `/api/matakuliah` | Bearer token | Mengambil daftar mata kuliah |

Registrasi dan login mengembalikan token. Sertakan token tersebut saat mengakses endpoint yang memerlukan autentikasi:

```http
Authorization: Bearer <token>
Accept: application/json
```

Contoh body registrasi:

```json
{
  "name": "Nama Pengguna",
  "email": "pengguna@example.com",
  "password": "rahasia123",
  "c_password": "rahasia123"
}
```

## Struktur data

- **Mahasiswa:** NIM, nama, program studi, dan angkatan.
- **Dosen:** NIDN, nama, dan bidang keahlian.
- **Mata kuliah:** kode mata kuliah, nama mata kuliah, dan jumlah SKS.

## Pengujian

Jalankan pengujian aplikasi dengan:

```powershell
php artisan test
```

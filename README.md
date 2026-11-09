# Sistem Login dan Hak Akses (PHP & MySQL)

Proyek ini adalah tugas praktikum Pemrograman Web untuk mengimplementasikan sistem autentikasi (login) yang terkoneksi dengan database MySQL, lengkap dengan fitur pengaturan hak akses (Role-Based Access Control).

## Fitur Utama

- Sistem login menggunakan PHP dan MySQL.
- Keamanan password menggunakan fungsi `password_hash()` dan `password_verify()` (Bcrypt).
- Pembatasan hak akses (Role): Admin dan User Biasa.
- Halaman dashboard yang berbeda tergantung hak akses.
- Halaman khusus Admin untuk melihat daftar pengguna sistem.
- Proteksi halaman (mencegah akses langsung ke halaman dashboard jika belum login).
- Proteksi query menggunakan Prepared Statements untuk mencegah SQL Injection.

## Teknologi yang Digunakan

- HTML5 & CSS3 (Desain antarmuka)
- PHP Native
- MySQL (Database)
- XAMPP (Local Server)

## Struktur Folder

- `config.php` : File konfigurasi koneksi database.
- `database.sql` : File dump database untuk membuat tabel dan data dummy.
- `login.php` : Halaman form login dan logika autentikasi.
- `dashboard.php` : Halaman utama setelah login (menampilkan menu sesuai role).
- `kelola_user.php` : Halaman khusus Admin untuk melihat data pengguna.
- `logout.php` : Skrip untuk menghapus sesi dan keluar sistem.

## Cara Menjalankan Proyek Secara Lokal

1. Pastikan XAMPP sudah terinstal dan jalankan modul Apache serta MySQL.
2. Pindahkan seluruh folder proyek ini ke dalam direktori `C:\xampp\htdocs\`.
3. Buka `http://localhost/phpmyadmin/` di browser.
4. Buat database baru dengan nama `db_login`.
5. Import file `database.sql` ke dalam database tersebut, atau jalankan isi file tersebut melalui menu SQL.
6. Sesuaikan pengaturan koneksi (host, user, password, database) di dalam file `config.php` jika diperlukan.
7. Buka proyek di browser melalui tautan `http://localhost/tugas-login/login.php`.

## Akun Dummy untuk Pengujian

Gunakan akun berikut untuk menguji sistem:

**Akun Admin:**
- Username: admin
- Password: admin123
- Hak Akses: Dapat melihat menu Kelola Data User.

**Akun User Biasa:**
- Username: budi
- Password: user123
- Hak Akses: Hanya dapat melihat dashboard user, tidak bisa mengakses menu admin.

## Penulis

Hayulita
- GitHub: [@yuri-lan](https://github.com/yuri-lan)
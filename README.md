# Kantor Hukum Haraka — Booking & Konsultasi

Sistem informasi website Kantor Hukum Haraka dengan fitur booking konsultasi, form konsultasi, database MySQL, autentikasi admin, dan dashboard pengelolaan data.

## Teknologi
- HTML5, CSS3, JavaScript
- PHP 8+
- MySQL / MariaDB
- Font Awesome
- Google Fonts

## Fitur
- Website profil Haraka dengan UI/UX dark-gold premium
- Booking konsultasi
- Validasi jadwal agar tidak bentrok
- Kode booking otomatis
- Form konsultasi
- Dashboard admin
- Login admin dengan `password_hash()` / `password_verify()`
- Pengelolaan status booking

## Instalasi XAMPP
1. Salin folder project ke `htdocs`.
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin.
4. Import `database/haraka.sql`.
5. Buka `http://localhost/kantor-hukum-haraka/setup_admin.php`.
6. Buat akun admin.
7. Setelah berhasil, hapus `setup_admin.php`.
8. Website: `http://localhost/kantor-hukum-haraka/`
9. Admin: `http://localhost/kantor-hukum-haraka/admin/login.php`

## Catatan GitHub
Jangan commit credential server/database atau data klien nyata. Gunakan `.env`/environment variables ketika project dipindahkan ke hosting production.

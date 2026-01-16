# Laravel Blog UAS

## Kebutuhan Sistem
- PHP >= 8.2
- Composer
- MySQL
- Web Server (Apache)
- OS Windows

## Software Pendukung
1. XAMPP  
   https://www.apachefriends.org/download.html  
   Aktifkan **Apache** dan **MySQL**

2. Composer  
   https://getcomposer.org/download/

3. Git (opsional)  
   https://git-scm.com/install/windows

## Pengecekan Instalasi (Opsional)
Buka **CMD** (Windows + R → ketik `cmd`)
ketik: php -v, tunggu hasil muncul versi PHP, lalu
ketik: composer -V, tunggu hasil muncul versi composer

## Framework
1. Laravel 12
PHP >= 8.2

## Cara Menjalankan Project
1. Extract project ZIP
2. Misalnya project berada di: D:\UAS\uas-blog
3. Buka CMD
4. Masuk ke folder project:
	D:
	cd UAS
	cd uas-blog

## Pastikan posisi CMD:
D:\UAS\uas-blog>

## Perintah Instalasi (Jalankan Berurutan)
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link (boleh skip)
php artisan migrate:fresh --seed
php artisan db:seed
php artisan serve

## INGAT!!!
Jangan tutup Command Prompt selama program dijalankan pada browser!

## Akses Aplikasi di Browser
Halaman Publik
http://127.0.0.1:8000
Halaman Admin
http://127.0.0.1:8000/login
Akun Admin
Email : admin@uas.test
Password : admin123

## Catatan Penting (Hanya jika terjadi ERROR)
Pastikan MySQL aktif di XAMPP
Jika terjadi error tampilan, jalankan:
php artisan view:clear
php artisan cache:clear
php artisan config:clear

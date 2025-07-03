# HR System – Laravel

Aplikasi manajemen karyawan sederhana menggunakan Laravel 10+.

## ✅ Fitur

- CRUD data karyawan
- Upload foto ke AWS S3
- Cache data ke Redis
- Validasi input Laravel
- Penyimpanan sesi di database

---

## 💻 Persyaratan Sistem

- PHP 8.3 (via Laragon)
- Composer
- MySQL
- Redis
- Laravel 10+

---

## ⚙️ Langkah Instalasi

### 1. Clone Repository
git clone https://github.com/kamu/hr-system.git
cd hr-system

### Install Dependency
composer install

### Copy File .env
cp .env.example .env

Atur konfigurasi .env sesuai kebutuhan, seperti:
DB_DATABASE=hr_system_db
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=xxx
AWS_SECRET_ACCESS_KEY=xxx
AWS_DEFAULT_REGION=ap-southeast-2
AWS_BUCKET=nama-bucket

REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

### 4. Generate APP Key
php artisan key:generate

### 5. Jalankan Migrasi
php artisan migrate

### 6. Jalankan Redis
C:\laragon\bin\redis

### A. Jalankan secara manual:
C:\laragon\bin\redis\redis-server.exe

### Jalanin Aplikasi
✅ Test via Postman


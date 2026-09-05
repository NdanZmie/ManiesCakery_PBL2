# 🛠️ Panduan Instalasi & Menjalankan Sistem

Dokumen ini berisi panduan langkah-demi-langkah untuk meng-clone, menginstal dependensi, mengonfigurasi environment, dan menjalankan aplikasi web **Manies Cakery** di lingkungan lokal.

---

## 📋 Prasyarat Sistem (System Requirements)

Pastikan lingkungan lokal Anda telah terinstal:
- **PHP** >= 8.2 (Direkomendasikan PHP 8.3) dengan ekstensi `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `gd`/`imagick`.
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm** >= 9.x
- **Database Server**: MySQL / MariaDB (misalnya via Laragon, XAMPP, atau Docker)
- **Git**

---

## 🚀 Langkah Instalasi (Quick Start)

### 1. Clone Repository
```bash
git clone https://github.com/NdanZmie/ManiesCakery_PBL2.git
cd maniescakeryPBL2
```

### 2. Instal Dependensi PHP (Composer)
```bash
composer install
```

### 3. Instal Dependensi Frontend (npm)
```bash
npm install
```

### 4. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*Di Windows PowerShell / Command Prompt:*
```powershell
copy .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database:
```env
APP_NAME="Manies Cakery"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE="Asia/Jakarta"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_maniescakery
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Migrasi Database & Seeder Otomatis
Jalankan migrasi sekaligus seeder lengkap untuk membuat tabel dan menyalin seluruh aset dummy (kue, banner, galeri, dan akun default):
```bash
php artisan migrate --seed
```

> **Catatan:** Jika database sudah ada dan ingin di-reset total dari awal:
> ```bash
> php artisan migrate:fresh --seed
> ```

### 7. Buat Symbolic Link Storage (Opsional)
Untuk memastikan file unggahan publik terhubung:
```bash
php artisan storage:link
```

---

## 💻 Menjalankan Server Lokal

Jalankan server Laravel backend dan Vite dev server secara bersamaan:

**Terminal 1 (Laravel Dev Server):**
```bash
php artisan serve
```
*Aplikasi akan berjalan di:* `http://127.0.0.1:8000`

**Terminal 2 (Vite Frontend Hot Reload):**
```bash
npm run dev
```

---

## 🔑 Akun Default untuk Pengujian

Setelah seeder dijalankan (`php artisan db:seed`), akun berikut langsung siap digunakan:

| Tipe Akun | Username | Email | Password | Role | Akses |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Super Admin** | `admin` | `admin@maniescakery.com` | `password123` | `admin` | Admin Dashboard (`/dashboard`) |
| **Demo Customer** | `customer` | `customer@maniescakery.com` | `password123` | `user` | Profil & Storefront |

---

## 🧪 Menjalankan Automated Test
Untuk memvalidasi integritas sistem:
```bash
php artisan test
```

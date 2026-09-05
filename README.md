<p align="center">
  <img src="logo-polibatam.png" width="180" alt="Logo Politeknik Negeri Batam">
</p>

<h1 align="center">Politeknik Negeri Batam</h1>
<p align="center"><strong>Jurusan Teknik Informatika — Program Studi D3 Teknik Informatika (IF 2A Malam)</strong></p>

---

# 🍰 Manies Cakery (Hamdan Azmi Ver)
### 🚀 E-Commerce & Bakery CMS Platform — Modernized & Refactored Edition

> 🌟 **Catatan Pengembangan Khusus:**  
> Repository ini adalah **Manies Cakery (Hamdan Azmi Ver)** yang telah di-refactor dan dimodernisasi secara menyeluruh oleh **Hamdan Azmi** (*NIM: 3312411004*).  
> 🔗 **Repository Asli Kelompok (Original Team Repo):** [https://github.com/deaasnuari/maniescakeryPBL2.git](https://github.com/deaasnuari/maniescakeryPBL2.git)

---

## 👥 Identitas Tim PBL Kelompok 3

| NIM | Nama Lengkap | Peran / Kontribusi | Posisi |
| :--- | :--- | :--- | :--- |
| **3312411004** | **Hamdan Azmi** | Frontend & Backend Development (Refactored & Modernized Edition) | Anggota Tim |
| **3312411001** | **Dea Asnuari** | Frontend & Backend Development | Ketua Tim |
| **3312411008** | **Christian Marcelino** | Frontend & Backend Development | Anggota Tim |
| **3312411031** | **Fatra Syahreza** | Frontend & Backend Development | Anggota Tim |

---

[![Edition](https://img.shields.io/badge/Edition-Hamdan_Azmi_Ver-DFAC6B?style=for-the-badge&logo=github&logoColor=18110D)](https://github.com/NdanZmie/ManiesCakery_PBL2)
[![Original Repo](https://img.shields.io/badge/Original_Repo-deaasnuari%2FmaniescakeryPBL2-blue?style=for-the-badge&logo=git&logoColor=white)](https://github.com/deaasnuari/maniescakeryPBL2.git)
[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![Tests](https://img.shields.io/badge/Tests-16%20Passed-success?style=for-the-badge&logo=checkmarx&logoColor=white)](https://github.com/NdanZmie/ManiesCakery_PBL2)

**Manies Cakery (Hamdan Azmi Ver)** adalah platform web Content Management System (CMS) & E-Commerce modern yang dirancang khusus untuk toko kue dan pastry rumahan (UMKM) di Batam. Sistem ini menyediakan antarmuka toko publik bernuansa *modern dark cocoa & warm gold*, integrasi pemesanan instan via WhatsApp, serta panel administrasi lengkap untuk mengelola produk, kategori, banner, dan pengguna.

---

## ⚡ Panduan Cepat Menjalankan Sistem (Quick Start)

### 1. Clone & Instal Dependensi
```bash
git clone https://github.com/NdanZmie/ManiesCakery_PBL2.git
cd maniescakeryPBL2
composer install
npm install
```

### 2. Setup Environment (`.env`)
```bash
cp .env.example .env
php artisan key:generate
```
*Pastikan database Anda (misal: `db_maniescakery`) telah dibuat di MySQL / phpMyAdmin.*

### 3. Migrasi & Seeding Otomatis
Perintah ini akan membuat struktur database sekaligus menyalin seluruh aset gambar dummy (produk, banner slider, galeri) dan membuat akun default:
```bash
php artisan migrate --seed
```

### 4. Jalankan Aplikasi
```bash
# Terminal 1 - Backend Laravel Server
php artisan serve

# Terminal 2 - Frontend Hot Reload
npm run dev
```
Akses aplikasi melalui browser: [http://localhost:8000](http://localhost:8000)

---

## 🔑 Akun Default Sistem

| Role | Username | Email | Password | Hak Akses |
| :--- | :--- | :--- | :--- | :--- |
| **Super Admin** | `admin` | `admin@maniescakery.com` | `password123` | Akses penuh dashboard `/dashboard` |
| **Demo Customer** | `customer` | `customer@maniescakery.com` | `password123` | Akses belanja & edit profil |

---

## 🌟 Fitur Utama Sistem

### 🛒 Toko Publik (Storefront)
- **Hero Slider Carousel**: Banner promosi dinamis 5 slot dengan navigasi responsif.
- **Etalase Menu Favorit Beranda**: Maksimal 5 produk pilihan utama dengan rating dan harga.
- **Katalog & Filter Kategori**: Penjelajahan kue (*Cake, Brownies, Cookies, Hampers, Small Cake, Cupcake*).
- **Detail Produk & Direct Order**: Menghubungkan langsung ke WhatsApp dengan teks pesanan terformat otomatis.
- **Floating WhatsApp Widget**: Tombol live chat interaktif di pojok kanan bawah.
- **Halaman Dokumentasi Web**: Dokumentasi interaktif langsung di dalam website (`/dokumentasi`).
- **Autentikasi Fleksibel**: Pendaftaran pengguna, login email/username, mode tamu (*Guest*), dan lupa password.

### 👑 Panel Administrasi (Admin Workspace)
- **Ringkasan Statistik**: Dashboard metrik total produk, kuota menu favorit beranda, pengguna, dan kategori.
- **Kelola Produk & Menu**: Tambah, edit foto, ubah harga, hapus produk, serta pencarian instan.
- **Livewire Favorite Toggle**: Aktifkan/nonaktifkan menu favorit beranda secara real-time tanpa reload.
- **Kelola Kategori**: Tambah dan hapus kategori produk.
- **Manajemen Pengguna**: Kelola akun pelanggan dan hak akses administrator.
- **Kelola Banner & Konten**: Update foto slider beranda dan narasi halaman Tentang Kami.

---

## 🧪 Pengujian Otomatis (Automated Testing)

Sistem telah dilengkapi dengan test suite lengkap (16 Unit & Feature Tests) untuk memastikan keamanan rute, otentikasi, dan logika bisnis:
```bash
php artisan test
```

---

## 📚 Dokumentasi Lengkap (Folder `docs/`)

- 📖 [01. Panduan Instalasi & Setup Lengkap](docs/01-installation-and-setup.md)
- 🏛️ [02. Arsitektur Perangkat Lunak & Struktur Proyek](docs/02-architecture-and-structure.md)
- 🗄️ [03. Skema Database & Mekanisme Seeder Aset](docs/03-database-and-seeders.md)
- 🌟 [04. Panduan Fitur & Modul Sistem](docs/04-features-and-modules.md)
- 🛣️ [05. Daftar Rute & Routing Endpoints](docs/05-api-and-routing.md)
- 🛡️ [06. Pengujian Otomatis & Standar Keamanan](docs/06-testing-and-security.md)
- 👥 [07. Informasi Tim Pengembang & PBL Politeknik Negeri Batam](docs/07-team-and-pbl-info.md)

---

## 📌 Lisensi & Hak Cipta
- Dikembangkan dalam kegiatan **Project-Based Learning (PBL)** Politeknik Negeri Batam oleh **Kelompok 3 — IF 2A Malam**.
- Edisi modernisasi & refactoring oleh **Hamdan Azmi** (*NIM: 3312411004*).

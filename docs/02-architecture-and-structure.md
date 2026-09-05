# 🏗️ Arsitektur & Struktur Proyek (Hamdan Azmi Ver)

Dokumen ini menjelaskan arsitektur perangkat lunak, tumpukan teknologi (tech stack), pola desain, dan struktur folder pada proyek **Manies Cakery (Hamdan Azmi Ver)**.

---

## 🛠️ Tech Stack & Ekosistem

| Lapisan | Teknologi | Deskripsi |
| :--- | :--- | :--- |
| **Backend Framework** | Laravel 11.x | Arsitektur MVC, Eloquent ORM, Blade Templating, Middleware Auth & RBAC |
| **Bahasa Pemrograman** | PHP 8.3+ | Fitur PHP modern (typed properties, match expressions, readonly) |
| **Reaktivitas UI** | Livewire 3.x | Komponen reaktif real-time tanpa reload (seperti tombol toggle favorit) |
| **Styling & CSS** | Tailwind CSS v3 & Vanilla CSS | Desain kustom responsif, glassmorphism, animasi micro-interactions |
| **UI Components** | Flowbite & SVG Icons | Modal, drawer, tooltip, dropdown |
| **Build Tool** | Vite 6.x | Hot Module Replacement (HMR) & bundling aset produksi kilat |
| **Database** | MySQL 8.x / MariaDB | Penyimpanan relasional terstruktur |
| **Testing** | PHPUnit & Pest (Laravel Test) | Pengujian fitur, otentikasi, dan middleware |

---

## 📂 Struktur Direktori Proyek

```plaintext
maniescakeryPBL2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AboutUsController.php         # Kelola konten Tentang Kami & galeri
│   │   │   ├── DashboardController.php       # Ringkasan statistik dashboard admin
│   │   │   ├── ProdukController.php          # Katalog publik & detail produk
│   │   │   ├── ProdukDashboardController.php # CRUD katalog produk & kategori admin
│   │   │   ├── ProfileController.php         # Edit profil pengguna
│   │   │   ├── SliderController.php          # Unggah banner slider beranda
│   │   │   ├── UserController.php            # Manajemen pengguna & role
│   │   │   └── Auth/                         # Login, Register, Guest, Reset Password
│   │   └── Middleware/
│   │       └── AdminMiddleware.php           # Proteksi route dashboard hanya untuk role admin
│   ├── Livewire/
│   │   └── FavouriteToggle.php               # Komponen Livewire toggle menu favorit beranda
│   ├── Models/
│   │   ├── AboutUs.php                       # Model narasi & galeri toko
│   │   ├── Kategori.php                      # Model kategori kue & pastry
│   │   ├── Produk.php                        # Model katalog kue (harga, foto, status favorit)
│   │   ├── Slider.php                        # Model banner slider beranda
│   │   └── User.php                          # Model akun pengguna (admin & user)
│   └── Providers/
│       └── AppServiceProvider.php            # View composers global (kategori & menu favorit)
├── database/
│   ├── migrations/                           # Skema tabel database
│   └── seeders/
│       ├── DatabaseSeeder.php                # Master seeder
│       ├── UserSeeder.php                    # Akun default admin & customer
│       ├── KategoriSeeder.php                # Kategori kue awal
│       ├── ProdukSeeder.php                  # 50 produk kue & salin aset gambar
│       ├── AboutUsSeeder.php                 # Narasi & 6 foto galeri default
│       └── SliderSeeder.php                  # 5 banner slider beranda default
├── docs/                                     # Dokumentasi sistem terstruktur
├── public/
│   ├── assets/                               # Aset gambar mentah (produk, beranda, logo, banner)
│   └── storage/                              # Symlink direktori unggahan publik
├── resources/
│   ├── css/
│   │   └── app.css                           # Glassmorphism, shine buttons, styling kustom
│   ├── js/
│   │   └── app.js                            # Inisialisasi JavaScript & Alpine
│   └── views/
│       ├── components/                       # Blade reusable components (kartu katalog, modal)
│       ├── layouts/
│       │   ├── app.blade.php                 # Layout utama toko (header, footer, WA floating)
│       │   └── dashboard.blade.php           # Layout admin panel (dark cocoa header, sidebar)
│       ├── livewire/
│       │   └── favourite-toggle.blade.php    # Template tombol Livewire favorit
│       ├── pages/                            # Halaman toko (katalog, detail, tentang kami, auth)
│       │   └── dashboard/                    # Halaman admin (index/ringkasan, produk, users)
│       └── index_new.blade.php               # Beranda utama Manies Cakery
├── routes/
│   └── web.php                               # Definisi seluruh rute aplikasi
└── tests/
    └── Feature/
        └── SecurityAndAuthTest.php           # 16 unit & feature test lengkap
```

---

## 🔒 Pola Desain & Aliran Data (Data Flow)

1. **View Composers**: `AppServiceProvider` mendistribusikan data kategori ke halaman produk dan memastikan query `$produkFavorit` selalu mengambil maksimal 5 item aktif untuk beranda.
2. **Reaktivitas Komponen**: Perubahan status menu favorit beranda di dashboard langsung disinkronisasi melalui Livewire `favourite-toggle` dengan proteksi kuota maksimal 5 item.
3. **Role-Based Access Control (RBAC)**: Rute `/dashboard/*` dilindungi middleware gabungan `['auth', 'admin']` untuk mencegah akses yang tidak sah.

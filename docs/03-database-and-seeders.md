# 🗄️ Skema Database & Mekanisme Seeder Aset (Hamdan Azmi Ver)

Dokumen ini menjelaskan struktur tabel, kolom, relasi, serta mekanisme otomatis penyalinan aset gambar saat proses seeding dijalankan pada **Manies Cakery (Hamdan Azmi Ver)**.

---

## 📊 Entitas & Skema Tabel Database

### 1. Tabel `user` (Tabel Pengguna)
Menyimpan akun pelanggan dan administrator.
| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | BIGINT (PK, Auto) | Identifier unik pengguna |
| `name` | VARCHAR(255) | Nama lengkap pengguna |
| `username` | VARCHAR(255) (Unique) | Username untuk login |
| `email` | VARCHAR(255) (Unique) | Alamat email terdaftar |
| `telepon` | VARCHAR(255) (Nullable) | Nomor telepon / WhatsApp |
| `password` | VARCHAR(255) | Hash password (Bcrypt) |
| `role` | ENUM('admin', 'user', 'guest') | Peran hak akses akun |
| `gambar` | VARCHAR(255) (Nullable) | Lokasi path foto profil |
| `last_login_at` | TIMESTAMP (Nullable) | Waktu terakhir login |
| `created_at` & `updated_at` | TIMESTAMP | Waktu pembuatan & update |

---

### 2. Tabel `produk` (Katalog Kue & Pastry)
Menyimpan data seluruh produk kue.
| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | BIGINT (PK, Auto) | Identifier unik produk |
| `nama` | VARCHAR(255) | Nama kue (misal: *Special Birthday Cake*) |
| `deskripsi` | TEXT | Keterangan rasa, bahan, dan keunggulan |
| `harga` | DECIMAL / BIGINT | Harga dalam mata uang Rupiah |
| `kategori` | VARCHAR(255) | Kategori produk (*Cake, Brownies, Cookies, dll*) |
| `gambar` | VARCHAR(255) (Nullable) | Path gambar di folder storage |
| `status` | BOOLEAN | Status ketersediaan stok (`true`/`false`) |
| `favourit` | TINYINT(1) / BOOLEAN | `1` = Tampil di Menu Favorit Beranda (Maks 5 item) |
| `link_instagram` | VARCHAR(255) (Nullable) | Tautan ke postingan / reels Instagram |
| `created_at` & `updated_at` | TIMESTAMP | Waktu pembuatan & update |

---

### 3. Tabel `kategori` (Kategori Produk)
| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | BIGINT (PK, Auto) | Identifier kategori |
| `nama` | VARCHAR(255) (Unique) | Nama kategori (*Cake, Brownies, Cookies, dll*) |

---

### 4. Tabel `sliders` (Banner Slider Beranda)
| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | BIGINT (PK, Auto) | Posisi slider (1 sampai 5) |
| `gambar` | VARCHAR(255) | Nama file banner pada storage slider |

---

### 5. Tabel `about_us` (Tentang Kami & Galeri)
| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | BIGINT (PK, Auto) | Identifier konten |
| `about_left` & `about_right` | TEXT | Paragraf cerita toko |
| `philosophy_left` & `philosophy_right` | TEXT | Paragraf filosofi toko |
| `galeri` | VARCHAR(255) (Nullable) | Path foto galeri workshop |

---

## 🔁 Mekanisme Otomatis Seeder Aset (Asset-to-Storage Sync)

Saat perintah `php artisan db:seed` atau `php artisan migrate:fresh --seed` dieksekusi:

1. **`UserSeeder`**:
   - Memastikan akun `admin` (`admin@maniescakery.com` / `password123`) dan `customer` siap digunakan.
2. **`KategoriSeeder`**:
   - Mendaftarkan kategori default: `Cake`, `Brownies`, `Cookies`, `Hampers`, `Small Cake`, `Cupcake`.
3. **`ProdukSeeder`**:
   - Membuat folder `storage/app/public/images/` dan `public/storage/images/` secara otomatis jika belum ada.
   - Menyalin seluruh file gambar dari `public/assets/produk/` dan `public/assets/hampers/` ke folder storage.
   - Memasukkan 50 produk dummy lengkap dengan harga realistis dan deskripsi.
   - Mengaktifkan tepat **5 Produk Signature** dengan status `favourit = 1`.
4. **`SliderSeeder`**:
   - Menyalin 5 gambar banner dari `public/assets/beranda/` ke `storage/app/public/slider/`.
5. **`AboutUsSeeder`**:
   - Menyalin 6 foto galeri dari `public/assets/beranda/` ke `storage/app/public/galeri/`.
   - Mengisi teks narasi dan filosofi default.

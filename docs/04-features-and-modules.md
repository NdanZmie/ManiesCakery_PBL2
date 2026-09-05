# 🌟 Panduan Fitur & Modul Sistem

Dokumen ini menguraikan seluruh fitur yang tersedia pada aplikasi **Manies Cakery**, baik untuk pengguna publik (toko) maupun pengelola toko (administrator).

---

## 🍰 1. Modul Pengguna Publik (Storefront)

### A. Halaman Beranda (`index_new.blade.php`)
- **Hero Carousel Banner**: Slider banner dinamis 5 slot dengan navigasi panah, thumbnail indicator, dan timer otomatis.
- **Etalase Menu Favorit**: Menampilkan maksimal 5 kue favorit pilihan admin dengan animasi hover mewah, rating, tag kategori, dan harga.
- **Kategori Unggulan**: Akses cepat ke katalog berdasarkan kategori kue (Cake, Brownies, Cookies, Hampers, dll).
- **CTA Pre-Order**: Banner interaktif pemesanan instan via WhatsApp.
- **Floating WhatsApp Widget**: Tombol bantuan cepat di pojok kanan bawah dengan *interactive popover tooltip* dan aura glow live.
- **Footer Mewah**: 4 kolom informasi toko, navigasi, jam operasional, metode pembayaran, media sosial, dan tombol *Kembali ke Atas (Back to Top)*.

### B. Katalog & Detail Produk (`pages/product_page.blade.php` & `pages/produk_detail.blade.php`)
- **Filter Kategori**: Filter produk berdasarkan kategori aktif atau tampilkan semua produk (*All*).
- **Kartu Katalog**: Foto produk, badge kategori, harga Rupiah, dan tombol aksi lihat detail.
- **Halaman Detail Produk**: Galeri foto resolusi tinggi, deskripsi lengkap, rekomendasi produk sejenis, dan tombol direct order via WhatsApp yang memformat pesan otomatis dengan nama produk.

### C. Halaman Tentang Kami (`pages/about_us.blade.php`)
- Narasi kisah pendirian toko dan komitmen bahan alami.
- Filosofi pembuatan kue rumahan.
- Galeri foto workshop dan pembuatan kue.

### D. Autentikasi Pelanggan
- **Login & Register**: Pendaftaran mandiri akun pelanggan.
- **Guest Mode**: Fitur belanja/eksplorasi sebagai tamu tanpa registrasi permanen.
- **Lupa Password**: Verifikasi email dan reset kata sandi mandiri.

---

## 👑 2. Modul Admin Panel (`/dashboard`)

### A. Header & Navigasi Admin (`layouts/dashboard.blade.php`)
- Desain *Dark Cocoa & Warm Gold* modern tanpa bingkai kaku.
- Tombol **"Lihat Toko"** untuk pratinjau halaman publik secara langsung.
- Profil administrator dengan avatar inisial dan badge role.
- Tombol logout aman.

### B. Ringkasan Dashboard (`pages/dashboard/index.blade.php`)
- **Banner Selamat Datang**: Indikator status sistem aktif dan tombol aksi cepat.
- **4 Kartu Metrik Statistik**: Total produk aktif, kuota menu favorit beranda (X/5), total akun pengguna terdaftar, dan jumlah kategori.
- **Tabel Ringkas**: 5 produk terbaru dan 5 pengguna yang baru bergabung.

### C. Kelola Produk & Menu (`pages/dashboard/products.blade.php`)
- **Filter Tabs**: Tab penyaring *Semua Produk* dan *Menu Favorit Beranda (X/5)*.
- **Pencarian Cepat**: Cari nama kue atau kategori dengan respon instan.
- **CRUD Produk**:
  - Tambah produk baru lengkap dengan unggah foto, harga, deskripsi, kategori, dan tautan Instagram.
  - Edit informasi produk dan ganti foto.
  - Hapus produk (secara otomatis menghapus file foto dari storage).
- **Toggle Favorit Beranda (Livewire)**:
  - Mengaktifkan/menonaktifkan display beranda langsung tanpa reload halaman.
  - Dilengkapi validasi backend pembatas maksimal 5 item.
- **Kelola Kategori**: Tambah kategori baru atau hapus kategori lama.

### D. Kelola Pengguna (`pages/dashboard/users.blade.php`)
- Daftar seluruh akun pengguna terdaftar.
- Pencarian akun berdasarkan username atau email.
- Edit data akun dan ubah peran hak akses (*Role: Admin / User*).
- Hapus akun yang tidak aktif.

### E. Kelola Konten & Slider
- Unggah dan ganti gambar pada 5 slot banner slider beranda.
- Perbarui teks narasi dan foto galeri pada halaman Tentang Kami.

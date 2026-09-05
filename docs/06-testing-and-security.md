# 🛡️ Pengujian Otomatis & Standar Keamanan

Dokumen ini menjelaskan strategi pengujian otomatis, cakupan skenario pengujian, dan implementasi keamanan pada aplikasi **Manies Cakery**.

---

## 🧪 1. Pengujian Otomatis (Automated Testing)

Aplikasi dilengkapi dengan test suite lengkap berbasis PHPUnit & Feature Testing Laravel di dalam direktori `tests/Feature/SecurityAndAuthTest.php`.

### Menjalankan Seluruh Test Suite
```bash
php artisan test
```

### 📋 Cakupan Skenario Pengujian (16 Test Cases)

| No | Nama Kasus Uji | Skenario yang Diuji | Status |
| :---: | :--- | :--- | :---: |
| 1 | `test_guest_cannot_access_admin_dashboard` | Tamu yang belum login diarahkan ke `/login` saat mengakses `/dashboard` | ✅ PASS |
| 2 | `test_regular_user_cannot_access_admin_dashboard` | Pengguna biasa (`role: user`) dilarang mengakses dashboard (`403 Forbidden`) | ✅ PASS |
| 3 | `test_admin_user_can_access_admin_dashboard` | Administrator (`role: admin`) dapat membuka dashboard (`200 OK`) | ✅ PASS |
| 4 | `test_regular_user_can_register` | Pendaftaran pengguna baru berhasil menyimpan password ter-hash | ✅ PASS |
| 5 | `test_guest_login_works` | Login mode tamu berfungsi dan data sesi dihapus saat logout | ✅ PASS |
| 6 | `test_admin_can_edit_and_update_user` | Admin dapat mengubah identitas dan role pengguna lain | ✅ PASS |
| 7 | `test_admin_can_delete_category` | Admin dapat menghapus kategori kue | ✅ PASS |
| 8 | `test_home_page_renders_slider_banners` | Halaman utama merender carousel slider dan menu favorit | ✅ PASS |
| 9 | `test_about_us_page_renders_successfully` | Halaman Tentang Kami menampilkan narasi dan galeri | ✅ PASS |
| 10 | `test_admin_can_toggle_product_favorite_status` | Toggle status menu favorit beranda berfungsi (Route & Livewire) | ✅ PASS |
| 11 | `test_product_catalog_and_category_filter_render` | Katalog produk dan filter kategori termuat dengan baik | ✅ PASS |
| 12 | `test_product_detail_page_renders` | Halaman detail produk menampilkan data kue yang dipilih | ✅ PASS |
| 13 | `test_admin_can_search_products` | Pencarian produk di admin panel mengembalikan hasil yang sesuai | ✅ PASS |
| 14 | `test_sync_favorites_enforces_max_5_limit` | Sinkronisasi favorit menolak permintaan jika lebih dari 5 item (`422`) | ✅ PASS |
| 15 | `test_example_unit` | Unit test dasar PHPUnit | ✅ PASS |
| 16 | `test_example_feature` | Respons dasar aplikasi | ✅ PASS |

---

## 🔒 2. Fitur Keamanan Sistem (Security Implementations)

1. **Proteksi CSRF (Cross-Site Request Forgery)**: Seluruh formulir HTTP POST, PUT, dan DELETE dilindungi token `@csrf`.
2. **Otentikasi & Enkripsi Kata Sandi**: Sandi dienkripsi menggunakan algoritma Bcrypt (`Hash::make`).
3. **Role-Based Access Control (RBAC)**: Pemisahan tegas hak akses antara pelanggan reguler dan admin menggunakan `AdminMiddleware`.
4. **Validasi & Sanitasi Berkas Unggahan**:
   - Hanya menerima tipe file gambar: `jpeg`, `png`, `jpg`, `gif`, `svg`.
   - Batas ukuran berkas maksimum 2MB (2048 KB).
5. **Pencegahan SQL Injection**: Seluruh query database memanfaatkan *PDO Parameter Binding* melalui Laravel Eloquent ORM.
6. **XSS Protection**: Seluruh output variabel pada template Blade di-escape otomatis oleh sintaks `{{ $variable }}`.

# 🛣️ Daftar Rute & Routing Endpoints (Hamdan Azmi Ver)

Dokumen ini memetakan seluruh rute URL, metode HTTP, middleware perlindungan, dan controller yang bertindak sebagai *handler* pada aplikasi **Manies Cakery (Hamdan Azmi Ver)**.

---

## 🌐 1. Rute Publik (Tamu & Pelanggan)

| Metode | URI | Nama Rute | Controller / Aksi | Middleware |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/` | `home` | Closure (Beranda Utama) | `web` |
| `GET` | `/products/category={param}` | `produk.index` | `ProdukController@index` | `web` |
| `GET` | `/produk/{id}` | `produk.detail` | `ProdukController@produkDetail` | `web` |
| `GET` | `/about-us` | `about.index` | `AboutUsController@index` | `web` |

---

## 🔐 2. Rute Autentikasi

| Metode | URI | Nama Rute | Controller / Aksi | Middleware |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/login` | `login` | `LoginController@showLoginForm` | `guest` |
| `POST` | `/login` | `login.post` | `LoginController@login` | `guest` |
| `GET` | `/login/guest` | `login.guest` | `LoginController@guestLogin` | `guest` |
| `GET` | `/register` | `register` | `RegisterController@showRegisterForm` | `guest` |
| `POST` | `/register` | `register.post` | `RegisterController@register` | `guest` |
| `GET` | `/lupapassword` | `lupapassword` | Closure (Form Cek Email) | `guest` |
| `POST` | `/lupapassword` | `password.check` | `ForgotPasswordController@checkEmail` | `guest` |
| `GET` | `/resetpassword` | `resetpassword` | Closure (Form Reset Sandi) | `guest` |
| `POST` | `/resetpassword` | `password.reset` | `ForgotPasswordController@resetPassword` | `guest` |
| `POST` | `/logout` | `logout` | `LoginController@logout` | `auth` |

---

## 👤 3. Rute Pengguna Terotentikasi

| Metode | URI | Nama Rute | Controller / Aksi | Middleware |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/profile` | `profile.show` | `ProfileController@show` | `auth` |
| `POST` | `/profile/update` | `profile.update` | `ProfileController@update` | `auth` |

---

## 🛡️ 4. Rute Admin & Super Admin Protected

Seluruh rute ini dilindungi oleh middleware `['auth', 'admin']`:

### Dashboard Utama
| Metode | URI | Nama Rute | Controller / Aksi |
| :--- | :--- | :--- | :--- |
| `GET` | `/dashboard` | `dashboard` | `DashboardController@index` |

### Manajemen Produk & Kategori
| Metode | URI | Nama Rute | Controller / Aksi |
| :--- | :--- | :--- | :--- |
| `GET` | `/dashboard/products` | `dashboard.product.index` | `ProdukDashboardController@index` |
| `POST` | `/dashboard/products` | `dashboard.product.store` | `ProdukDashboardController@store` |
| `GET` | `/dashboard/products/search` | `dashboard.product.search` | `ProdukDashboardController@search` |
| `GET` | `/dashboard/products/{product}/edit` | `dashboard.product.edit` | `ProdukDashboardController@edit` |
| `PUT` | `/dashboard/products/{product}` | `dashboard.product.update` | `ProdukDashboardController@update` |
| `POST` | `/dashboard/products/{product}/toggle-favorite` | `dashboard.product.toggle-favorite` | `ProdukDashboardController@toggleFavorite` |
| `POST` | `/dashboard/products/sync-favorites` | `dashboard.product.sync-favorites` | `ProdukDashboardController@syncFavorites` |
| `DELETE` | `/dashboard/products/{product}` | `dashboard.product.destroy` | `ProdukDashboardController@destroy` |
| `POST` | `/dashboard/kategori/tambah` | `dashboard.kategori.tambah` | `ProdukDashboardController@addNewCategory` |
| `DELETE` | `/dashboard/kategori/{nama}` | `dashboard.kategori.hapus` | `ProdukDashboardController@deleteCategory` |

### Manajemen Pengguna
| Metode | URI | Nama Rute | Controller / Aksi |
| :--- | :--- | :--- | :--- |
| `GET` | `/usersdashboard` | `usersdashboard` | `UserController@index` |
| `RESOURCE` | `/users` | `users.*` | `UserController` (Resource CRUD) |

### Manajemen Slider & Tentang Kami
| Metode | URI | Nama Rute | Controller / Aksi |
| :--- | :--- | :--- | :--- |
| `POST` | `/slider/update` | `slider.update` | `SliderController@update` |
| `GET` | `/about-us/{id}/edit` | `about.edit` | `AboutUsController@edit` |
| `PUT` | `/about-us/{id}/update/about` | `about.update.about` | `AboutUsController@updateAbout` |
| `PUT` | `/about-us/{id}/update/philosophy` | `about.update.philosophy` | `AboutUsController@updatePhilosophy` |
| `PUT` | `/about-us/update/galeri` | `about.update.galeri` | `AboutUsController@updateGaleri` |
| `DELETE` | `/about-us/{id}/delete/{section}` | `about.destroyText` | `AboutUsController@destroyText` |

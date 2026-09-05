@extends('layouts.app')
@section('title', 'Dokumentasi Sistem (Hamdan Azmi Ver) - Manies Cakery')
@section('content')

<!-- Header Hero Section -->
<section class="relative bg-gradient-to-b from-[#18110D] via-[#241C16] to-[#18110D] text-white py-16 px-4 sm:px-6 lg:px-8 border-b border-amber-950/30 overflow-hidden">
    <!-- Ambient Glows -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#DFAC6B]/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 right-10 w-72 h-72 bg-[#B88746]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto text-center relative z-10 space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/15 text-xs text-[#DFAC6B] font-bold backdrop-blur-md shadow-sm">
            <span>📚</span>
            <span>Dokumentasi Resmi Sistem — Hamdan Azmi Ver</span>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight">
            Dokumentasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#DFAC6B] via-[#F2D19F] to-[#DFAC6B]">Manies Cakery</span> <span class="text-xs sm:text-sm px-3 py-1 bg-amber-500/20 text-[#DFAC6B] border border-amber-500/30 rounded-full font-bold uppercase tracking-wider align-middle">Hamdan Azmi Ver</span>
        </h1>
        <p class="text-sm sm:text-base text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Panduan lengkap arsitektur sistem, instalasi, skema basis data, alur kerja fitur, pengujian otomatis, serta laporan proyek **Project-Based Learning (PBL)** Politeknik Negeri Batam (Edisi Modernisasi & Refactor oleh **Hamdan Azmi**).
        </p>

        <!-- Quick Jump Links -->
        <div class="flex flex-wrap justify-center gap-2 pt-4 text-xs font-semibold">
            <a href="#tim-pbl" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                👥 Tim Pengembang PBL
            </a>
            <a href="#quick-start" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                ⚡ Quick Start
            </a>
            <a href="#arsitektur" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                🏗️ Arsitektur & Tech Stack
            </a>
            <a href="#database" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                🗄️ Database & Seeder
            </a>
            <a href="#fitur" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                🌟 Fitur & Modul
            </a>
            <a href="#testing" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#18110D] text-white/90 border border-white/15 transition-all">
                🛡️ Testing & Keamanan
            </a>
        </div>
    </div>
</section>

<!-- Main Documentation Content -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

    <!-- 1. Tim Pengembang & Identitas PBL Polibatam -->
    <section id="tim-pbl" class="space-y-6 scroll-mt-28">
        <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
            <div class="p-2.5 rounded-2xl bg-amber-100 text-amber-900 font-bold text-lg">🎓</div>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Informasi Tim & PBL Politeknik Negeri Batam</h2>
                <p class="text-xs sm:text-sm text-gray-500">Program Studi D3 Teknik Informatika — Jurusan Teknik Informatika (IF 2A Malam)</p>
            </div>
        </div>

        <!-- Academic Info Card -->
        <div class="bg-gradient-to-br from-[#1F1712] to-[#2B1F17] rounded-3xl p-6 sm:p-8 text-white shadow-xl border border-white/10 relative overflow-hidden">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-6 justify-between relative z-10">
                <div class="flex items-center gap-5 text-left">
                    <img src="{{ asset('logo-polibatam.png') }}" alt="Logo Polibatam" class="w-18 h-18 sm:w-20 sm:h-20 object-contain shrink-0 bg-white/10 p-2 rounded-2xl border border-white/20" onerror="this.src='{{ asset('assets/maniescakery2.png') }}'">
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-3 py-0.5 rounded-full bg-[#DFAC6B]/20 text-[#DFAC6B] border border-[#DFAC6B]/30 text-[10px] font-bold uppercase tracking-wider">
                                PBL IF 2A Malam 2024/2025
                            </span>
                            <span class="px-3 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[10px] font-bold uppercase tracking-wider">
                                ✨ Refactored by Hamdan Azmi
                            </span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-extrabold text-white mt-1.5">Kelompok 3 — Manies Cakery PBL 2</h3>
                        <p class="text-xs sm:text-sm text-gray-300 mt-1">Platform CMS & E-Commerce Bakery Modern UMKM Kota Batam</p>
                    </div>
                </div>

                <!-- External Links Action Badges (GitHub Repositories) -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <a href="https://github.com/deaasnuari/maniescakeryPBL2.git" target="_blank" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-all flex items-center gap-1.5 shadow-md">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        <span>Original Team Repo</span>
                    </a>
                    <a href="https://github.com/NdanZmie/ManiesCakery_PBL2" target="_blank" class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs transition-all flex items-center gap-1.5 shadow-md">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        <span>Hamdan Azmi Ver Repo</span>
                    </a>
                </div>
            </div>

            <!-- Members Table -->
            <div class="mt-8 overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm border-t border-white/10">
                    <thead class="text-[11px] font-bold text-[#DFAC6B] uppercase tracking-wider">
                        <tr>
                            <th class="py-3 px-4">NIM</th>
                            <th class="py-3 px-4">Nama Lengkap</th>
                            <th class="py-3 px-4">Peran / Kontribusi</th>
                            <th class="py-3 px-4 text-center">Posisi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10 text-gray-200">
                        <tr class="bg-amber-500/10 hover:bg-amber-500/15 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-[#DFAC6B]">3312411004</td>
                            <td class="py-3.5 px-4 font-bold text-white flex items-center gap-2">
                                <span>Hamdan Azmi</span>
                                <span class="px-2 py-0.5 rounded text-[9px] font-extrabold bg-[#DFAC6B] text-[#18110D]">MODERNIZED ED.</span>
                            </td>
                            <td class="py-3.5 px-4 text-amber-200 font-medium">Frontend & Backend Development (Refactored & Modernized)</td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-[#DFAC6B]/20 text-[#DFAC6B] border border-[#DFAC6B]/40">
                                    Anggota Tim
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-gray-300">3312411001</td>
                            <td class="py-3.5 px-4 font-bold text-white">Dea Asnuari</td>
                            <td class="py-3.5 px-4">Frontend & Backend Development</td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-white/10 text-gray-300">
                                    Ketua Tim
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-gray-300">3312411008</td>
                            <td class="py-3.5 px-4 font-bold text-white">Christian Marcelino</td>
                            <td class="py-3.5 px-4">Frontend & Backend Development</td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-white/10 text-gray-300">
                                    Anggota Tim
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-gray-300">3312411031</td>
                            <td class="py-3.5 px-4 font-bold text-white">Fatra Syahreza</td>
                            <td class="py-3.5 px-4">Frontend & Backend Development</td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-white/10 text-gray-300">
                                    Anggota Tim
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 2. Quick Start & Clone Guide -->
    <section id="quick-start" class="space-y-6 scroll-mt-28">
        <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
            <div class="p-2.5 rounded-2xl bg-amber-100 text-amber-900 font-bold text-lg">⚡</div>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Panduan Cepat Menjalankan Sistem</h2>
                <p class="text-xs sm:text-sm text-gray-500">Langkah mudah meng-clone, menginstal dependensi, dan menjalankan server lokal.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Step 1 & 2 -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-xs space-y-3">
                <div class="flex items-center gap-2.5 font-bold text-gray-900 text-sm">
                    <span class="w-6 h-6 rounded-full bg-[#18110D] text-[#DFAC6B] text-xs flex items-center justify-center font-bold">1</span>
                    <span>Clone & Instal Dependensi</span>
                </div>
                <div class="bg-[#18110D] rounded-xl p-3.5 font-mono text-xs text-amber-300 overflow-x-auto space-y-1">
                    <div>git clone https://github.com/NdanZmie/ManiesCakery_PBL2.git</div>
                    <div>cd maniescakeryPBL2</div>
                    <div>composer install</div>
                    <div>npm install</div>
                </div>
            </div>

            <!-- Step 3 & 4 -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-xs space-y-3">
                <div class="flex items-center gap-2.5 font-bold text-gray-900 text-sm">
                    <span class="w-6 h-6 rounded-full bg-[#18110D] text-[#DFAC6B] text-xs flex items-center justify-center font-bold">2</span>
                    <span>Setup Environment & Migrasi Seeder</span>
                </div>
                <div class="bg-[#18110D] rounded-xl p-3.5 font-mono text-xs text-amber-300 overflow-x-auto space-y-1">
                    <div>cp .env.example .env</div>
                    <div>php artisan key:generate</div>
                    <div class="text-emerald-400">php artisan migrate --seed</div>
                </div>
                <p class="text-[11px] text-gray-500">*Seeder otomatis menyalin seluruh aset gambar dummy dan membuat akun default.</p>
            </div>
        </div>

        <!-- Default Credentials Callout -->
        <div class="p-5 rounded-2xl bg-amber-50 border border-amber-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <h4 class="text-xs font-bold text-amber-950 uppercase tracking-wider">🔑 Akun Default untuk Login Pengujian:</h4>
                <div class="text-xs text-amber-900 space-y-0.5">
                    <div>• <strong>Admin</strong>: Username <code class="bg-amber-100 px-1.5 py-0.5 rounded font-bold">admin</code> | Password <code class="bg-amber-100 px-1.5 py-0.5 rounded font-bold">password123</code> (Akses <code>/dashboard</code>)</div>
                    <div>• <strong>Customer</strong>: Username <code class="bg-amber-100 px-1.5 py-0.5 rounded font-bold">customer</code> | Password <code class="bg-amber-100 px-1.5 py-0.5 rounded font-bold">password123</code></div>
                </div>
            </div>
            <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs transition-all shadow-sm shrink-0">
                Buka Halaman Login &rarr;
            </a>
        </div>
    </section>

    <!-- 3. Arsitektur & Tech Stack -->
    <section id="arsitektur" class="space-y-6 scroll-mt-28">
        <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
            <div class="p-2.5 rounded-2xl bg-amber-100 text-amber-900 font-bold text-lg">🏗️</div>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Arsitektur & Tech Stack</h2>
                <p class="text-xs sm:text-sm text-gray-500">Tumpukan teknologi modern dan pola arsitektur MVC Laravel.</p>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3.5 text-center">
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">🔴</span>
                <p class="font-bold text-xs text-gray-900 mt-2">Laravel 11</p>
                <p class="text-[10px] text-gray-400">Backend Core</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">🐘</span>
                <p class="font-bold text-xs text-gray-900 mt-2">PHP 8.3</p>
                <p class="text-[10px] text-gray-400">Language</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">⚡</span>
                <p class="font-bold text-xs text-gray-900 mt-2">Livewire 3</p>
                <p class="text-[10px] text-gray-400">Reactive UI</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">🎨</span>
                <p class="font-bold text-xs text-gray-900 mt-2">Tailwind CSS</p>
                <p class="text-[10px] text-gray-400">Styling & Grid</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">⚡</span>
                <p class="font-bold text-xs text-gray-900 mt-2">Vite 6</p>
                <p class="text-[10px] text-gray-400">Asset Bundler</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-xs">
                <span class="text-2xl">🐬</span>
                <p class="font-bold text-xs text-gray-900 mt-2">MySQL / MariaDB</p>
                <p class="text-[10px] text-gray-400">Database</p>
            </div>
        </div>
    </section>

    <!-- 4. Skema Database & Mekanisme Seeder -->
    <section id="database" class="space-y-6 scroll-mt-28">
        <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
            <div class="p-2.5 rounded-2xl bg-amber-100 text-amber-900 font-bold text-lg">🗄️</div>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Skema Basis Data & Sinkronisasi Aset</h2>
                <p class="text-xs sm:text-sm text-gray-500">Struktur entitas database dan otomatisasi penyalinan aset dummy.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-xs">
            <div class="bg-white rounded-2xl p-5 border border-gray-200 space-y-2.5">
                <h4 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span>🍰</span> <span>Tabel <code>produk</code></span>
                </h4>
                <p class="text-gray-500">Menyimpan 50 katalog produk kue lengkap dengan harga, path foto, kategori, dan flag <code>favourit</code> (maksimal 5 item tampil di beranda).</p>
                <div class="bg-gray-50 p-3 rounded-xl font-mono text-[11px] text-gray-700">
                    id | nama | deskripsi | harga | kategori | gambar | status | favourit | link_instagram
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-gray-200 space-y-2.5">
                <h4 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span>👥</span> <span>Tabel <code>user</code></span>
                </h4>
                <p class="text-gray-500">Menyimpan data pengguna terdaftar dan administrator dengan hashing password aman (Bcrypt) dan role access control.</p>
                <div class="bg-gray-50 p-3 rounded-xl font-mono text-[11px] text-gray-700">
                    id | name | username | email | telepon | password | role | gambar | last_login_at
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Testing & Keamanan -->
    <section id="testing" class="space-y-6 scroll-mt-28">
        <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
            <div class="p-2.5 rounded-2xl bg-amber-100 text-amber-900 font-bold text-lg">🛡️</div>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Hasil Pengujian Otomatis & Keamanan</h2>
                <p class="text-xs sm:text-sm text-gray-500">16 kasus uji automated test PHPUnit lulus 100% (41 Assertions).</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-xs space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-900 uppercase tracking-wider">Status Test Suite:</span>
                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">✓ 16 PASSED (100%)</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-gray-600">
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> Guest protection on admin routes
                </div>
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> Regular user 403 authorization
                </div>
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> Admin dashboard 200 OK access
                </div>
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> User registration with bcrypt
                </div>
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> Guest temporary login & auto-delete
                </div>
                <div class="p-2.5 bg-gray-50 rounded-xl flex items-center gap-2">
                    <span class="text-emerald-600 font-bold">✓</span> Livewire favorite toggle & max-5 validation
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

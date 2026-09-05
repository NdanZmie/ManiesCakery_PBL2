@extends('layouts.dashboard')
@section('title', 'Ringkasan Dashboard - Manies Cakery')
@section('content')

<div class="space-y-6">
    <!-- Hero Welcome Banner -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#1F1712] via-[#2A1F18] to-[#18110D] text-white p-6 sm:p-8 shadow-xl border border-white/10">
        <!-- Subtle Glow Elements -->
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-[#DFAC6B]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-16 -bottom-16 w-64 h-64 bg-[#B88746]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-xs text-[#DFAC6B] font-semibold backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Sistem Aktif & Siap Operasional</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Selamat Datang, <span class="text-[#DFAC6B]">{{ Auth::user()->username }}</span>!
                </h1>
                <p class="text-xs sm:text-sm text-gray-300 max-w-2xl leading-relaxed">
                    Kelola produk kue, menu favorit beranda, dan pantau pengguna terdaftar di toko <strong>Manies Cakery</strong> dengan mudah.
                </p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap items-center gap-3">
                <a 
                    href="{{ route('dashboard.product.index') }}" 
                    class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C29456] text-[#18110D] font-bold text-xs hover:brightness-110 transition-all shadow-md flex items-center gap-2"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Kelola Produk</span>
                </a>
                <a 
                    href="{{ route('usersdashboard') }}" 
                    class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs border border-white/15 transition-all flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-[#DFAC6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Pengguna</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 4 Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <!-- Stat 1: Total Produk -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-md transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Produk</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-gray-900">{{ $jumlahProduk }}</span>
                <span class="text-xs text-gray-500 font-medium">item menu</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs">
                <a href="{{ route('dashboard.product.index') }}" class="text-amber-700 font-semibold hover:underline flex items-center gap-1">
                    <span>Lihat katalog</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Stat 2: Menu Favorit Beranda -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-md transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Favorit Beranda</span>
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-amber-600">{{ $jumlahFavorit ?? 0 }}</span>
                <span class="text-xs text-gray-500 font-medium">/ 5 terpilih</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs">
                <a href="{{ route('dashboard.product.index', ['filter' => 'favorite']) }}" class="text-amber-700 font-semibold hover:underline flex items-center gap-1">
                    <span>Atur menu beranda</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Stat 3: Total Pengguna -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-md transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Pengguna</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-gray-900">{{ $jumlahPengguna }}</span>
                <span class="text-xs text-gray-500 font-medium">terdaftar</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs">
                <a href="{{ route('usersdashboard') }}" class="text-blue-600 font-semibold hover:underline flex items-center gap-1">
                    <span>Kelola akun</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Stat 4: Total Kategori -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-md transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kategori Menu</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-gray-900">{{ $jumlahKategori ?? 0 }}</span>
                <span class="text-xs text-gray-500 font-medium">kategori aktif</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs">
                <a href="{{ route('dashboard.product.index') }}" class="text-purple-600 font-semibold hover:underline flex items-center gap-1">
                    <span>Kelola kategori</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Data Tables Grid (2 Columns: Products & Users) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Table 1: Produk Terbaru -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-gray-200/80 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Produk Terbaru</h2>
                        <p class="text-xs text-gray-500">5 produk yang terakhir ditambahkan.</p>
                    </div>
                    <a href="{{ route('dashboard.product.index') }}" class="text-xs font-bold text-amber-700 hover:text-amber-800 transition-colors">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="divide-y divide-gray-100 mt-2">
                    @forelse ($latestProducts as $product)
                        <div class="py-3.5 flex items-center justify-between gap-3 hover:bg-gray-50/80 rounded-xl px-2 transition-colors">
                            <div class="flex items-center gap-3 min-w-0">
                                @if($product->gambar)
                                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-10 h-10 object-cover rounded-xl border border-gray-200 shadow-xs shrink-0" onerror="this.src='{{ asset('assets/banner.png') }}'">
                                @else
                                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs shrink-0">
                                        🍰
                                    </div>
                                @endif
                                <div class="min-w-0">
                                    <div class="font-bold text-xs sm:text-sm text-gray-900 truncate">{{ $product->nama }}</div>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-gray-100 text-gray-600">
                                            {{ $product->kategori }}
                                        </span>
                                        <span class="text-[11px] font-bold text-amber-800">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('dashboard.product.edit', $product) }}" class="shrink-0 p-2 text-gray-400 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition-colors" title="Edit Produk">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                        </div>
                    @empty
                        <div class="py-8 text-center text-xs text-gray-400">
                            Belum ada produk yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-gray-100">
                <a href="{{ route('dashboard.product.index') }}" class="w-full block text-center py-2.5 rounded-xl bg-gray-50 hover:bg-gray-100 text-xs font-bold text-gray-700 transition-colors">
                    + Kelola & Tambah Produk
                </a>
            </div>
        </div>

        <!-- Table 2: User Terbaru -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-gray-200/80 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Pengguna Terbaru</h2>
                        <p class="text-xs text-gray-500">5 user yang baru mendaftar di sistem.</p>
                    </div>
                    <a href="{{ route('usersdashboard') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="divide-y divide-gray-100 mt-2">
                    @forelse ($latestUsers as $user)
                        <div class="py-3.5 flex items-center justify-between gap-3 hover:bg-gray-50/80 rounded-xl px-2 transition-colors">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 text-gray-700 font-extrabold text-xs flex items-center justify-center shrink-0 border border-gray-200">
                                    {{ substr($user->username, 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-xs sm:text-sm text-gray-900 truncate">{{ $user->username }}</div>
                                    <div class="text-[11px] text-gray-400 truncate">{{ $user->email }}</div>
                                </div>
                            </div>

                            <div class="text-right shrink-0">
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider {{ ($user->role ?? '') === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-blue-50 text-blue-700' }}">
                                    {{ $user->role ?? 'User' }}
                                </span>
                                <div class="text-[10px] text-gray-400 mt-0.5">
                                    {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-8 text-center text-xs text-gray-400">
                            Belum ada user terdaftar.
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-gray-100">
                <a href="{{ route('usersdashboard') }}" class="w-full block text-center py-2.5 rounded-xl bg-gray-50 hover:bg-gray-100 text-xs font-bold text-gray-700 transition-colors">
                    Kelola Seluruh Pengguna
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
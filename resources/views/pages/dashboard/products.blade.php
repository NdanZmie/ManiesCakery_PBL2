@extends('layouts.dashboard')
@section('title', 'Kelola Produk & Menu - Manies Cakery')
@section('content')

<div class="space-y-6">
    <!-- Header Page & Controls -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kelola Produk & Menu</h1>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Kelola katalog produk, kategori, dan tentukan menu favorit yang tampil di halaman utama.</p>
        </div>
        
        <!-- Filter Tabs -->
        <div class="flex items-center gap-2.5">
            <a 
                href="{{ route('dashboard.product.index') }}" 
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($filter) ? 'bg-[#241C16] text-[#DFAC6B] shadow-sm' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}"
            >
                Semua Produk ({{ $totalCount ?? count($products) }})
            </a>
            <a 
                href="{{ route('dashboard.product.index', ['filter' => 'favorite']) }}" 
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 {{ ($filter ?? '') === 'favorite' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/20' : 'bg-amber-50 text-amber-900 border border-amber-200/80 hover:bg-amber-100' }}"
            >
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span>Favorit Beranda ({{ $favoriteCount ?? 0 }}/5)</span>
            </a>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
        <div class="p-4 text-emerald-900 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-3">
                <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-xs sm:text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 text-rose-900 bg-rose-50 border border-rose-200 rounded-2xl shadow-xs">
            <div class="flex items-center gap-2 text-xs sm:text-sm font-bold mb-1 text-rose-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Mohon periksa kembali input Anda:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-0.5 text-rose-700 ml-6">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Actions & Search Toolbar -->
    <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 bg-white p-3.5 rounded-2xl border border-gray-200/80 shadow-xs">
        <!-- Search Form -->
        <form action="{{ route('dashboard.product.search') }}" method="GET" class="w-full sm:max-w-md">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input 
                    type="search" 
                    name="keyword" 
                    id="search" 
                    value="{{ request('keyword') }}" 
                    class="block w-full py-2.5 pl-10 pr-20 text-xs sm:text-sm text-gray-900 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all" 
                    placeholder="Cari nama produk atau kategori..." 
                />
                <button 
                    type="submit" 
                    class="cursor-pointer absolute right-1.5 bottom-1.5 px-3 py-1.5 text-xs font-bold text-white bg-amber-600 rounded-lg hover:bg-amber-700 transition-colors"
                >
                    Cari
                </button>
            </div>
        </form>

        <!-- Action Buttons -->
        <div class="flex items-center gap-2 sm:gap-2.5">
            <button 
                data-modal-target="newCategoryModal" 
                data-modal-toggle="newCategoryModal" 
                type="button" 
                class="cursor-pointer text-gray-700 bg-gray-50 hover:bg-gray-100 border border-gray-200 font-bold rounded-xl text-xs px-3.5 py-2.5 transition-all flex items-center gap-1.5 whitespace-nowrap"
            >
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span>Kelola Kategori</span>
            </button>
            <button 
                data-modal-target="modalTambah" 
                data-modal-toggle="modalTambah" 
                type="button" 
                class="cursor-pointer text-[#18110D] bg-gradient-to-r from-[#DFAC6B] to-[#C29456] hover:brightness-110 font-bold rounded-xl text-xs px-4 py-2.5 shadow-md shadow-amber-500/20 transition-all flex items-center gap-1.5 whitespace-nowrap"
            >
                <svg class="w-4 h-4 text-[#18110D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>+ Tambah Produk</span>
            </button>
        </div>
    </div>

    <!-- TABEL PRODUK -->
    <div class="bg-white shadow-xs rounded-2xl border border-gray-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100 text-left text-xs sm:text-sm">
                <thead class="bg-gray-50/80 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3.5 text-center w-16">Foto</th>
                        <th class="px-6 py-3.5">Informasi Produk</th>
                        <th class="px-6 py-3.5">Kategori</th>
                        <th class="px-6 py-3.5">Harga</th>
                        <th class="px-6 py-3.5 text-center">Status Favorit Beranda</th>
                        <th class="px-6 py-3.5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-amber-50/30 transition-colors">
                        <!-- Foto Thumbnail -->
                        <td class="px-4 py-3.5 text-center whitespace-nowrap">
                            @if($product->gambar)
                                <img 
                                    src="{{ asset('storage/' . $product->gambar) }}" 
                                    alt="{{ $product->nama }}" 
                                    class="w-12 h-12 object-cover rounded-xl shadow-xs border border-gray-200 mx-auto" 
                                    onerror="this.src='{{ asset('assets/banner.png') }}'"
                                >
                            @else
                                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-700 font-bold text-base mx-auto border border-amber-100">
                                    🍰
                                </div>
                            @endif
                        </td>
                        
                        <!-- Nama & Deskripsi -->
                        <td class="px-6 py-3.5 max-w-xs">
                            <div class="font-bold text-gray-900 text-sm">{{ $product->nama }}</div>
                            <p class="text-gray-500 text-xs line-clamp-1 mt-0.5">{{ $product->deskripsi }}</p>
                            @if ($product->link_instagram)
                                <a 
                                    href="{{ $product->link_instagram }}" 
                                    target="_blank" 
                                    class="text-[11px] text-amber-700 hover:text-amber-800 font-medium inline-flex items-center gap-1 mt-1 hover:underline"
                                >
                                    <svg class="w-3.5 h-3.5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    <span>Postingan Instagram</span>
                                </a>
                            @endif
                        </td>

                        <!-- Kategori -->
                        <td class="px-6 py-3.5 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">
                                {{ $product->kategori }}
                            </span>
                        </td>

                        <!-- Harga -->
                        <td class="px-6 py-3.5 whitespace-nowrap font-bold text-gray-900">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>

                        <!-- Status Favorit Toggle (Livewire Component) -->
                        <td class="px-6 py-3.5 whitespace-nowrap text-center">
                            @livewire('favourite-toggle', ['productId' => $product->id, 'isFavourite' => $product->favourit], key($product->id))
                        </td>

                        <!-- Tombol Aksi -->
                        <td class="px-6 py-3.5 whitespace-nowrap text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a 
                                    href="{{ route('dashboard.product.edit', $product) }}" 
                                    class="cursor-pointer p-2 text-amber-700 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors" 
                                    title="Edit Produk"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('dashboard.product.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="cursor-pointer p-2 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-lg transition-colors" 
                                        title="Hapus Produk"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center space-y-2">
                                <span class="text-3xl">🍰</span>
                                <p class="text-sm font-semibold text-gray-600">Tidak ada produk yang ditemukan.</p>
                                <p class="text-xs text-gray-400">Silakan tambahkan produk baru atau ubah kata kunci pencarian.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Produk -->
<div id="modalTambah" tabindex="-1" aria-hidden="true"
    class="{{ $editStatus ? '' : 'hidden' }} fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="relative w-full max-w-3xl">
        <!-- Modal Card -->
        <div class="bg-white rounded-3xl shadow-2xl max-h-[90vh] flex flex-col overflow-hidden border border-gray-100">
            
            <!-- Header Modal -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100 bg-gray-50/80">
                <div>
                    <h3 class="text-base font-extrabold text-gray-900">
                        {{ $editStatus ? 'Edit Detail Produk' : 'Tambah Produk Baru' }}
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Lengkapi informasi produk katalog Manies Cakery.</p>
                </div>
                <a href="{{ route('dashboard.product.index') }}" class="text-gray-400 hover:text-gray-700 p-2 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </div>

            <!-- Konten Form Modal -->
            <div class="overflow-y-auto px-6 py-5">
                <form class="space-y-4" action="{{ $editStatus ? route('dashboard.product.update', $product) : route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($editStatus)
                        @method('PUT')
                    @endif

                    <div class="grid md:grid-cols-2 gap-5">
                        <!-- Left Column -->
                        <div class="space-y-3.5">
                            <!-- Nama Produk -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Produk</label>
                                <input 
                                    type="text" 
                                    name="nama"
                                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-gray-50 focus:bg-white"
                                    placeholder="Contoh: Triple Chocolate Fudge Cake"
                                    value="{{ old('nama', $editStatus ? $product->nama : '') }}" 
                                    required
                                >
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Deskripsi Produk</label>
                                <textarea 
                                    name="deskripsi"
                                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-gray-50 focus:bg-white"
                                    rows="3" 
                                    placeholder="Deskripsi cita rasa, bahan berkualitas, dan ukuran..." 
                                    required
                                >{{ old('deskripsi', $editStatus ? $product->deskripsi : '') }}</textarea>
                            </div>

                            <!-- Kategori & Harga -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kategori</label>
                                    <select 
                                        name="kategori"
                                        class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-gray-50 focus:bg-white"
                                        required
                                    >
                                        <option value="">-- Pilih --</option>
                                        @foreach($categories as $kategori)
                                            @php
                                                $selectedKategori = old('kategori', $editStatus ? $product->kategori : '');
                                            @endphp
                                            <option value="{{ $kategori->nama }}" {{ $selectedKategori === $kategori->nama ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Harga (Rp)</label>
                                    <input 
                                        type="number" 
                                        name="harga"
                                        class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-gray-50 focus:bg-white"
                                        placeholder="75000"
                                        value="{{ old('harga', $editStatus ? $product->harga : '') }}" 
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Link Instagram -->
                            <div>
                                <label for="link_instagram" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Link Instagram Post / Reel</label>
                                <input 
                                    type="text" 
                                    name="link_instagram" 
                                    id="link_instagram"
                                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-gray-50 focus:bg-white"
                                    placeholder="https://www.instagram.com/p/xxxx"
                                    value="{{ old('link_instagram', $product->link_instagram ?? '') }}"
                                >
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-3.5 flex flex-col justify-between">
                            <!-- Toggle Menu Favorit (Tampil di Beranda) -->
                            <div class="p-4 bg-amber-50/70 rounded-2xl border border-amber-200/80 flex items-center justify-between">
                                <div>
                                    <label for="favourit_toggle" class="text-xs font-bold text-amber-950 flex items-center gap-1.5 cursor-pointer">
                                        <svg class="w-4 h-4 text-amber-600 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span>Jadikan Menu Favorit Beranda</span>
                                    </label>
                                    <p class="text-[11px] text-amber-700 mt-0.5">Tampil di display Menu Favourite utama.</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer ml-3 shrink-0">
                                    <input 
                                        type="checkbox" 
                                        name="favourit" 
                                        id="favourit_toggle" 
                                        value="1" 
                                        {{ old('favourit', $editStatus ? $product->favourit : 0) ? 'checked' : '' }} 
                                        class="sr-only peer"
                                    >
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-600"></div>
                                </label>
                            </div>

                            <!-- Upload Gambar -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    {{ $editStatus ? 'Ganti Foto Produk (Opsional)' : 'Upload Foto Produk' }}
                                </label>
                                <input 
                                    type="file" 
                                    name="gambar" 
                                    {{ $editStatus ? '' : 'required' }}
                                    class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 cursor-pointer border border-gray-200 rounded-xl p-1.5 bg-gray-50"
                                >
                            </div>

                            <!-- Image Preview if Editing -->
                            @if($editStatus && $product->gambar)
                                <div class="flex items-center gap-3 bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-3">
                                    <img 
                                        src="{{ asset('storage/' . $product->gambar) }}" 
                                        class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow-xs" 
                                        onerror="this.src='{{ asset('assets/banner.png') }}'"
                                    >
                                    <div>
                                        <p class="text-xs font-bold text-gray-800">Foto Saat Ini</p>
                                        <p class="text-[11px] text-gray-400">Biarkan kosong jika tidak ingin mengubah foto.</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Submit Buttons -->
                            <div class="flex justify-end gap-2.5 pt-3">
                                <a 
                                    href="{{ route('dashboard.product.index') }}"
                                    class="px-4 py-2 bg-gray-100 text-gray-700 font-bold text-xs rounded-xl hover:bg-gray-200 transition-colors"
                                >
                                    Batal
                                </a>
                                <button 
                                    type="submit"
                                    class="px-5 py-2 bg-gradient-to-r from-[#DFAC6B] to-[#C29456] text-[#18110D] font-bold text-xs rounded-xl hover:brightness-110 shadow-md shadow-amber-500/20 transition-all flex items-center gap-1.5 cursor-pointer"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>{{ $editStatus ? 'Simpan Perubahan' : 'Tambah Produk' }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div id="newCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/60 backdrop-blur-sm p-4">
    <div class="relative w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
            <!-- Modal header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100 bg-gray-50/80">
                <div>
                    <h3 class="text-base font-extrabold text-gray-900">
                        Kelola Kategori Produk
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Tambah atau hapus kategori menu kue.</p>
                </div>
                <button type="button" class="text-gray-400 hover:text-gray-700 p-2 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer" data-modal-hide="newCategoryModal">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6">
                {{-- Tambah Kategori Form --}}
                <form action="{{ route('dashboard.kategori.tambah') }}" method="POST" class="mb-5">
                    @csrf
                    <label for="new-category" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nama Kategori Baru:</label>
                    <div class="flex items-center gap-2.5">
                        <input 
                            type="text" 
                            id="new-category" 
                            name="new-category" 
                            required 
                            placeholder="Contoh: Danish & Croissant"
                            class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none bg-gray-50 focus:bg-white transition-all"
                        >
                        <button type="submit" class="bg-gradient-to-r from-[#DFAC6B] to-[#C29456] text-[#18110D] font-bold text-xs px-4 py-2.5 rounded-xl hover:brightness-110 transition-all whitespace-nowrap shadow-sm cursor-pointer">
                            + Tambah
                        </button>
                    </div>
                </form>

                <hr class="my-4 border-gray-100">

                {{-- List Kategori --}}
                <div>
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Daftar Kategori Tersedia:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-56 overflow-y-auto pr-1">
                        @foreach ($categories as $categori)    
                            <div class="flex justify-between items-center px-3.5 py-2.5 bg-gray-50 border border-gray-200/80 rounded-xl text-xs font-medium">
                                <span class="text-gray-800 font-bold">{{ $categori->nama }}</span>
                                <form action="{{ route('dashboard.kategori.hapus', $categori->nama) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-700 text-xs font-semibold hover:underline cursor-pointer">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
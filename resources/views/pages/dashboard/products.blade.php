@extends('layouts.dashboard')
@section('title', 'Product Dashboard - Manies Cakery')
@section('content')

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 mt-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Produk & Menu Favorit</h1>
        <p class="text-sm text-gray-500 mt-0.5">Kelola seluruh katalog produk dan tentukan menu favorit yang tampil di halaman beranda.</p>
    </div>
    
    <!-- Quick Stats Pill -->
    <div class="flex items-center gap-3">
        <a 
            href="{{ route('dashboard.product.index') }}" 
            class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($filter) ? 'bg-[#332B25] text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
        >
            Semua Produk ({{ $totalCount ?? count($products) }})
        </a>
        <a 
            href="{{ route('dashboard.product.index', ['filter' => 'favorite']) }}" 
            class="px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 {{ ($filter ?? '') === 'favorite' ? 'bg-amber-600 text-white shadow-md shadow-amber-600/30' : 'bg-amber-50 text-amber-900 border border-amber-200 hover:bg-amber-100' }}"
        >
            <span>⭐</span>
            <span>Menu Favorit Beranda ({{ $favoriteCount ?? 0 }})</span>
        </a>
    </div>
</div>

<!-- ALERT -->
@if(session('success'))
    <div class="mb-4 p-4 text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-3 shadow-sm">
        <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✓</span>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 text-rose-800 bg-rose-50 border border-rose-200 rounded-xl shadow-sm">
        <ul class="list-disc list-inside text-sm space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Tombol dan Search -->
<div class="mb-6 flex flex-col md:flex-row justify-between items-stretch md:items-center gap-4">
    <form action="{{ route('dashboard.product.search') }}" method="GET" class="w-full max-w-md">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="keyword" id="search" value="{{ request('keyword') }}" class="block w-full py-2.5 pl-10 pr-24 text-sm text-gray-900 border border-gray-300 rounded-xl bg-white focus:ring-amber-500 focus:border-amber-500 shadow-sm" placeholder="Cari produk atau kategori..." />
            <button type="submit" class="cursor-pointer absolute right-1.5 bottom-1.5 px-3.5 py-1 text-xs font-bold text-white bg-amber-600 rounded-lg hover:bg-amber-700 transition-colors">
                Cari
            </button>
        </div>
    </form>
    <div class="flex gap-2 sm:gap-3">
        <button data-modal-target="newCategoryModal" data-modal-toggle="newCategoryModal" type="button" class="cursor-pointer text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 font-bold rounded-xl text-xs sm:text-sm px-4 py-2.5 shadow-sm transition-all">
            + Tambah Kategori
        </button>
        <button data-modal-target="modalTambah" data-modal-toggle="modalTambah" type="button" class="cursor-pointer text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 font-bold rounded-xl text-xs sm:text-sm px-4 py-2.5 shadow-md shadow-amber-600/20 transition-all flex items-center gap-1.5">
            <span>✨</span>
            <span>+ Tambah Produk</span>
        </button>
    </div>
</div>

<!-- Modal Tambah/Edit Produk -->
<div id="modalTambah" tabindex="-1" aria-hidden="true"
    class="{{ $editStatus ? '' : 'hidden' }} fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="relative w-full max-w-4xl">
        <!-- Modal Card -->
        <div class="bg-white rounded-2xl shadow-2xl max-h-[90vh] flex flex-col overflow-hidden border border-amber-100">
            
            <!-- Header Modal -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-[#FAF7F2]">
                <div>
                    <h3 class="text-lg font-bold text-[#332B25]">
                        {{ $editStatus ? 'Edit Detail Produk' : 'Tambah Produk Baru' }}
                    </h3>
                    <p class="text-xs text-gray-500">Lengkapi informasi produk di bawah ini.</p>
                </div>
                <a href="{{ route('dashboard.product.index') }}" class="text-gray-400 hover:text-gray-700 p-1.5 rounded-lg hover:bg-gray-100">
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

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <!-- Nama Produk -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Produk</label>
                                <input type="text" name="nama"
                                    class="w-full border border-gray-300 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Contoh: Triple Chocolate Fudge Cake"
                                    value="{{ old('nama', $editStatus ? $product->nama : '') }}" required>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Deskripsi Produk</label>
                                <textarea name="deskripsi"
                                    class="w-full border border-gray-300 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    rows="3" placeholder="Deskripsi rasa, bahan, dan keunggulan produk..." required>{{ old('deskripsi', $editStatus ? $product->deskripsi : '') }}</textarea>
                            </div>

                            <!-- Kategori & Harga -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kategori</label>
                                    <select name="kategori"
                                        class="w-full border border-gray-300 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                        required>
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
                                    <input type="number" name="harga"
                                        class="w-full border border-gray-300 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                        placeholder="75000"
                                        value="{{ old('harga', $editStatus ? $product->harga : '') }}" required>
                                </div>
                            </div>

                            <!-- Link Instagram -->
                            <div>
                                <label for="link_instagram" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Link Instagram Post / Reel</label>
                                <input type="text" name="link_instagram" id="link_instagram"
                                    class="w-full border border-gray-300 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="https://www.instagram.com/p/xxxx"
                                    value="{{ old('link_instagram', $product->link_instagram ?? '') }}">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4 flex flex-col justify-between">
                            <!-- Toggle Menu Favorit (Tampil di Beranda) -->
                            <div class="p-4 bg-amber-50/80 rounded-2xl border border-amber-200 flex items-center justify-between shadow-sm">
                                <div>
                                    <label for="favourit_toggle" class="text-sm font-bold text-amber-950 flex items-center gap-1.5 cursor-pointer">
                                        <span class="text-amber-600 text-base">⭐</span> 
                                        <span>Jadikan Menu Favorit Beranda</span>
                                    </label>
                                    <p class="text-xs text-amber-700 mt-0.5">Produk ini akan tampil di etalase Menu Favourite pada halaman utama.</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer ml-3 flex-shrink-0">
                                    <input type="checkbox" name="favourit" id="favourit_toggle" value="1" {{ old('favourit', $editStatus ? $product->favourit : 0) ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-600"></div>
                                </label>
                            </div>

                            <!-- Upload Gambar -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                    {{ $editStatus ? 'Ganti Gambar Produk (Opsional)' : 'Upload Gambar Produk' }}
                                </label>
                                <input type="file" name="gambar" {{ $editStatus ? '' : 'required' }}
                                    class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200 cursor-pointer border border-gray-200 rounded-xl p-1.5">
                            </div>

                            <!-- Image Preview if Editing -->
                            @if($editStatus && $product->gambar)
                                <div class="flex items-center gap-4 bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-3">
                                    <img src="{{ asset('storage/' . $product->gambar) }}" class="w-20 h-20 object-cover rounded-xl border shadow-sm" onerror="this.src='{{ asset('assets/banner.png') }}'">
                                    <div>
                                        <p class="text-xs font-bold text-gray-800">Foto Saat Ini</p>
                                        <p class="text-[11px] text-gray-500">Biarkan kosong jika tidak ingin mengganti foto.</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Submit Buttons -->
                            <div class="flex justify-end gap-3 pt-2">
                                <a href="{{ route('dashboard.product.index') }}"
                                    class="px-5 py-2.5 bg-gray-100 text-gray-700 font-bold text-xs rounded-xl hover:bg-gray-200 transition-colors">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-6 py-2.5 bg-amber-600 text-white font-bold text-xs rounded-xl hover:bg-amber-700 shadow-md shadow-amber-600/30 transition-all flex items-center gap-1.5 cursor-pointer">
                                    <span>✓</span>
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
<div id="newCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/60 backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-2xl shadow-2xl border border-amber-100 overflow-hidden">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-100 bg-[#FAF7F2]">
                <h3 class="text-lg font-bold text-[#332B25]">
                    Kelola Kategori Produk
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="newCategoryModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-5">
                {{-- Tambah Kategori Form --}}
                <form action="{{ route('dashboard.kategori.tambah') }}" method="POST" class="mb-5">
                    @csrf
                    <label for="new-category" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nama Kategori Baru:</label>
                    <div class="flex items-center gap-3">
                        <input type="text" id="new-category" name="new-category" required placeholder="Contoh: Danish & Croissant"
                            class="w-full border border-gray-300 rounded-xl px-3.5 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        <button type="submit" class="bg-amber-600 text-white font-bold text-xs px-5 py-2.5 rounded-xl hover:bg-amber-700 transition-colors whitespace-nowrap shadow-sm">
                            + Tambah
                        </button>
                    </div>
                </form>

                <hr class="my-4 border-gray-200">

                {{-- List Kategori --}}
                <div>
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2.5">Daftar Kategori Tersedia:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-60 overflow-y-auto pr-1">
                        @foreach ($categories as $categori)    
                            <div class="flex justify-between items-center px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium">
                                <span class="text-gray-800 font-bold">{{ $categori->nama }}</span>
                                <form action="{{ route('dashboard.kategori.hapus', $categori->nama) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold hover:underline">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TABEL PRODUK -->
<div class="overflow-hidden bg-white shadow-md rounded-2xl border border-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-left">
            <thead class="bg-gray-50 text-xs font-bold text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3.5 w-16 text-center">Foto</th>
                    <th class="px-6 py-3.5">Nama Produk</th>
                    <th class="px-6 py-3.5">Kategori</th>
                    <th class="px-6 py-3.5">Harga</th>
                    <th class="px-6 py-3.5 text-center">Status Favorit Beranda</th>
                    <th class="px-6 py-3.5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-xs sm:text-sm">
                @forelse($products as $product)
                <tr class="hover:bg-amber-50/40 transition-colors">
                    <!-- Foto -->
                    <td class="px-4 py-3 text-center whitespace-nowrap">
                        @if($product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-12 h-12 object-cover rounded-xl shadow-sm border mx-auto" onerror="this.src='{{ asset('assets/banner.png') }}'">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-[10px] mx-auto">No Img</div>
                        @endif
                    </td>
                    
                    <!-- Nama & Deskripsi -->
                    <td class="px-6 py-3">
                        <div class="font-bold text-gray-900">{{ $product->nama }}</div>
                        <div class="text-gray-500 text-xs line-clamp-1 max-w-xs">{{ $product->deskripsi }}</div>
                        @if ($product->link_instagram)
                            <a href="{{ $product->link_instagram }}" class="text-[11px] text-amber-700 hover:underline inline-flex items-center gap-1 mt-0.5" target="_blank">
                                <span>📷 IG Post</span>
                            </a>
                        @endif
                    </td>

                    <!-- Kategori -->
                    <td class="px-6 py-3 whitespace-nowrap">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-900">
                            {{ $product->kategori }}
                        </span>
                    </td>

                    <!-- Harga -->
                    <td class="px-6 py-3 whitespace-nowrap font-bold text-gray-800">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>

                    <!-- Status Favorit Toggle (Livewire Component) -->
                    <td class="px-6 py-3 whitespace-nowrap text-center">
                        @livewire('favourite-toggle', ['productId' => $product->id, 'isFavourite' => $product->favourit], key($product->id))
                    </td>

                    <!-- Tombol Aksi -->
                    <td class="px-6 py-3 whitespace-nowrap text-center">
                        <div class="inline-flex items-center gap-2">
                            <a href="{{ route('dashboard.product.edit', $product) }}" class="cursor-pointer px-3 py-1.5 text-xs font-bold text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200 rounded-lg transition-colors flex items-center gap-1">
                                <span>✏️</span>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('dashboard.product.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer px-3 py-1.5 text-xs font-bold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 rounded-lg transition-colors flex items-center gap-1">
                                    <span>🗑️</span>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                        Tidak ada produk yang ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
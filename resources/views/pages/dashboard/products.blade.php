@extends('layouts.dashboard')
@section('title', 'Product Dashboard')
@section('content')
{{-- @php
    dd(Route::currentRouteName());
@endphp --}}

{{-- <div class="text-center font-bold text-xl">Welcome to the Product Dashboard</div> --}}
<h1 class="text-2xl font-bold mb-6 mt-4">Product Dashboard</h1>

<!-- ALERT -->
@if(session('success'))
    <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-200 rounded-lg">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Tombol dan Search -->
<div class="mb-6 flex justify-between items-center">
    <form action="{{ route('dashboard.product.search') }}" method="GET" class="w-full max-w-md">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="keyword" id="search" value="{{ request('keyword') }}" class="block w-full py-2 pl-10 pr-28 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search by product name or category..." />
            <button type="submit" class="cursor-pointer absolute right-2.5 bottom-1.5 px-4 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
                Search
            </button>
        </div>
    </form>
    <div class="flex gap-4">
        <button data-modal-target="newCategoryModal" data-modal-toggle="newCategoryModal" type="button" class="cursor-pointer text-white bg-amber-600 hover:bg-amber-700 font-medium rounded-lg text-sm px-4 py-2">+ Tambah Kategori baru</button>
        <button data-modal-target="modalTambah" data-modal-toggle="modalTambah" type="button" class="cursor-pointer text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2">+ Tambah Produk</button>
    </div>
</div>

<!-- Modal Tambah/Edit Produk -->
<div id="modalTambah" tabindex="-1" aria-hidden="true"
    class="{{ $editStatus ? '' : 'hidden' }} fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-4xl p-4">
        <!-- Modal utama dibagi dua: header tetap, isi bisa discroll -->
        <div class="bg-white rounded-lg shadow-lg max-h-[90vh] flex flex-col">
            
            <!-- Header modal, nempel di atas -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h3 class="text-xl font-bold text-gray-800">
                    {{ $editStatus ? 'Edit Produk' : 'Tambah Produk' }}
                </h3>
                <a href="{{ route('dashboard.product.index') }}" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Konten isi modal, bisa discroll kalau panjang -->
            <div class="overflow-y-auto px-6 py-4">
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Bagian form input di kiri -->
                    <form class="space-y-4" action="{{ $editStatus ? route('dashboard.product.update', $product) : route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($editStatus)
                            @method('PUT')
                        @endif

                        <!-- Nama produk, gak boleh kosong -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="nama"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                                value="{{ $editStatus ? $product->nama : '' }}" required>
                        </div>

                        <!-- Deskripsi buat penjelasan produk -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                                rows="3" required>{{ $editStatus ? $product->deskripsi : '' }}</textarea>
                        </div>

                        <!-- Pilih kategori yang udah tersedia -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                                required>
                                <option value="">-- Pilih Kategori --</option>
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

                        <!-- Masukkan harga produk -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                                value="{{ $editStatus ? $product->harga : '' }}" required>
                        </div>

                        <!-- Link IG kalau mau promosiin -->
                        <div>
                            <label for="link_instagram" class="block text-sm font-medium text-gray-700">Link Instagram</label>
                            <input type="text" name="link_instagram" id="link_instagram"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                                placeholder="https://www.instagram.com/p/xxxx"
                                value="{{ old('link_instagram', $product->link_instagram ?? '') }}">
                        </div>

                        <!-- Upload gambar, pastikan format aman -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                            <input type="file" name="gambar"
                                class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <!-- Tombol simpan & batal, wajib ada -->
                        <div class="flex justify-end gap-2 pt-4">
                            <a href="{{ route('dashboard.product.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                {{ $editStatus ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                    
                    <!-- Preview gambar di kanan, kalau ada -->
                    @if($editStatus && $product->gambar)
                        <div class="flex items-center justify-center bg-gray-50 border border-dashed border-gray-300 rounded p-4">
                            <div class="text-center">
                                <p class="text-sm text-gray-700 mb-2">Preview Gambar</p>
                                <img src="{{ asset('storage/' . $product->gambar) }}" class="w-60 h-60 object-cover rounded border">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<div id="newCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Kategori Baru
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
                <form action="{{ route('dashboard.kategori.tambah') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <label for="new-category">Input nama kategori baru:</label>
                        <input type="text" id="new-category" name="new-category"
                            class="w-full border border-gray-300 rounded px-3 py-2">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah</button>
                    </div>
                </form>

                <hr class="my-4">

                {{-- List Kategori --}}
                <div class="">
                    <ol class="list-decimal list-outside pl-5">
                        @foreach ($categories as $categori)    
                            <li class="mb-2">
                                <div class="flex justify-between items-center">
                                    <span>{{ $categori->nama }}</span>
                                    <form action="{{ route('dashboard.kategori.hapus', $categori->nama) }}" method="POST"  onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline hover:cursor-pointer">hapus</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- TABEL PRODUK -->
<div class="overflow-x-auto shadow-md rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-xs font-semibold text-gray-700 uppercase">
            <tr>
                <th class="px-4 py-3 text-left w-16">Gambar</th>
                <th class="px-6 py-3 text-left">Nama Produk</th>
                <th class="px-6 py-3 text-left">Deskripsi</th>
                <th class="px-6 py-3 text-left">Harga</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Instagram</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($products as $product)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-4 whitespace-nowrap">
                    @if($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-12 h-12 object-cover rounded shadow-sm border">
                    @else
                        <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs">No img</div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-wrap font-medium text-gray-900">{{ $product->nama }}</td>
                <td class="px-6 py-4 whitespace-wrap truncate max-w-xs text-gray-600">{{ $product->deskripsi }}</td>
                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $product->kategori }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                @if ($product->link_instagram)
                    <a href="{{ $product->link_instagram }}" class="text-blue-600 underline" target="_blank">Link</a>
                @else
                    
                @endif
            </td>
                <td class="px-6 py-4 whitespace-nowrap flex gap-2 items-center h-20">
                    <div class="flex gap-10">
                        <form action="{{ route('dashboard.product.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cursor-pointer px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded hover:bg-red-200">🗑️ Delete</button>
                        </form>
                        <a href="{{ route('dashboard.product.edit', $product) }}" class="cursor-pointer px-3 py-1 text-sm font-medium text-yellow-600 bg-yellow-100 rounded hover:bg-yellow-200">✏️ Edit</a>
                        @livewire('favourite-toggle', ['productId' => $product->id, 'isFavourite' => $product->favourit], key($product->id))
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
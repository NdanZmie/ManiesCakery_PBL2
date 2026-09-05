@extends('layouts.app')
@section('title', 'Manies Cakery - Katalog Produk')

@section('content')
<div class="py-6 min-h-screen">

    <!-- Hero Header Banner -->
    <div class="relative bg-gradient-to-r from-amber-100/80 via-[#F4EDE1] to-amber-200/50 border border-amber-200/70 rounded-3xl p-6 md:p-10 mb-8 shadow-sm overflow-hidden">
        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-amber-200/70 text-amber-900 rounded-full text-xs font-semibold uppercase tracking-wider mb-3">
                <span>✨</span> Freshly Baked Every Day
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                Katalog Produk <span class="font-norican text-4xl md:text-6xl text-accent">Manies Cakery</span>
            </h1>
            <p class="mt-3 text-gray-600 text-sm md:text-base leading-relaxed">
                Pilihan aneka cake, brownies panggang fudgy, cookies renyah, dan paket hampers eksklusif. Dibuat dengan bahan alami berkualitas tanpa pengawet.
            </p>

            <!-- Store Highlights -->
            <div class="mt-6 flex flex-wrap items-center gap-3 md:gap-6 text-xs md:text-sm font-medium text-gray-700">
                <div class="flex items-center gap-1.5 bg-white/80 backdrop-blur px-3 py-1.5 rounded-full border border-amber-100 shadow-sm">
                    <span>🍰</span> 100% Homemade & Halal
                </div>
                <div class="flex items-center gap-1.5 bg-white/80 backdrop-blur px-3 py-1.5 rounded-full border border-amber-100 shadow-sm">
                    <span>🚚</span> Siap Kirim & Pesan Antar
                </div>
                <div class="flex items-center gap-1.5 bg-white/80 backdrop-blur px-3 py-1.5 rounded-full border border-amber-100 shadow-sm">
                    <span>💬</span> Pesan Instan via WhatsApp
                </div>
            </div>
        </div>

        <!-- Decorative Background Circle -->
        <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-amber-300/20 rounded-full blur-2xl pointer-events-none"></div>
    </div>

    <!-- Toolbar: Search, Sort & Filter -->
    <div class="bg-white rounded-2xl p-4 md:p-5 shadow-sm border border-amber-100/80 mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
        
        <!-- Search Form -->
        <form action="{{ route('produk.index', $selectedCategories) }}" method="GET" class="w-full md:max-w-md relative">
            <div class="relative">
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari brownies, cake, cookies..." 
                    class="w-full pl-10 pr-24 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none transition-all"
                >
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                <button type="submit" class="absolute right-1.5 top-1.5 bottom-1.5 px-4 bg-[#493C32] hover:bg-[#382d24] text-white text-xs font-semibold rounded-lg transition duration-150">
                    Cari
                </button>
            </div>
        </form>

        <!-- Sort & Count -->
        <div class="w-full md:w-auto flex items-center justify-between md:justify-end gap-3">
            <span class="text-xs text-gray-500 hidden sm:inline">
                Menampilkan <strong class="text-gray-800">{{ $products->count() }}</strong> produk
            </span>

            <form action="{{ route('produk.index', $selectedCategories) }}" method="GET" class="flex items-center gap-2">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <label for="sort" class="text-xs font-medium text-gray-500 whitespace-nowrap">Urutkan:</label>
                <select 
                    name="sort" 
                    id="sort" 
                    onchange="this.form.submit()" 
                    class="py-2 pl-3 pr-8 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 focus:ring-2 focus:ring-amber-500 focus:outline-none cursor-pointer"
                >
                    <option value="default" {{ request('sort') === 'default' ? 'selected' : '' }}>Terbaru</option>
                    <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Paling Populer / Favorit</option>
                    <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                    <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                </select>
            </form>
        </div>
    </div>

    <!-- Category Pills Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-6 scrollbar-none">
        @php
            $categoryIcons = [
                '*' => '🍰',
                'Cake' => '🎂',
                'Brownies' => '🍫',
                'Cookies' => '🍪',
                'Hampers' => '🎁',
                'Small Cake' => '🧁',
                'Cupcake' => '🧁',
            ];
        @endphp

        <!-- All Categories Pill -->
        <a 
            href="{{ route('produk.index', ['param' => '*', 'search' => request('search'), 'sort' => request('sort')]) }}" 
            class="flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold transition-all duration-200 whitespace-nowrap shadow-sm {{ $selectedCategories === '*' ? 'bg-[#493C32] text-white ring-2 ring-[#493C32]/30 shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-amber-50 hover:border-amber-200' }}"
        >
            <span>🍰</span>
            <span>Semua Menu</span>
            <span class="ml-1 px-1.5 py-0.5 rounded-full text-[10px] {{ $selectedCategories === '*' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600' }}">
                {{ $categoryCounts['*'] ?? $products->count() }}
            </span>
        </a>

        <!-- Dynamic Category Pills -->
        @foreach ($categories as $cat)
            @php
                $icon = $categoryIcons[$cat->nama] ?? '🧁';
                $isActive = ($selectedCategories === $cat->nama);
                $count = $categoryCounts[$cat->nama] ?? 0;
            @endphp
            <a 
                href="{{ route('produk.index', ['param' => $cat->nama, 'search' => request('search'), 'sort' => request('sort')]) }}" 
                class="flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold transition-all duration-200 whitespace-nowrap shadow-sm {{ $isActive ? 'bg-[#493C32] text-white ring-2 ring-[#493C32]/30 shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-amber-50 hover:border-amber-200' }}"
            >
                <span>{{ $icon }}</span>
                <span>{{ $cat->nama }}</span>
                <span class="ml-1 px-1.5 py-0.5 rounded-full text-[10px] {{ $isActive ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600' }}">
                    {{ $count }}
                </span>
            </a>
        @endforeach
    </div>

    <!-- Admin Edit Mode Toolbar (If Admin / Superadmin) -->
    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))                          
    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 mb-6 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-lg">⚙️</span>
            <div>
                <p class="text-xs font-bold text-amber-900">Panel Manajemen Katalog (Admin)</p>
                <p class="text-[11px] text-amber-700">Aktifkan mode edit untuk mengubah status tampil/sembunyi produk di katalog.</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button
                type="button"
                onclick="enterEditMode()"
                id="editModeBtn"
                class="flex items-center gap-1.5 px-3.5 py-1.5 bg-amber-600 hover:bg-amber-700 text-white transition rounded-xl text-xs font-semibold shadow-sm cursor-pointer"
            >
                <span>✏️</span> Edit Status Katalog
            </button>

            <button
                type="button"
                onclick="exitEditMode()"
                id="cancelEditBtn"
                class="hidden flex items-center gap-1.5 px-3.5 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 transition rounded-xl text-xs font-semibold shadow-sm cursor-pointer"
            >
                <span>✖</span> Selesai
            </button>
        </div>
    </div>
    @endif

    <!-- Product Grid Section -->
    <form method="POST" action="{{ route('produk.toggle-status') }}" id="cardStatusForm">
        @csrf
        <input type="hidden" name="action" id="cardActionType">

        @if($products->isEmpty())
            <!-- Empty State -->
            <div class="bg-white rounded-3xl p-12 text-center border border-amber-100 shadow-sm max-w-lg mx-auto my-12">
                <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center text-4xl mx-auto mb-4">
                    🧁
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Produk Tidak Ditemukan</h3>
                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    @if(request('search'))
                        Tidak ada produk yang cocok dengan pencarian "<strong>{{ request('search') }}</strong>".
                    @else
                        Belum ada produk yang tersedia untuk kategori ini saat ini.
                    @endif
                </p>
                <a 
                    href="{{ route('produk.index', '*') }}" 
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#493C32] hover:bg-[#342b23] text-white text-xs font-semibold rounded-xl transition duration-200 shadow"
                >
                    <span>&larr;</span> Lihat Semua Produk
                </a>
            </div>
        @else
            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $produk)
                    @if (!Auth::check())
                        {{-- Tamu / Belum login: tampilkan produk yang aktif --}}
                        @if ($produk->status)
                            @include('components.catalogcard', ['produk' => $produk])
                        @endif
                    @elseif (in_array(Auth::user()->role, ['admin', 'superadmin']))
                        {{-- Admin: bisa lihat semua produk --}}
                        @include('components.catalogcard', ['produk' => $produk])
                    @else
                        {{-- Customer login: hanya produk aktif --}}
                        @if ($produk->status)
                            @include('components.catalogcard', ['produk' => $produk])
                        @endif
                    @endif
                @endforeach
            </div>
        @endif

        <!-- Floating Action Box for Admin Toggle -->
        <div class="edit-target hidden fixed bottom-8 right-8 bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-200 p-4 flex items-center gap-3 z-50">
            <span class="text-xs font-bold text-gray-700">Tindakan Massal:</span>
            <button 
                type="submit" 
                onclick="setCardAction('enable')" 
                class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow cursor-pointer flex items-center gap-1"
            >
                <span>✓</span> Aktifkan
            </button>

            <button 
                type="submit" 
                onclick="setCardAction('disable')" 
                class="bg-rose-600 hover:bg-rose-700 text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow cursor-pointer flex items-center gap-1"
            >
                <span>✕</span> Nonaktifkan
            </button>
        </div>
    </form>
</div>

<!-- Admin Scripts for Edit Mode -->
<script>
    let editMode = false;

    function enterEditMode() {
        editMode = true;

        document.querySelectorAll('.edit-target').forEach(el => el.classList.remove('hidden'));
        document.getElementById('editModeBtn').classList.add('hidden');
        document.getElementById('cancelEditBtn').classList.remove('hidden');

        document.querySelectorAll('.card-link').forEach(el => {
            el.classList.add('pointer-events-none', 'select-none');
        });
    }

    function exitEditMode() {
        editMode = false;

        document.querySelectorAll('.edit-target').forEach(el => el.classList.add('hidden'));
        document.getElementById('editModeBtn').classList.remove('hidden');
        document.getElementById('cancelEditBtn').classList.add('hidden');

        document.querySelectorAll('.card-checkbox').forEach(cb => cb.checked = false);
        document.querySelectorAll('.selected-overlay').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.selected-check').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.card-container').forEach(card => card.classList.remove('ring-2', 'ring-blue-500'));

        document.querySelectorAll('.card-link').forEach(el => {
            el.classList.remove('pointer-events-none', 'select-none');
        });
    }

    function handleCardClick(card) {
        if (!editMode) return;

        const checkbox = card.querySelector('.card-checkbox');
        const overlay = card.querySelector('.selected-overlay');
        const checkmark = card.querySelector('.selected-check');

        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            overlay.classList.remove('hidden');
            checkmark.classList.remove('hidden');
            card.classList.add('ring-2', 'ring-blue-500');
        } else {
            overlay.classList.add('hidden');
            checkmark.classList.add('hidden');
            card.classList.remove('ring-2', 'ring-blue-500');
        }
    }

    function setCardAction(action) {
        document.getElementById('cardActionType').value = action;
    }

    document.getElementById('cardStatusForm').addEventListener('submit', function(e) {
        const checked = document.querySelectorAll('.card-checkbox:checked');
        if (checked.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu produk terlebih dahulu.');
        }
    });
</script>

@endsection

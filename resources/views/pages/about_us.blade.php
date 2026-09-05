@extends('layouts.app')
@section('title', 'Manies Cakery - Tentang Kami & Filosofi Rasa')

@section('content')
<div class="py-6 space-y-16">

    <!-- Hero Header Banner -->
    <div class="relative bg-gradient-to-r from-amber-100/90 via-[#F6EFE5] to-amber-200/60 border border-amber-200/70 rounded-3xl p-8 sm:p-12 md:p-16 shadow-sm overflow-hidden text-center md:text-left">
        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-amber-200/80 text-amber-950 rounded-full text-xs font-bold uppercase tracking-wider mb-4 shadow-sm">
                <span>📖</span> Cerita & Dedikasi Kami
            </div>
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold text-gray-900 leading-tight font-serif">
                Kisah Hangat Dari Dapur <br>
                <span class="font-norican text-4xl sm:text-6xl md:text-7xl text-[#DFAC6B] font-normal">Manies Cakery</span>
            </h1>
            <p class="mt-4 text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-light">
                Berawal dari cinta terhadap aroma kue yang baru keluar dari oven, kami hadir mempersembahkan aneka cake, brownies panggang fudgy, dan pastry istimewa untuk menyempurnakan setiap momen bahagia Anda.
            </p>

            <!-- Store Value Badges -->
            <div class="mt-8 flex flex-wrap items-center justify-center md:justify-start gap-3 md:gap-4 text-xs md:text-sm font-semibold text-gray-700">
                <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full border border-amber-200/60 shadow-sm">
                    <span class="text-amber-600">🧁</span> 100% Homemade
                </div>
                <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full border border-amber-200/60 shadow-sm">
                    <span class="text-emerald-600">🌿</span> Tanpa Pengawet
                </div>
                <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full border border-amber-200/60 shadow-sm">
                    <span class="text-amber-600">🔥</span> Freshly Baked Daily
                </div>
                <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full border border-amber-200/60 shadow-sm">
                    <span class="text-rose-600">❤️</span> Dibuat Sepenuh Hati
                </div>
            </div>
        </div>

        <!-- Decorative Background Elements -->
        <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-amber-300/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-12 top-12 opacity-10 hidden lg:block pointer-events-none">
            <span class="text-9xl font-norican text-amber-900">Manies</span>
        </div>
    </div>

    <!-- Section 1: About Us Narrative -->
    <div class="relative bg-white rounded-3xl p-8 sm:p-12 border border-amber-100/80 shadow-sm">
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-lg">
                    ✨
                </div>
                <div>
                    <span class="text-xs font-bold text-[#DFAC6B] uppercase tracking-wider block">Tentang Manies Cakery</span>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 font-serif">Dedikasi Rasa & Kualitas</h2>
                </div>
            </div>

            @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <button 
                    onclick="toggleModal('aboutModal')" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] hover:brightness-105 shadow-sm transition-all cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span>Edit Konten</span>
                </button>
            @endif
        </div>

        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Highlight Quote -->
            <div class="p-6 md:p-8 bg-gradient-to-br from-[#FAF7F2] to-amber-50/60 rounded-2xl border border-amber-100">
                <span class="text-4xl text-[#DFAC6B] font-serif leading-none block mb-2">&ldquo;</span>
                <p class="text-xl sm:text-2xl font-semibold text-[#332B25] leading-snug font-serif">
                    {!! $about->about_left ?? '<span class="text-gray-400 italic font-sans text-base">[Konten kosong]</span>' !!}
                </p>
                <div class="mt-6 flex items-center gap-3 pt-4 border-t border-amber-950/10">
                    <div class="w-8 h-8 rounded-full bg-[#241C16] text-[#DFAC6B] flex items-center justify-center font-bold text-xs">
                        MC
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-800">Manies Cakery Batam</p>
                        <p class="text-[11px] text-gray-500">Artisan Homemade Bakery</p>
                    </div>
                </div>
            </div>

            <!-- Right Detail Description -->
            <div class="space-y-4 text-gray-600 text-sm sm:text-base leading-relaxed font-light">
                <p>
                    {!! $about->about_right ?? '<span class="text-gray-400 italic">[Konten kosong]</span>' !!}
                </p>
                <div class="pt-4 grid grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <p class="text-2xl font-bold text-[#493C32]">100%</p>
                        <p class="text-xs text-gray-500 font-medium">Bahan Alami & Halal</p>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <p class="text-2xl font-bold text-[#DFAC6B]">Fresh</p>
                        <p class="text-xs text-gray-500 font-medium">Dipanggang Sesuai Pesanan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Our Philosophy & Values -->
    <div class="relative bg-gradient-to-br from-[#2D231C] to-[#1E1712] rounded-3xl p-8 sm:p-12 md:p-16 text-white shadow-xl border border-amber-900/30 overflow-hidden">
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-[#DFAC6B]/20 text-[#DFAC6B] flex items-center justify-center font-bold text-lg">
                    💎
                </div>
                <div>
                    <span class="text-xs font-bold text-[#DFAC6B] uppercase tracking-wider block">Nilai & Komitmen</span>
                    <h2 class="text-xl sm:text-2xl font-bold text-white font-serif">Filosofi Dapur Manies Cakery</h2>
                </div>
            </div>

            @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <button 
                    onclick="toggleModal('philosophyModal')" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-[#241C16] bg-[#DFAC6B] hover:bg-[#C9934E] shadow-sm transition-all cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span>Edit Filosofi</span>
                </button>
            @endif
        </div>

        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center mb-12">
            <div>
                <span class="text-xs font-mono font-bold text-[#DFAC6B] uppercase tracking-widest block mb-2">Our Core Spirit</span>
                <p class="text-2xl sm:text-3xl font-bold text-white leading-snug font-serif">
                    {!! $about->philosophy_left ?? '<span class="text-white/40 italic font-sans text-base">[Konten kosong]</span>' !!}
                </p>
            </div>
            <div class="text-white/80 text-sm sm:text-base leading-relaxed font-light space-y-3">
                <p>
                    {!! $about->philosophy_right ?? '<span class="text-white/40 italic">[Konten kosong]</span>' !!}
                </p>
            </div>
        </div>

        <!-- 3 Pillar Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-white/10">
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm space-y-3 hover:bg-white/10 transition-all">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-[#DFAC6B] flex items-center justify-center text-xl font-bold">
                    🌿
                </div>
                <h3 class="text-base font-bold text-white">Bahan Murni Berkualitas</h3>
                <p class="text-xs text-white/70 leading-relaxed font-light">
                    Menggunakan mentega murni, cokelat premium, dan rempah pilihan tanpa pemanis buatan maupun zat pengawet.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm space-y-3 hover:bg-white/10 transition-all">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-[#DFAC6B] flex items-center justify-center text-xl font-bold">
                    🧁
                </div>
                <h3 class="text-base font-bold text-white">Dipanggang Segar (Daily)</h3>
                <p class="text-xs text-white/70 leading-relaxed font-light">
                    Menjaga cita rasa dan tekstur lembut sempurna dengan memanggang adonan baru setiap hari untuk setiap pesanan.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm space-y-3 hover:bg-white/10 transition-all">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-[#DFAC6B] flex items-center justify-center text-xl font-bold">
                    🎁
                </div>
                <h3 class="text-base font-bold text-white">Sentuhan Estetika Eksklusif</h3>
                <p class="text-xs text-white/70 leading-relaxed font-light">
                    Dikemas cantik dan rapi, siap menjadi hantaran manis untuk hari ulang tahun, pernikahan, atau kado terindah.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 3: Gallery Showcase (Modern Bento Grid Layout) -->
    <div class="relative bg-white rounded-3xl p-8 sm:p-12 border border-amber-100/80 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-8 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-[#DFAC6B] uppercase tracking-wider block">Galeri Kreasi & Dapur</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 font-serif">Momen Manis di Balik Layar</h2>
                <p class="text-xs text-gray-500 mt-1">Intip kehangatan kreasi kue, brownies legit, dan suasana dapur kami.</p>
            </div>

            @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <button 
                    onclick="toggleModal('imageModal')" 
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] hover:brightness-105 shadow-sm transition-all cursor-pointer self-start sm:self-auto"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Kelola Galeri Foto</span>
                </button>
            @endif
        </div>

        <!-- Modern Bento Grid (6 Images) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($galeriItems as $index => $item)
                @php
                    $galeriImg = $item->galeri ? asset('storage/' . $item->galeri) : asset('assets/banner.png');
                    $heightClass = match($index) {
                        0 => 'h-72 sm:h-80',
                        1 => 'h-72 sm:h-80',
                        2 => 'h-72 sm:h-80',
                        3 => 'h-72 sm:h-80',
                        4 => 'h-72 sm:h-80',
                        5 => 'h-72 sm:h-80',
                        default => 'h-72',
                    };
                @endphp

                <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 bg-stone-900 border border-amber-950/10 {{ $heightClass }}">
                    <img 
                        src="{{ $galeriImg }}" 
                        alt="Galeri Manies Cakery {{ $index + 1 }}" 
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 brightness-95"
                        onerror="this.src='{{ asset('assets/banner.png') }}'"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-white">
                        <span class="text-[10px] font-mono uppercase tracking-widest text-[#DFAC6B]">Manies Cakery Collection</span>
                        <h4 class="text-base font-bold font-serif">Kreasi Manis #{{ $index + 1 }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 4: Contact & Order Callout -->
    <div class="bg-gradient-to-r from-amber-100 via-[#FAF7F2] to-amber-200/50 rounded-3xl p-8 sm:p-12 border border-amber-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
        <div class="space-y-2 max-w-xl">
            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 font-serif">Ingin Pesan Custom Cake atau Tanya Menu?</h3>
            <p class="text-xs sm:text-sm text-gray-600 font-light">
                Konsultasikan kebutuhan kue ulang tahun, brownies hantaran, atau paket hampers Anda bersama tim kami via WhatsApp.
            </p>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a 
                href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20tanya%20dan%20pesan%20kue" 
                target="_blank" 
                class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 flex items-center gap-2"
            >
                <span>💬 Chat WhatsApp Kami</span>
            </a>
            <a 
                href="{{ route('produk.index', '*') }}" 
                class="px-8 py-3.5 bg-[#493C32] hover:bg-[#342b23] text-white font-bold text-xs rounded-full shadow-md transition-all duration-300 flex items-center gap-2"
            >
                <span>Lihat Katalog Produk &rarr;</span>
            </a>
        </div>
    </div>

    <!-- Modal: Edit About Us -->
    <div id="aboutModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-md p-4 overflow-y-auto" onclick="closeModalOnClickOutside(event, 'aboutModal')">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden my-8" onclick="event.stopPropagation()">
            <!-- Header -->
            <div class="flex items-center justify-between p-5 bg-[#241C16] text-white">
                <div class="flex items-center gap-2.5">
                    <span class="text-lg">✏️</span>
                    <h3 class="text-base font-bold text-white">Edit Bagian Tentang Kami</h3>
                </div>
                <button type="button" onclick="toggleModal('aboutModal')" class="text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg text-sm p-2">✕</button>
            </div>

            <!-- Form -->
            <form action="{{ route('about.update.about', $about->id) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Highlight Quote (Bagian Kiri)</label>
                    <textarea name="about_left" rows="3" class="w-full border border-gray-300 rounded-xl p-3 text-xs sm:text-sm text-gray-900 focus:ring-2 focus:ring-amber-500 focus:outline-none">{{ old('about_left', $about->about_left) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Deskripsi Detail (Bagian Kanan)</label>
                    <textarea name="about_right" rows="4" class="w-full border border-gray-300 rounded-xl p-3 text-xs sm:text-sm text-gray-900 focus:ring-2 focus:ring-amber-500 focus:outline-none">{{ old('about_right', $about->about_right) }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="toggleModal('aboutModal')" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 text-xs font-semibold">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] text-xs font-bold shadow-md hover:brightness-105">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Philosophy -->
    <div id="philosophyModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-md p-4 overflow-y-auto" onclick="closeModalOnClickOutside(event, 'philosophyModal')">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden my-8" onclick="event.stopPropagation()">
            <!-- Header -->
            <div class="flex items-center justify-between p-5 bg-[#241C16] text-white">
                <div class="flex items-center gap-2.5">
                    <span class="text-lg">💎</span>
                    <h3 class="text-base font-bold text-white">Edit Filosofi Toko</h3>
                </div>
                <button type="button" onclick="toggleModal('philosophyModal')" class="text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg text-sm p-2">✕</button>
            </div>

            <!-- Form -->
            <form action="{{ route('about.update.philosophy', $about->id) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Tagline Filosofi (Kiri)</label>
                    <textarea name="philosophy_left" rows="3" class="w-full border border-gray-300 rounded-xl p-3 text-xs sm:text-sm text-gray-900 focus:ring-2 focus:ring-amber-500 focus:outline-none">{{ old('philosophy_left', $about->philosophy_left) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Uraian Filosofi (Kanan)</label>
                    <textarea name="philosophy_right" rows="4" class="w-full border border-gray-300 rounded-xl p-3 text-xs sm:text-sm text-gray-900 focus:ring-2 focus:ring-amber-500 focus:outline-none">{{ old('philosophy_right', $about->philosophy_right) }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="toggleModal('philosophyModal')" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 text-xs font-semibold">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] text-xs font-bold shadow-md hover:brightness-105">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Galeri Gambar -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-md p-4 overflow-y-auto" onclick="closeModalOnClickOutside(event, 'imageModal')">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden my-8" onclick="event.stopPropagation()">
            <!-- Header -->
            <div class="flex items-center justify-between p-5 bg-[#241C16] text-white">
                <div class="flex items-center gap-2.5">
                    <span class="text-lg">🖼️</span>
                    <h3 class="text-base font-bold text-white">Edit Galeri Foto Tentang Kami</h3>
                </div>
                <button type="button" onclick="toggleModal('imageModal')" class="text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg text-sm p-2">✕</button>
            </div>

            <!-- Form -->
            <form action="{{ route('about.update.galeri') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                @for ($i = 0; $i < 6; $i++)
                    @php
                        $curItem = $galeriItems[$i] ?? null;
                        $curImg = ($curItem && $curItem->galeri) ? asset('storage/' . $curItem->galeri) : asset('assets/banner.png');
                    @endphp
                    <div class="flex items-center gap-4 p-3 bg-[#FAF7F2] rounded-xl border border-amber-950/10">
                        <div class="w-16 h-12 rounded-lg overflow-hidden bg-stone-900 border border-amber-950/20 shrink-0 shadow-inner">
                            <img src="{{ $curImg }}" class="w-full h-full object-cover" alt="Galeri {{ $i + 1 }}" onerror="this.src='{{ asset('assets/banner.png') }}'">
                        </div>
                        <div class="flex-1">
                            <label class="block mb-1 text-xs font-bold text-[#332B25]" for="image{{ $i }}">
                                Foto Galeri {{ $i + 1 }} <span class="text-gray-400 font-normal">({{ ($curItem && $curItem->galeri) ? basename($curItem->galeri) : 'Default' }})</span>
                            </label>
                            <input type="file" name="images[]" id="image{{ $i }}" accept="image/*"
                                class="block w-full text-xs text-gray-700 border border-gray-200 rounded-lg cursor-pointer bg-white file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#DFAC6B] file:text-[#241C16] hover:file:bg-[#C9934E] transition-all">
                        </div>
                    </div>
                @endfor

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="toggleModal('imageModal')" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 text-xs font-semibold">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] text-xs font-bold shadow-md hover:brightness-105">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function toggleModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.toggle('hidden');
    }
}

function closeModalOnClickOutside(event, modalId) {
    const modal = document.getElementById(modalId);
    if (modal && event.target === modal) {
        modal.classList.add('hidden');
    }
}
</script>
@endpush

@extends('layouts.app')
@section('title', 'Manies Cakery - Fresh Homemade Cakes, Brownies & Hampers')

@section('hero')
    <!-- Fullscreen Luxury Hero Slider (Inspired by Modern Artisan Coffee/Bakery Shops) -->
    <div id="heroSlider" class="relative w-full h-[88vh] md:h-[94vh] min-h-[640px] overflow-hidden bg-[#18120e] select-none">
        
        <!-- Slide Items -->
        @php
            $slideMeta = [
                1 => [
                    'tag' => '01 / 05 — SIGNATURE FUDGY BROWNIES',
                    'sub' => 'Keahlian dalam setiap adonan brownies cokelat panggang & topping melimpah',
                    'title1' => 'Cita Rasa Kue',
                    'title2' => 'Otentik & Penuh Cinta',
                    'desc' => 'Biji cokelat dan bahan pilihan premium dipanggang fresh setiap pagi. Hadirkan kelembutan brownies fudgy, cookies renyah, dan kue spesial di setiap momen bahagia Anda.',
                ],
                2 => [
                    'tag' => '02 / 05 — SPECIAL MOMENT CAKES',
                    'sub' => 'Kreasi kue tart & bolu istimewa untuk perayaan ulang tahun dan hari bahagia',
                    'title1' => 'Sajikan Manisnya',
                    'title2' => 'Momen Bahagia Bersama',
                    'desc' => 'Dibuat custom sesuai impian Anda dengan tekstur lembut, aroma vanila butter menggoda, dan sentuhan dekorasi artistik yang berkesan.',
                ],
                3 => [
                    'tag' => '03 / 05 — CRUNCHY BUTTER COOKIES',
                    'sub' => 'Kerenyahan butter cookies homemade dengan taburan choco chips melimpah',
                    'title1' => 'Kerenyahan Alami',
                    'title2' => 'Teman Santai Setiap Saat',
                    'desc' => 'Kombinasi mentega pilihan dan cokelat murni yang dipanggang renyah dengan suhu sempurna untuk menemani secangkir teh atau kopi favorit Anda.',
                ],
                4 => [
                    'tag' => '04 / 05 — EXCLUSIVE HAMPERS & GIFTS',
                    'sub' => 'Paket bingkisan manis eksklusif untuk hantaran, hari raya, dan hadiah terbaik',
                    'title1' => 'Bingkisan Kasih',
                    'title2' => 'Untuk Orang Teristimewa',
                    'desc' => 'Kemasan estetik dan elegan berisi aneka pastry favorit, siap dikirimkan dengan kartu ucapan eksklusif untuk mempererat silaturahmi.',
                ],
                5 => [
                    'tag' => '05 / 05 — FRESH BAKED DAILY',
                    'sub' => '100% Homemade, halal, dan bebas bahan pengawet buatan',
                    'title1' => 'Dari Dapur Kami',
                    'title2' => 'Langsung Menuju Meja Anda',
                    'desc' => 'Setiap pesanan diproses secara higienis menggunakan bahan-bahan alami segar demi menjamin kepuasan rasa terbaik bagi keluarga tercinta.',
                ],
            ];
        @endphp

        <!-- Slide Background Images & Layers -->
        <div id="slidesContainer" class="absolute inset-0 w-full h-full">
            @for ($i = 1; $i <= 5; $i++)
                @php
                    $slider = $sliders[$i - 1] ?? null;
                    $sliderImg = ($slider && $slider->gambar) ? asset('storage/slider/' . $slider->gambar) : asset('assets/banner.png');
                @endphp
                <div class="slide-item absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out {{ $i === 1 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' }}" data-slide="{{ $i }}">
                    <!-- Background Image with Ken-Burns Zoom Effect -->
                    <img 
                        src="{{ $sliderImg }}" 
                        alt="Hero Banner {{ $i }}" 
                        class="slide-img w-full h-full object-cover brightness-[0.70] contrast-[1.08] transition-transform duration-[7000ms] ease-out scale-100"
                        onerror="this.src='{{ asset('assets/banner.png') }}'"
                    >
                    <!-- Multi-Layer Vignette and Gradient Overlay for Cinematic Legibility -->
                    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/55 to-black/20"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#18120e] via-transparent to-black/30"></div>
                </div>
            @endfor
        </div>

        <!-- Floating Admin Slider Edit Trigger Button (Top Right) -->
        @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
            <div class="absolute top-6 right-6 z-30">
                <button 
                    id="editSliderButton"
                    data-modal-target="sliderEditModal" 
                    data-modal-toggle="sliderEditModal" 
                    class="inline-flex items-center gap-2 bg-black/60 hover:bg-[#DFAC6B] text-[#DFAC6B] hover:text-[#241C16] border border-[#DFAC6B]/40 px-4 py-2 rounded-full font-bold text-xs backdrop-blur-md shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Kelola Banner Slider</span>
                </button>
            </div>
        @endif

        <!-- Main Hero Content (Left-Aligned Cinema Layout) -->
        <div class="relative z-20 max-w-[1720px] w-full h-full mx-auto px-6 sm:px-10 lg:px-16 flex flex-col justify-center pb-24 md:pb-28">
            <div class="max-w-3xl">
                
                <!-- Eyebrow Badge -->
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-[#DFAC6B] text-xs font-bold uppercase tracking-wider mb-6 shadow-lg animate-fade-in">
                    <span class="w-2 h-2 rounded-full bg-[#DFAC6B] animate-ping"></span>
                    <span>Manies Cakery • Homemade Bakes & Pastry</span>
                </div>

                <!-- Animated Dynamic Title -->
                <h1 id="heroTitle" class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white leading-[1.08] tracking-tight font-serif transition-all duration-500">
                    Cita Rasa Kue <br>
                    <span class="font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg">
                        Otentik & Penuh Cinta
                    </span>
                </h1>

                <!-- Animated Dynamic Subtitle Description -->
                <p id="heroDesc" class="mt-6 text-sm sm:text-base md:text-lg text-white/85 max-w-2xl font-light leading-relaxed drop-shadow transition-all duration-500">
                    Biji cokelat dan bahan pilihan premium dipanggang fresh setiap pagi. Hadirkan kelembutan brownies fudgy, cookies renyah, dan kue spesial di setiap momen bahagia Anda.
                </p>

                <!-- Hero CTA Buttons -->
                <div class="mt-8 sm:mt-10 flex flex-wrap items-center gap-4">
                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="px-8 py-3.5 sm:py-4 bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#C9934E] text-[#241C16] font-extrabold text-xs sm:text-sm rounded-full shadow-2xl shadow-amber-500/30 hover:shadow-amber-400/50 hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2.5 group"
                    >
                        <span>Jelajahi Menu</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    
                    <a 
                        href="{{ route('about.index') }}" 
                        class="px-8 py-3.5 sm:py-4 bg-black/40 hover:bg-white/15 text-white font-bold text-xs sm:text-sm rounded-full border border-white/25 backdrop-blur-md hover:border-white/50 transition-all duration-300 flex items-center gap-2"
                    >
                        <span>Cerita Kami</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation & Status Bar (Exact Coffee Shop Layout) -->
        <div class="absolute bottom-0 inset-x-0 z-30 bg-gradient-to-t from-black/80 via-black/40 to-transparent py-6">
            <div class="max-w-[1720px] w-full mx-auto px-6 sm:px-10 lg:px-16 flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6">
                
                <!-- Bottom Left: Slide Tag, Subtitle & Segmented Indicator -->
                <div class="flex flex-col gap-2.5 max-w-xl">
                    <div class="flex items-center gap-2">
                        <span id="slideTag" class="text-xs md:text-sm font-mono font-bold tracking-wider text-[#DFAC6B] uppercase">
                            01 / 05 — SIGNATURE FUDGY BROWNIES
                        </span>
                    </div>
                    <p id="slideSub" class="text-xs text-white/70 font-light truncate max-w-md md:max-w-xl">
                        Keahlian dalam setiap adonan brownies cokelat panggang & topping melimpah
                    </p>

                    <!-- 5 Segmented Progress Indicator Bars -->
                    <div class="flex items-center gap-2 pt-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <button 
                                type="button" 
                                onclick="goToSlide({{ $i }})" 
                                class="indicator-bar group h-1.5 flex-1 rounded-full bg-white/25 overflow-hidden transition-all duration-300 cursor-pointer focus:outline-none"
                                aria-label="Slide {{ $i }}"
                            >
                                <div class="indicator-fill h-full w-0 bg-[#DFAC6B] transition-all duration-300 {{ $i === 1 ? 'w-full' : '' }}"></div>
                            </button>
                        @endfor
                    </div>
                </div>

                <!-- Bottom Right: Circular Navigation & Play/Pause Controls -->
                <div class="flex items-center gap-3 self-end sm:self-auto">
                    <!-- Prev Button -->
                    <button 
                        type="button" 
                        id="prevSlideBtn" 
                        onclick="prevSlide()" 
                        aria-label="Slide Sebelumnya"
                        class="w-11 h-11 rounded-full bg-black/40 hover:bg-[#DFAC6B] text-white hover:text-[#241C16] border border-white/20 hover:border-[#DFAC6B] backdrop-blur-md flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Next Button -->
                    <button 
                        type="button" 
                        id="nextSlideBtn" 
                        onclick="nextSlide()" 
                        aria-label="Slide Berikutnya"
                        class="w-11 h-11 rounded-full bg-black/40 hover:bg-[#DFAC6B] text-white hover:text-[#241C16] border border-white/20 hover:border-[#DFAC6B] backdrop-blur-md flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Play / Pause Toggle Button -->
                    <button 
                        type="button" 
                        id="playPauseBtn" 
                        onclick="togglePlayPause()" 
                        aria-label="Pause / Putar Slider"
                        class="w-11 h-11 rounded-full bg-[#DFAC6B] hover:bg-[#C9934E] text-[#241C16] flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg cursor-pointer"
                    >
                        <!-- Pause Icon (Default playing) -->
                        <svg id="pauseIcon" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                        <!-- Play Icon (When paused) -->
                        <svg id="playIcon" class="w-4 h-4 fill-current hidden" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk Edit Gambar Slider (Admin) -->
    <div id="sliderEditModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/70 backdrop-blur-md">
        <div class="relative w-full max-w-2xl max-h-full mx-auto mt-10">
            <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="flex items-center justify-between p-5 bg-[#241C16] text-white">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#DFAC6B]/20 text-[#DFAC6B] flex items-center justify-center font-bold">
                            🖼️
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">Edit Gambar Slider Beranda</h3>
                            <p class="text-xs text-white/70">Upload gambar baru (PNG, JPG, JFIF, WebP) untuk mengganti banner slide.</p>
                        </div>
                    </div>
                    <button type="button" id="closeModalButton" class="text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg text-sm p-2 ms-auto inline-flex items-center transition-colors" data-modal-hide="sliderEditModal">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>

                <!-- Body -->
                <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    @method('POST')

                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $sliderItem = $sliders[$i - 1] ?? null;
                            $thumbImg = ($sliderItem && $sliderItem->gambar) ? asset('storage/slider/' . $sliderItem->gambar) : asset('assets/banner.png');
                        @endphp
                        <div class="flex items-center gap-4 p-3.5 bg-[#FAF7F2] rounded-xl border border-amber-950/10">
                            <!-- Thumbnail Preview -->
                            <div class="w-20 h-14 rounded-lg overflow-hidden bg-stone-900 border border-amber-950/20 shrink-0 shadow-inner">
                                <img src="{{ $thumbImg }}" class="w-full h-full object-cover" alt="Slide {{ $i }}" onerror="this.src='{{ asset('assets/banner.png') }}'">
                            </div>
                            <!-- Input -->
                            <div class="flex-1">
                                <label for="sliderImage{{ $i }}" class="block mb-1 text-xs font-bold text-[#332B25]">
                                    Gambar Slide {{ $i }} <span class="text-gray-400 font-normal">({{ $sliderItem ? $sliderItem->gambar : 'Default' }})</span>
                                </label>
                                <input type="file" id="sliderImage{{ $i }}" name="sliderImage{{ $i }}" accept="image/*"
                                    class="block w-full text-xs text-gray-700 border border-gray-200 rounded-lg cursor-pointer bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#DFAC6B] file:text-[#241C16] hover:file:bg-[#C9934E] transition-all">
                            </div>
                        </div>
                    @endfor

                    <!-- Footer -->
                    <div class="flex justify-end pt-4 space-x-3 border-t border-gray-100">
                        <button type="button" data-modal-hide="sliderEditModal" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 font-semibold text-xs transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#DFAC6B] to-[#C9934E] text-[#241C16] font-bold text-xs shadow-md hover:shadow-lg hover:brightness-105 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- Section 1: About Bakery Story Highlight -->
    <section class="py-10 grid md:grid-cols-2 gap-10 lg:gap-16 items-center">
        <div class="space-y-6 text-center md:text-left">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-100/80 text-amber-900 text-xs font-bold uppercase tracking-wider">
                <span>🧁</span> Cerita Manies Cakery
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#332B25] leading-tight font-serif">
                Dibuat Sepenuh Hati, <br>
                <span class="font-norican text-4xl sm:text-5xl md:text-6xl text-[#DFAC6B]">Disajikan Penuh Cinta</span>
            </h2>
            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                Toko kue rumahan yang menyajikan berbagai pilihan manisan premium yang dibuat dengan sepenuh hati. Menyajikan berbagai brownies panggang fudgy, butter cookies renyah, dan kue-kue istimewa lainnya dengan cita rasa lezat dan tekstur yang sempurna. Kami juga menerima custom cake untuk ulang tahun, pernikahan, dan perayaan spesial lainnya.
            </p>
            <div class="pt-2">
                <a href="{{ route('about.index') }}" class="inline-flex items-center gap-2 px-7 py-3 bg-[#493C32] hover:bg-[#342b23] text-white font-bold text-xs tracking-wider uppercase rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    <span>Pelajari Tentang Kami</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>
        <div class="relative group">
            <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl border border-amber-950/10">
                <img src="{{ asset('assets/banner.png') }}" alt="Manies Cakery Showcase" class="w-full h-80 md:h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="absolute -bottom-4 -right-4 w-full h-full rounded-3xl bg-[#DFAC6B]/20 -z-0"></div>
        </div>
    </section>

    <!-- Section 2: Best Seller Categories (4 Grid Modern Cards) -->
    <section class="py-12">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-100/80 text-amber-900 text-xs font-bold uppercase tracking-wider mb-2">
                <span>⭐</span> Kategori Pilihan
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-[#332B25] font-serif">
                Koleksi Favorit <span class="font-norican text-4xl md:text-5xl text-[#DFAC6B]">Best Seller</span>
            </h2>
            <p class="text-xs md:text-sm text-gray-500 mt-2">Pilih kategori favorit Anda untuk melihat varian rasa istimewa.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Cookies -->
            <a href="{{ route('produk.index', 'Cookies') }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1.5 border border-amber-100">
                <div class="h-72 w-full bg-stone-900 overflow-hidden">
                    <img src="{{ asset('assets/produk/Cookies-M.png') }}" alt="Cookies" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 brightness-90">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-[11px] font-bold text-[#DFAC6B] uppercase tracking-wider">Crispy & Crunchy</span>
                    <h3 class="text-2xl font-bold font-serif group-hover:text-[#DFAC6B] transition-colors">Cookies</h3>
                    <span class="text-xs text-white/80 mt-1 inline-flex items-center gap-1">Lihat Menu &rarr;</span>
                </div>
            </a>

            <!-- Brownies -->
            <a href="{{ route('produk.index', 'Brownies') }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1.5 border border-amber-100">
                <div class="h-72 w-full bg-stone-900 overflow-hidden">
                    <img src="{{ asset('assets/produk/Brownies-M.png') }}" alt="Brownies" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 brightness-90">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-[11px] font-bold text-[#DFAC6B] uppercase tracking-wider">Fudgy & Rich Chocolate</span>
                    <h3 class="text-2xl font-bold font-serif group-hover:text-[#DFAC6B] transition-colors">Brownies</h3>
                    <span class="text-xs text-white/80 mt-1 inline-flex items-center gap-1">Lihat Menu &rarr;</span>
                </div>
            </a>

            <!-- Cake -->
            <a href="{{ route('produk.index', 'Cake') }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1.5 border border-amber-100">
                <div class="h-72 w-full bg-stone-900 overflow-hidden">
                    <img src="{{ asset('assets/produk/Cake-M.png') }}" alt="Cake" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 brightness-90">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-[11px] font-bold text-[#DFAC6B] uppercase tracking-wider">Soft & Fluffy</span>
                    <h3 class="text-2xl font-bold font-serif group-hover:text-[#DFAC6B] transition-colors">Cake</h3>
                    <span class="text-xs text-white/80 mt-1 inline-flex items-center gap-1">Lihat Menu &rarr;</span>
                </div>
            </a>

            <!-- Hampers -->
            <a href="{{ route('produk.index', 'Hampers') }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1.5 border border-amber-100">
                <div class="h-72 w-full bg-stone-900 overflow-hidden">
                    <img src="{{ asset('assets/hampers/Hampers-M.png') }}" alt="Hampers" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 brightness-90">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-[11px] font-bold text-[#DFAC6B] uppercase tracking-wider">Special Gift Box</span>
                    <h3 class="text-2xl font-bold font-serif group-hover:text-[#DFAC6B] transition-colors">Hampers</h3>
                    <span class="text-xs text-white/80 mt-1 inline-flex items-center gap-1">Lihat Menu &rarr;</span>
                </div>
            </a>
        </div>
    </section>

    <!-- Section 3: Favorite Menu Showcase -->
    <section class="py-12 px-6 sm:px-10 bg-white rounded-3xl shadow-sm border border-amber-100 my-8 relative">
        <div class="text-center max-w-xl mx-auto mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-[#332B25] font-serif">
                Menu <span class="font-norican text-4xl md:text-5xl text-[#DFAC6B]">Favourite</span>
            </h2>
            <p class="text-xs md:text-sm text-gray-500 mt-1">Produk terlaris yang paling sering dipesan oleh pelanggan kami.</p>

            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <!-- Admin & Super Admin Direct Control Button -->
                <div class="mt-4 flex items-center justify-center gap-3">
                    <button 
                        type="button" 
                        onclick="openFavoriteModal()"
                        class="cursor-pointer inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-gradient-to-r from-amber-600 via-amber-700 to-amber-800 text-white font-extrabold text-xs shadow-lg shadow-amber-600/30 hover:shadow-amber-600/50 hover:scale-105 active:scale-95 transition-all duration-300 border border-amber-400/40"
                    >
                        <span class="text-sm">⭐</span>
                        <span>Kelola Menu Favorit Beranda ({{ count($produkFavorit) }} Aktif)</span>
                        <svg class="w-3.5 h-3.5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($produkFavorit as $produk)    
                <div class="relative group flex flex-col items-center text-center">
                    @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <!-- Quick Remove button for Admin on Homepage -->
                        <button 
                            type="button"
                            onclick="quickRemoveFavorite(event, {{ $produk->id }}, '{{ addslashes($produk->nama) }}')"
                            title="Hapus dari Menu Favorit Beranda"
                            class="absolute top-0 right-2 z-20 w-7 h-7 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110 active:scale-90 text-xs font-bold cursor-pointer"
                        >
                            ✕
                        </button>
                    @endif

                    <a href="{{ route('produk.detail', $produk->id) }}" class="flex flex-col items-center text-center w-full">
                        <div class="relative w-36 h-36 sm:w-44 sm:h-44 rounded-full overflow-hidden shadow-lg border-4 border-amber-100 group-hover:border-[#DFAC6B] group-hover:scale-105 transition-all duration-300">
                            <img 
                                src="{{ asset('storage/' . $produk->gambar) }}" 
                                alt="{{ $produk->nama }}" 
                                class="w-full h-full object-cover brightness-95 group-hover:scale-110 transition-transform duration-500"
                                onerror="this.src='{{ asset('assets/banner.png') }}'"
                            >
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="text-white text-xs font-bold bg-black/60 px-3 py-1 rounded-full">Pesan</span>
                            </div>
                        </div>
                        <h3 class="mt-4 text-sm sm:text-base font-bold text-gray-900 group-hover:text-amber-800 transition-colors line-clamp-1">
                            {{ $produk->nama }}
                        </h3>
                        <p class="text-xs font-extrabold text-[#DFAC6B] mt-0.5">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </a>
                </div>
            @empty
                <div class="text-center text-gray-500 w-full py-8 col-span-full">
                    <p class="mb-2">Belum ada produk favorit yang ditampilkan.</p>
                    @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <button 
                            type="button" 
                            onclick="openFavoriteModal()"
                            class="text-xs font-bold text-amber-700 hover:underline cursor-pointer"
                        >
                            + Klik di sini untuk memilih produk favorit sekarang
                        </button>
                    @endif
                </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('produk.index', '*') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-[#DFAC6B] hover:bg-[#C9934E] text-[#241C16] font-bold text-xs rounded-full shadow-md hover:shadow-lg transition-all">
                <span>Lihat Seluruh Katalog Produk</span>
                <span>&rarr;</span>
            </a>
        </div>
    </section>

    @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
        <!-- =======================================================
             ADMIN MODAL: PILIH MENU FAVORIT BERANDA SECARA LANGSUNG
             ======================================================= -->
        <div id="favoritePickerModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-md p-4 sm:p-6 transition-all duration-300">
            <div class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-amber-200 overflow-hidden flex flex-col max-h-[90vh]">
                
                <!-- Modal Header -->
                <div class="p-5 sm:p-6 border-b border-gray-100 bg-[#FAF7F2] flex items-center justify-between">
                    <div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-xs font-bold uppercase tracking-wider mb-1">
                            <span>⭐</span> Khusus Admin & Super Admin
                        </div>
                        <h3 class="text-xl font-bold text-[#332B25] font-serif">
                            Pilih Menu Favorit untuk Tampil di Beranda
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Centang produk yang ingin Anda tampilkan pada etalase Menu Favourite di halaman beranda.</p>
                    </div>
                    <button 
                        type="button" 
                        onclick="closeFavoriteModal()"
                        class="text-gray-400 hover:text-gray-700 p-2 rounded-xl hover:bg-gray-200/60 transition-colors cursor-pointer"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Search and Category Filters -->
                <div class="p-4 sm:px-6 bg-white border-b border-gray-100 flex flex-col sm:flex-row items-center gap-3">
                    <div class="relative flex-1 w-full">
                        <input 
                            type="text" 
                            id="favModalSearch" 
                            onkeyup="filterModalProducts()"
                            placeholder="Cari produk berdasarkan nama..."
                            class="w-full py-2.5 pl-10 pr-4 text-xs sm:text-sm bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                    </div>

                    <!-- Category filter pills -->
                    <div class="flex items-center gap-1.5 overflow-x-auto w-full sm:w-auto pb-1 sm:pb-0 scrollbar-none">
                        <button type="button" onclick="setCategoryFilter('')" class="cat-pill active px-3 py-1.5 rounded-lg text-xs font-bold bg-[#332B25] text-white whitespace-nowrap cursor-pointer transition-colors" data-cat="">
                            Semua
                        </button>
                        @foreach($categories as $cat)
                            <button type="button" onclick="setCategoryFilter('{{ $cat->nama }}')" class="cat-pill px-3 py-1.5 rounded-lg text-xs font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 whitespace-nowrap cursor-pointer transition-colors" data-cat="{{ $cat->nama }}">
                                {{ $cat->nama }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Product Selection Grid (Scrollable) -->
                <div class="overflow-y-auto p-4 sm:p-6 flex-1 bg-[#FAF7F2]/50">
                    <div id="favProductsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3.5">
                        @foreach($allProducts as $p)
                            @php
                                $isFav = (bool)$p->favourit;
                            @endphp
                            <div 
                                class="fav-item-card relative flex items-center gap-3 p-3 rounded-2xl border transition-all duration-200 cursor-pointer select-none {{ $isFav ? 'bg-amber-50/90 border-amber-400 ring-2 ring-amber-400/40 shadow-sm' : 'bg-white border-gray-200 hover:border-amber-300' }}"
                                data-id="{{ $p->id }}"
                                data-name="{{ strtolower($p->nama) }}"
                                data-cat="{{ $p->kategori }}"
                                onclick="toggleFavCheckbox({{ $p->id }})"
                            >
                                <img 
                                    src="{{ asset('storage/' . $p->gambar) }}" 
                                    alt="{{ $p->nama }}" 
                                    class="w-14 h-14 object-cover rounded-xl border border-gray-200 shadow-sm flex-shrink-0"
                                    onerror="this.src='{{ asset('assets/banner.png') }}'"
                                >
                                <div class="flex-1 min-w-0 pr-6">
                                    <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-900 mb-0.5">
                                        {{ $p->kategori }}
                                    </span>
                                    <h4 class="text-xs sm:text-sm font-bold text-gray-900 truncate">
                                        {{ $p->nama }}
                                    </h4>
                                    <p class="text-xs font-extrabold text-[#DFAC6B] mt-0.5">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="absolute right-3.5 top-1/2 -translate-y-1/2">
                                    <input 
                                        type="checkbox" 
                                        id="fav_check_{{ $p->id }}"
                                        value="{{ $p->id }}" 
                                        {{ $isFav ? 'checked' : '' }}
                                        class="fav-checkbox w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500 cursor-pointer pointer-events-none"
                                    >
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="noFavProductsFound" class="hidden py-12 text-center text-gray-400 text-sm">
                        Tidak ada produk yang cocok dengan pencarian.
                    </div>
                </div>

                <!-- Sticky Bottom Action Footer -->
                <div class="p-4 sm:px-6 bg-white border-t border-gray-100 flex items-center justify-between shadow-inner">
                    <div class="text-xs sm:text-sm font-bold text-gray-700">
                        <span id="selectedCountText" class="text-amber-700 font-extrabold">{{ count($produkFavorit) }}</span> produk dipilih sebagai Menu Favorit
                    </div>
                    <div class="flex items-center gap-2">
                        <button 
                            type="button" 
                            onclick="closeFavoriteModal()"
                            class="px-4 py-2.5 rounded-xl text-xs font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors cursor-pointer"
                        >
                            Batal
                        </button>
                        <button 
                            type="button" 
                            id="btnSaveFavorites"
                            onclick="submitFavoriteSync()"
                            class="px-5 py-2.5 rounded-xl text-xs font-extrabold text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-md shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all flex items-center gap-2 cursor-pointer"
                        >
                            <span>✓</span>
                            <span>Simpan & Terapkan ke Beranda</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
</style>
@endpush

@push('scripts')
<script>
    // Slide Metadata Data Array
    const slideData = {
        1: {
            tag: "01 / 05 — SIGNATURE FUDGY BROWNIES",
            sub: "Keahlian dalam setiap adonan brownies cokelat panggang & topping melimpah",
            title: "Cita Rasa Kue <br><span class=\"font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg\">Otentik & Penuh Cinta</span>",
            desc: "Biji cokelat dan bahan pilihan premium dipanggang fresh setiap pagi. Hadirkan kelembutan brownies fudgy, cookies renyah, dan kue spesial di setiap momen bahagia Anda."
        },
        2: {
            tag: "02 / 05 — SPECIAL MOMENT CAKES",
            sub: "Kreasi kue tart & bolu istimewa untuk perayaan ulang tahun dan hari bahagia",
            title: "Sajikan Manisnya <br><span class=\"font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg\">Momen Bahagia Bersama</span>",
            desc: "Dibuat custom sesuai impian Anda dengan tekstur lembut, aroma vanila butter menggoda, dan sentuhan dekorasi artistik yang berkesan."
        },
        3: {
            tag: "03 / 05 — CRUNCHY BUTTER COOKIES",
            sub: "Kerenyahan butter cookies homemade dengan taburan choco chips melimpah",
            title: "Kerenyahan Alami <br><span class=\"font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg\">Teman Santai Setiap Saat</span>",
            desc: "Kombinasi mentega pilihan dan cokelat murni yang dipanggang renyah dengan suhu sempurna untuk menemani secangkir teh atau kopi favorit Anda."
        },
        4: {
            tag: "04 / 05 — EXCLUSIVE HAMPERS & GIFTS",
            sub: "Paket bingkisan manis eksklusif untuk hantaran, hari raya, dan hadiah terbaik",
            title: "Bingkisan Kasih <br><span class=\"font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg\">Untuk Orang Teristimewa</span>",
            desc: "Kemasan estetik dan elegan berisi aneka pastry favorit, siap dikirimkan dengan kartu ucapan eksklusif untuk mempererat silaturahmi."
        },
        5: {
            tag: "05 / 05 — FRESH BAKED DAILY",
            sub: "100% Homemade, halal, dan bebas bahan pengawet buatan",
            title: "Dari Dapur Kami <br><span class=\"font-norican text-5xl sm:text-7xl md:text-8xl lg:text-9xl text-[#DFAC6B] font-normal italic drop-shadow-lg\">Langsung Menuju Meja Anda</span>",
            desc: "Setiap pesanan diproses secara higienis menggunakan bahan-bahan alami segar demi menjamin kepuasan rasa terbaik bagi keluarga tercinta."
        }
    };

    let currentSlide = 1;
    const totalSlides = 5;
    let slideInterval = null;
    let isPlaying = true;
    const intervalDuration = 6000; // 6 seconds per slide

    function renderSlide(slideNumber) {
        const slideItems = document.querySelectorAll('.slide-item');
        const indicatorFills = document.querySelectorAll('.indicator-fill');
        const heroTitle = document.getElementById('heroTitle');
        const heroDesc = document.getElementById('heroDesc');
        const slideTag = document.getElementById('slideTag');
        const slideSub = document.getElementById('slideSub');

        // Update Slide items opacity & scale
        slideItems.forEach(item => {
            const index = parseInt(item.getAttribute('data-slide'));
            const img = item.querySelector('.slide-img');
            if (index === slideNumber) {
                item.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                item.classList.add('opacity-100', 'z-10');
                if (img) {
                    img.classList.remove('scale-100');
                    img.classList.add('scale-105');
                }
            } else {
                item.classList.remove('opacity-100', 'z-10');
                item.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                if (img) {
                    img.classList.remove('scale-105');
                    img.classList.add('scale-100');
                }
            }
        });

        // Update Segmented Indicators
        indicatorFills.forEach((fill, idx) => {
            if (idx + 1 === slideNumber) {
                fill.classList.remove('w-0');
                fill.classList.add('w-full');
            } else {
                fill.classList.remove('w-full');
                fill.classList.add('w-0');
            }
        });

        // Update Text content with subtle fade
        if (slideData[slideNumber]) {
            if (heroTitle) {
                heroTitle.style.opacity = '0';
                heroTitle.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    heroTitle.innerHTML = slideData[slideNumber].title;
                    heroTitle.style.opacity = '1';
                    heroTitle.style.transform = 'translateY(0)';
                }, 200);
            }

            if (heroDesc) {
                heroDesc.style.opacity = '0';
                heroDesc.style.transform = 'translateY(6px)';
                setTimeout(() => {
                    heroDesc.textContent = slideData[slideNumber].desc;
                    heroDesc.style.opacity = '1';
                    heroDesc.style.transform = 'translateY(0)';
                }, 250);
            }

            if (slideTag) {
                slideTag.textContent = slideData[slideNumber].tag;
            }

            if (slideSub) {
                slideSub.textContent = slideData[slideNumber].sub;
            }
        }

        currentSlide = slideNumber;
    }

    function nextSlide() {
        let next = currentSlide + 1;
        if (next > totalSlides) next = 1;
        renderSlide(next);
        resetTimer();
    }

    function prevSlide() {
        let prev = currentSlide - 1;
        if (prev < 1) prev = totalSlides;
        renderSlide(prev);
        resetTimer();
    }

    function goToSlide(n) {
        renderSlide(n);
        resetTimer();
    }

    function startTimer() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(() => {
            nextSlide();
        }, intervalDuration);
        isPlaying = true;
        updatePlayPauseUI();
    }

    function stopTimer() {
        if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
        }
        isPlaying = false;
        updatePlayPauseUI();
    }

    function resetTimer() {
        if (isPlaying) {
            startTimer();
        }
    }

    function togglePlayPause() {
        if (isPlaying) {
            stopTimer();
        } else {
            startTimer();
        }
    }

    function updatePlayPauseUI() {
        const pauseIcon = document.getElementById('pauseIcon');
        const playIcon = document.getElementById('playIcon');
        if (pauseIcon && playIcon) {
            if (isPlaying) {
                pauseIcon.classList.remove('hidden');
                playIcon.classList.add('hidden');
            } else {
                pauseIcon.classList.add('hidden');
                playIcon.classList.remove('hidden');
            }
        }
    }

    // Keyboard Arrow Navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });

    // Touch Swipe Support for Mobile Devices
    let touchStartX = 0;
    let touchEndX = 0;
    const heroSliderElem = document.getElementById('heroSlider');
    if (heroSliderElem) {
        heroSliderElem.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        heroSliderElem.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) nextSlide();
            if (touchEndX - touchStartX > 50) prevSlide();
        }, { passive: true });
    }

    // ==========================================
    // ADMIN FAVORITE MANAGEMENT MODAL SCRIPT
    // ==========================================
    let currentCategoryFilter = '';

    function openFavoriteModal() {
        const modal = document.getElementById('favoritePickerModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            updateSelectedCount();
        }
    }

    function closeFavoriteModal() {
        const modal = document.getElementById('favoritePickerModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function toggleFavCheckbox(productId) {
        const checkbox = document.getElementById('fav_check_' + productId);
        const card = document.querySelector(`.fav-item-card[data-id="${productId}"]`);
        if (!checkbox || !card) return;

        checkbox.checked = !checkbox.checked;
        if (checkbox.checked) {
            card.classList.add('bg-amber-50/90', 'border-amber-400', 'ring-2', 'ring-amber-400/40', 'shadow-sm');
            card.classList.remove('bg-white', 'border-gray-200');
        } else {
            card.classList.remove('bg-amber-50/90', 'border-amber-400', 'ring-2', 'ring-amber-400/40', 'shadow-sm');
            card.classList.add('bg-white', 'border-gray-200');
        }

        updateSelectedCount();
    }

    function updateSelectedCount() {
        const checkedBoxes = document.querySelectorAll('.fav-checkbox:checked');
        const countText = document.getElementById('selectedCountText');
        if (countText) {
            countText.innerText = checkedBoxes.length;
        }
    }

    function setCategoryFilter(categoryName) {
        currentCategoryFilter = categoryName;

        document.querySelectorAll('.cat-pill').forEach(pill => {
            if (pill.getAttribute('data-cat') === categoryName) {
                pill.classList.add('bg-[#332B25]', 'text-white', 'font-bold');
                pill.classList.remove('bg-gray-100', 'text-gray-700');
            } else {
                pill.classList.remove('bg-[#332B25]', 'text-white', 'font-bold');
                pill.classList.add('bg-gray-100', 'text-gray-700');
            }
        });

        filterModalProducts();
    }

    function filterModalProducts() {
        const searchVal = (document.getElementById('favModalSearch')?.value || '').toLowerCase().trim();
        const cards = document.querySelectorAll('.fav-item-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const cat = card.getAttribute('data-cat') || '';

            const matchSearch = !searchVal || name.includes(searchVal);
            const matchCat = !currentCategoryFilter || cat === currentCategoryFilter;

            if (matchSearch && matchCat) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        const noFoundElem = document.getElementById('noFavProductsFound');
        if (noFoundElem) {
            if (visibleCount === 0) {
                noFoundElem.classList.remove('hidden');
            } else {
                noFoundElem.classList.add('hidden');
            }
        }
    }

    async function submitFavoriteSync() {
        const btn = document.getElementById('btnSaveFavorites');
        const checkedBoxes = document.querySelectorAll('.fav-checkbox:checked');
        const selectedIds = Array.from(checkedBoxes).map(cb => parseInt(cb.value));

        if (btn) {
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Menyimpan...</span>
            `;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
            const response = await fetch('{{ route("dashboard.product.sync-favorites") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    selected_ids: selectedIds
                })
            });

            const result = await response.json();
            if (result.success) {
                window.location.reload();
            } else {
                alert('Gagal menyimpan menu favorit: ' + (result.message || 'Terjadi kesalahan'));
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = '<span>✓</span><span>Simpan & Terapkan ke Beranda</span>';
                }
            }
        } catch (err) {
            console.error(err);
            alert('Terjadi kesalahan saat menyimpan menu favorit.');
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<span>✓</span><span>Simpan & Terapkan ke Beranda</span>';
            }
        }
    }

    async function quickRemoveFavorite(event, productId, productName) {
        event.preventDefault();
        event.stopPropagation();

        if (!confirm(`Hapus "${productName}" dari Menu Favorit Beranda?`)) {
            return;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
            const response = await fetch(`/dashboard/products/${productId}/toggle-favorite`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const res = await response.json();
            if (res.success) {
                window.location.reload();
            }
        } catch (err) {
            console.error(err);
            window.location.reload();
        }
    }

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        renderSlide(1);
        startTimer();
    });
</script>
@endpush

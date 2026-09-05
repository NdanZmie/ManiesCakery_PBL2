<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Manies Cakery - Toko kue, brownies panggang, cookies, dan hampers homemade premium terbaik di Batam. Dibuat segar setiap hari dengan bahan alami pilihan.">
    <title>@yield('title', 'Manies Cakery - Toko Kue & Pastry Homemade')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets & Scripts -->
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
    <script src="{{ asset('js/flowbite.min.js') }}" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-[#FAF7F2] text-[#332B25] flex flex-col min-h-screen font-sans antialiased selection:bg-[#DFAC6B] selection:text-white">

    <!-- Top Announcement & Store Info Bar -->
    <div class="bg-[#241C16] text-[#DFAC6B] text-[11px] md:text-xs py-2.5 px-4 border-b border-amber-950/60">
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-4 text-center sm:text-left text-white/80">
                <span class="flex items-center gap-1.5">
                    <span class="text-amber-400">📍</span> Batam, Kepri
                </span>
                <span class="hidden md:inline text-white/30">•</span>
                <span class="hidden md:flex items-center gap-1.5">
                    <span class="text-amber-400">🕒</span> Buka Setiap Hari (08.00 - 20.00 WIB)
                </span>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-white/90 font-medium">✨ Freshly Baked Daily</span>
                <span class="text-white/30">•</span>
                <a 
                    href="https://wa.me/6289665314602" 
                    target="_blank" 
                    class="text-[#DFAC6B] hover:text-white transition-colors font-semibold flex items-center gap-1"
                >
                    <span>WA: 0896-6531-4602</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header with Glassmorphism -->
    <header class="glass-nav sticky top-0 z-50 shadow-lg border-b border-amber-500/20 transition-all duration-300">
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <div class="relative">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery Logo" 
                            class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105 filter drop-shadow"
                        >
                    </div>
                </a>

                <!-- Desktop Navigation Links with Pill Indicators -->
                <nav class="hidden md:flex items-center gap-2 bg-black/20 p-1.5 rounded-full border border-white/10 backdrop-blur-md">
                    <a 
                        href="/" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->is('/') ? 'bg-gradient-to-r from-[#DFAC6B] to-[#E5BD83] text-[#241C16] shadow-md ring-1 ring-amber-300/30' : 'text-white/90 hover:text-white hover:bg-white/10' }}"
                    >
                        Beranda
                    </a>
                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->routeIs('produk.*') ? 'bg-gradient-to-r from-[#DFAC6B] to-[#E5BD83] text-[#241C16] shadow-md ring-1 ring-amber-300/30' : 'text-white/90 hover:text-white hover:bg-white/10' }}"
                    >
                        Katalog Produk
                    </a>
                    <a 
                        href="{{ route('about.index') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->routeIs('about.*') ? 'bg-gradient-to-r from-[#DFAC6B] to-[#E5BD83] text-[#241C16] shadow-md ring-1 ring-amber-300/30' : 'text-white/90 hover:text-white hover:bg-white/10' }}"
                    >
                        Tentang Kami
                    </a>
                </nav>

                <!-- Desktop User & Action Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <!-- Admin Dashboard Button -->
                        @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-extrabold text-amber-950 bg-gradient-to-r from-[#DFAC6B] to-[#F1CF9B] hover:brightness-105 transition-all shadow-md transform hover:-translate-y-0.5"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        @endif

                        <!-- User Profile Chip -->
                        <div class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-full bg-white/10 border border-white/15 text-white">
                            <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#DFAC6B] to-[#C29456] text-[#241C16] font-bold text-xs flex items-center justify-center uppercase shadow-inner">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="text-xs font-bold leading-tight max-w-[110px] truncate text-white">
                                    {{ Auth::user()->username }}
                                </span>
                                <span class="text-[10px] text-[#DFAC6B] leading-none uppercase font-semibold">
                                    {{ Auth::user()->role }}
                                </span>
                            </div>
                        </div>

                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button 
                                type="submit" 
                                title="Keluar Akun" 
                                class="p-2.5 rounded-full text-white/70 hover:text-rose-400 hover:bg-white/10 transition-all duration-200 cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <!-- Guest Login Button -->
                        <a 
                            href="{{ route('login') }}" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#EBC690] to-[#DFAC6B] hover:shadow-amber-500/20 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span>Masuk / Login</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex items-center md:hidden">
                    <button 
                        type="button" 
                        id="mobileMenuBtn" 
                        aria-label="Buka Menu"
                        class="p-2.5 rounded-xl text-white hover:text-[#DFAC6B] hover:bg-white/10 focus:outline-none transition cursor-pointer"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburgerIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="closeMenuIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu Drawer -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#2D231C]/95 backdrop-blur-xl border-t border-white/10 px-4 pt-4 pb-6 space-y-2 transition-all duration-300">
            <a 
                href="/" 
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->is('/') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>🏠</span> Beranda
            </a>
            <a 
                href="{{ route('produk.index', '*') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('produk.*') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>🍰</span> Katalog Produk
            </a>
            <a 
                href="{{ route('about.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('about.*') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>📖</span> Tentang Kami
            </a>

            <div class="pt-4 border-t border-white/10 space-y-3">
                @auth
                    <div class="flex items-center justify-between px-4 py-2.5 bg-white/10 rounded-xl text-white">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-[#DFAC6B] text-[#241C16] font-bold text-xs flex items-center justify-center uppercase">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <div class="text-left">
                                <p class="text-xs font-bold leading-tight">{{ Auth::user()->username }}</p>
                                <p class="text-[10px] text-[#DFAC6B] uppercase">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-rose-400 font-bold hover:underline px-2 py-1">Keluar</button>
                        </form>
                    </div>

                    @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="block text-center py-3 rounded-xl text-xs font-extrabold text-[#241C16] bg-[#DFAC6B] shadow-md"
                        >
                            📊 Buka Dashboard Admin
                        </a>
                    @endif
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="block text-center py-3 rounded-xl text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#EBC690] shadow-md"
                    >
                        Masuk / Login Akun
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Global Toast / Alert Notifications -->
    @if(session('success') || session('error') || session('status'))
    <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 mt-4">
        @if(session('success'))
            <div class="flex items-center justify-between p-4 text-emerald-900 bg-emerald-50 border border-emerald-200 rounded-2xl shadow-sm" role="alert">
                <div class="flex items-center gap-3">
                    <span class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">✓</span>
                    <span class="text-xs md:text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-sm font-bold ml-4 p-1">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center justify-between p-4 text-rose-900 bg-rose-50 border border-rose-200 rounded-2xl shadow-sm" role="alert">
                <div class="flex items-center gap-3">
                    <span class="w-7 h-7 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-sm">⚠</span>
                    <span class="text-xs md:text-sm font-semibold">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-800 text-sm font-bold ml-4 p-1">✕</button>
            </div>
        @endif
    </div>
    @endif

    <!-- Fullscreen Hero Section (If present) -->
    @yield('hero')

    <!-- Main Content Container -->
    <main class="flex-grow max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 {{ request()->is('/') ? 'py-12' : 'py-8' }}">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Action Button (Bottom Right) -->
    <div class="fixed bottom-6 right-6 z-40 flex flex-col items-end gap-2 group">
        <a 
            href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20tanya%20produk%20dan%20pemesanan%20kue" 
            target="_blank"
            title="Chat WhatsApp Kami"
            class="relative flex items-center justify-center w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl transition-all duration-300 transform hover:scale-110 animate-pulse-ring"
        >
            <svg class="w-7 h-7 fill-current" viewBox="0 0 448 512">
                <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
            </svg>
        </a>
    </div>

    <!-- Modern E-Commerce Bakery Footer -->
    <footer class="bg-[#2B221B] text-white mt-20 border-t border-amber-900/50">
        
        <!-- Top Slogan & Instant Pre-Order Banner -->
        <div class="bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#DFAC6B] text-[#241C16] py-8 px-4 shadow-inner">
            <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                <div>
                    <h3 class="font-norican text-4xl md:text-5xl font-bold">Made with Love, Enjoyed with Happiness</h3>
                    <p class="text-xs md:text-sm font-semibold text-[#241C16]/80 mt-1 max-w-xl">
                        Sajikan kehangatan rasa di setiap momen berharga bersama aneka bakes premium dari Manies Cakery.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a 
                        href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20pesan%20kue%20sekarang" 
                        target="_blank"
                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-[#241C16] hover:bg-[#15100c] text-white rounded-full text-xs font-bold shadow-xl transition-all duration-300 transform hover:scale-105"
                    >
                        <span>💬</span> Pesan Sekarang via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Footer Columns Grid -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12">
                
                <!-- Col 1: Brand & Guarantee -->
                <div class="space-y-4">
                    <img src="{{ asset('assets/maniescakery2.png') }}" alt="Manies Cakery" class="h-14 w-auto object-contain">
                    <p class="text-xs text-white/70 leading-relaxed">
                        Toko kue rumahan yang memproduksi brownies panggang, bolu pisang keju, cookies renyah, dan hampers eksklusif dari bahan alami berkualitas terbaik tanpa pemanis buatan.
                    </p>
                    
                    <!-- Social Media Links -->
                    <div class="flex items-center gap-3 pt-2">
                        <a 
                            href="https://wa.me/6289665314602" 
                            target="_blank" 
                            title="WhatsApp" 
                            class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1"
                        >
                            <img src="{{ asset('assets/icons/wa.png') }}" alt="WhatsApp" class="w-5 h-5">
                        </a>
                        <a 
                            href="https://www.instagram.com/manies.cakery/" 
                            target="_blank" 
                            title="Instagram" 
                            class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1"
                        >
                            <img src="{{ asset('assets/icons/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                        </a>
                        <a 
                            href="#" 
                            title="GoFood / GrabFood" 
                            class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1"
                        >
                            <img src="{{ asset('assets/icons/gojek.icon.png') }}" alt="GoFood" class="w-5 h-5">
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-5 flex items-center gap-2">
                        <span>🍰</span> Menu & Kategori
                    </h4>
                    <ul class="space-y-3 text-xs text-white/80">
                        <li><a href="{{ route('produk.index', '*') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Semua Katalog Produk</a></li>
                        <li><a href="{{ route('produk.index', 'Brownies') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Brownies Panggang Fudgy</a></li>
                        <li><a href="{{ route('produk.index', 'Cake') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Kue Ulang Tahun & Bolu</a></li>
                        <li><a href="{{ route('produk.index', 'Cookies') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Cookies & Browkies</a></li>
                        <li><a href="{{ route('produk.index', 'Hampers') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Paket Hampers Hadiah</a></li>
                        <li><a href="{{ route('about.index') }}" class="hover:text-[#DFAC6B] transition flex items-center gap-1.5"><span>&bull;</span> Tentang Manies Cakery</a></li>
                    </ul>
                </div>

                <!-- Col 3: Services & Operation -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-5 flex items-center gap-2">
                        <span>🕒</span> Layanan & Buka
                    </h4>
                    <ul class="space-y-3.5 text-xs text-white/80">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">📅</span>
                            <span><strong>Jam Operasional:</strong><br>Senin - Minggu: 08.00 - 20.00 WIB</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">🎂</span>
                            <span><strong>Custom Cake:</strong><br>Pemesanan H-1 / H-2 sebelumnya</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">🛵</span>
                            <span><strong>Pengiriman:</strong><br>Melayani pesan antar area Kota Batam</span>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Payment Methods -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-5 flex items-center gap-2">
                        <span>📍</span> Kontak & Lokasi
                    </h4>
                    <div class="space-y-3 text-xs text-white/80">
                        <p class="flex items-center gap-2">
                            <span class="text-[#DFAC6B]">📱</span> 
                            <span>+62 896-6531-4602 (WhatsApp)</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-[#DFAC6B]">📸</span> 
                            <span>@manies.cakery</span>
                        </p>
                        <p class="flex items-start gap-2">
                            <span class="text-[#DFAC6B]">🏠</span> 
                            <span>Batam, Kepulauan Riau, Indonesia</span>
                        </p>
                    </div>

                    <!-- Payment Partner Chips -->
                    <div class="mt-6 pt-4 border-t border-white/10">
                        <p class="text-[10px] text-white/50 uppercase font-semibold mb-2">Metode Pembayaran:</p>
                        <div class="flex flex-wrap gap-2 text-[11px] font-bold text-white/80">
                            <span class="px-2.5 py-1 bg-white/10 rounded-lg border border-white/10">QRIS</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-lg border border-white/10">BCA</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-lg border border-white/10">Mandiri</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-lg border border-white/10">Cash</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="border-t border-white/10 bg-[#1E1712] py-5 px-4 text-center text-xs text-white/50">
            <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-2">
                <p>&copy; {{ date('Y') }} <strong>Manies Cakery</strong>. All rights reserved.</p>
                <p class="text-[11px] text-white/40">PBL IF 2A Malam • Politeknik Negeri Batam</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeMenuIcon = document.getElementById('closeMenuIcon');

            if (menuBtn && menu) {
                menuBtn.addEventListener('click', () => {
                    const isHidden = menu.classList.toggle('hidden');
                    if (hamburgerIcon && closeMenuIcon) {
                        hamburgerIcon.classList.toggle('hidden', !isHidden);
                        closeMenuIcon.classList.toggle('hidden', isHidden);
                    }
                });
            }
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>

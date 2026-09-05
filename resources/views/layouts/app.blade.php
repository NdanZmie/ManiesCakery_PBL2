<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Manies Cakery - Toko kue, brownies, cookies, dan hampers homemade premium. Dibuat segar dengan bahan alami berkualitas terbaik.">
    <title>@yield('title', 'Manies Cakery - Toko Kue & Pastry Homemade')</title>

    <!-- Google Fonts: Poppins & Norican -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
    <script src="{{ asset('js/flowbite.min.js') }}" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-[#F8F5F0] text-gray-800 flex flex-col min-h-screen font-sans antialiased selection:bg-[#DFAC6B] selection:text-white">

    <!-- Top Announcement Bar (Optional promotional strip) -->
    <div class="bg-[#3A2E26] text-[#DFAC6B] text-[11px] md:text-xs py-1.5 px-4 text-center font-medium tracking-wide">
        <span>✨ Nikmati aneka kreasi brownies & kue segar setiap hari • Pesan via WhatsApp 0896-6531-4602</span>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-[#493C32]/95 backdrop-blur-md sticky top-0 z-50 shadow-md border-b border-white/10 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <img 
                        src="{{ asset('assets/maniescakery2.png') }}" 
                        alt="Manies Cakery Logo" 
                        class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                    >
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                    <a 
                        href="/" 
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->is('/') ? 'text-[#DFAC6B] bg-white/10 shadow-inner' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
                    >
                        Beranda
                    </a>
                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('produk.*') ? 'text-[#DFAC6B] bg-white/10 shadow-inner' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
                    >
                        Katalog Produk
                    </a>
                    <a 
                        href="{{ route('about.index') }}" 
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('about.*') ? 'text-[#DFAC6B] bg-white/10 shadow-inner' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
                    >
                        Tentang Kami
                    </a>
                </nav>

                <!-- Desktop User & Auth Actions -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <!-- Admin Dashboard Button -->
                        @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-amber-900 bg-[#DFAC6B] hover:bg-[#c99859] transition shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        @endif

                        <!-- User Profile Info Chip -->
                        <div class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-xl bg-white/10 border border-white/15 text-white">
                            <div class="w-7 h-7 rounded-lg bg-[#DFAC6B] text-[#493C32] font-bold text-xs flex items-center justify-center uppercase shadow-sm">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="text-xs font-semibold leading-tight max-w-[100px] truncate text-white">
                                    {{ Auth::user()->username }}
                                </span>
                                <span class="text-[10px] text-[#DFAC6B] leading-none uppercase font-medium">
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
                                class="p-2.5 rounded-xl text-white/80 hover:text-rose-400 hover:bg-white/10 transition duration-200 cursor-pointer"
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
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-xs font-bold text-[#493C32] bg-[#DFAC6B] hover:bg-[#c99859] transition shadow-md hover:shadow-lg transform active:scale-95"
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
                        class="p-2 rounded-xl text-white/90 hover:text-[#DFAC6B] hover:bg-white/10 focus:outline-none transition cursor-pointer"
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

        <!-- Mobile Navigation Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#3D322A] border-t border-white/10 px-4 pt-3 pb-6 space-y-2 transition-all duration-200">
            <a 
                href="/" 
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->is('/') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                Beranda
            </a>
            <a 
                href="{{ route('produk.index', '*') }}" 
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('produk.*') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                Katalog Produk
            </a>
            <a 
                href="{{ route('about.index') }}" 
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('about.*') ? 'text-[#DFAC6B] bg-white/10' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                Tentang Kami
            </a>

            <div class="pt-3 border-t border-white/10 space-y-2">
                @auth
                    <div class="flex items-center justify-between px-4 py-2 bg-white/5 rounded-xl text-white">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-[#DFAC6B] text-[#493C32] font-bold text-xs flex items-center justify-center uppercase">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <span class="text-xs font-semibold">{{ Auth::user()->username }} ({{ Auth::user()->role }})</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-rose-400 font-bold hover:underline">Keluar</button>
                        </form>
                    </div>

                    @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="block text-center py-2.5 rounded-xl text-xs font-bold text-amber-900 bg-[#DFAC6B]"
                        >
                            Buka Dashboard Admin
                        </a>
                    @endif
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="block text-center py-2.5 rounded-xl text-xs font-bold text-[#493C32] bg-[#DFAC6B]"
                    >
                        Masuk / Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Global Toast / Alert Notifications -->
    @if(session('success') || session('error') || session('status'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        @if(session('success'))
            <div class="flex items-center justify-between p-4 text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-2xl shadow-sm animate-fade-in" role="alert">
                <div class="flex items-center gap-2.5">
                    <span class="text-emerald-600 text-lg">✓</span>
                    <span class="text-xs md:text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-sm font-bold ml-4">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center justify-between p-4 text-rose-800 bg-rose-50 border border-rose-200 rounded-2xl shadow-sm animate-fade-in" role="alert">
                <div class="flex items-center gap-2.5">
                    <span class="text-rose-600 text-lg">⚠</span>
                    <span class="text-xs md:text-sm font-semibold">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700 text-sm font-bold ml-4">✕</button>
            </div>
        @endif
    </div>
    @endif

    <!-- Main Body Content Container -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @yield('content')
    </main>

    <!-- Modern E-Commerce Bakery Footer -->
    <footer class="bg-[#3D322A] text-white mt-16 border-t border-amber-900/40">
        
        <!-- Top Slogan Banner -->
        <div class="bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#DFAC6B] text-[#493C32] py-6 px-4">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
                <div>
                    <h3 class="font-norican text-3xl md:text-4xl font-bold">Made with Love, Enjoyed with Happiness</h3>
                    <p class="text-xs md:text-sm font-medium text-[#493C32]/80 mt-0.5">Sajikan kehangatan rasa di setiap momen berharga bersama Manies Cakery.</p>
                </div>
                <a 
                    href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20tanya%20produk%20dan%20pemesanan" 
                    target="_blank"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#493C32] text-white hover:bg-[#2e241e] rounded-2xl text-xs font-bold shadow-md transition-all duration-200 transform hover:scale-105"
                >
                    <span>💬</span> Chat WhatsApp Sekarang
                </a>
            </div>
        </div>

        <!-- Main Footer Links Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">
                
                <!-- Col 1: Brand & Bio -->
                <div class="space-y-4">
                    <img src="{{ asset('assets/maniescakery2.png') }}" alt="Manies Cakery" class="h-12 w-auto object-contain">
                    <p class="text-xs text-white/70 leading-relaxed">
                        Toko kue rumahan yang memproduksi brownies panggang, bolu pisang keju, cookies renyah, dan hampers istimewa dari bahan berkualitas tinggi.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a 
                            href="https://wa.me/6289665314602" 
                            target="_blank" 
                            title="WhatsApp" 
                            class="w-9 h-9 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#493C32] flex items-center justify-center transition-all duration-200"
                        >
                            <img src="{{ asset('assets/icons/wa.png') }}" alt="WhatsApp" class="w-5 h-5">
                        </a>
                        <a 
                            href="https://www.instagram.com/manies.cakery/" 
                            target="_blank" 
                            title="Instagram" 
                            class="w-9 h-9 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#493C32] flex items-center justify-center transition-all duration-200"
                        >
                            <img src="{{ asset('assets/icons/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                        </a>
                        <a 
                            href="#" 
                            title="Gojek / GoFood" 
                            class="w-9 h-9 rounded-xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#493C32] flex items-center justify-center transition-all duration-200"
                        >
                            <img src="{{ asset('assets/icons/gojek.icon.png') }}" alt="GoFood" class="w-5 h-5">
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-4">Navigasi Cepat</h4>
                    <ul class="space-y-2.5 text-xs text-white/80">
                        <li><a href="/" class="hover:text-[#DFAC6B] transition">Beranda</a></li>
                        <li><a href="{{ route('produk.index', '*') }}" class="hover:text-[#DFAC6B] transition">Semua Katalog</a></li>
                        <li><a href="{{ route('produk.index', 'Brownies') }}" class="hover:text-[#DFAC6B] transition">Brownies Panggang</a></li>
                        <li><a href="{{ route('produk.index', 'Cake') }}" class="hover:text-[#DFAC6B] transition">Kue Ulang Tahun & Cake</a></li>
                        <li><a href="{{ route('produk.index', 'Cookies') }}" class="hover:text-[#DFAC6B] transition">Cookies & Pastry</a></li>
                        <li><a href="{{ route('produk.index', 'Hampers') }}" class="hover:text-[#DFAC6B] transition">Paket Hampers Spesial</a></li>
                        <li><a href="{{ route('about.index') }}" class="hover:text-[#DFAC6B] transition">Tentang Manies Cakery</a></li>
                    </ul>
                </div>

                <!-- Col 3: Services & Operation -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-4">Layanan & Jam Buka</h4>
                    <ul class="space-y-2.5 text-xs text-white/80">
                        <li class="flex items-start gap-2">
                            <span class="text-[#DFAC6B]">🕒</span>
                            <span><strong>Senin - Minggu:</strong><br>08.00 - 20.00 WIB</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#DFAC6B]">📦</span>
                            <span>Menerima Custom Cake (Pemesanan H-1/H-2)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#DFAC6B]">🛵</span>
                            <span>Layanan Pengiriman Kota Batam & Sekitarnya</span>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Order -->
                <div>
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider mb-4">Kontak & Lokasi</h4>
                    <p class="text-xs text-white/70 leading-relaxed mb-3">
                        Punya pertanyaan atau ingin memesan untuk acara spesial? Hubungi kami langsung:
                    </p>
                    <div class="space-y-2 text-xs text-white/80">
                        <p class="flex items-center gap-2">
                            <span class="text-[#DFAC6B]">📱</span> 
                            <span>+62 896-6531-4602</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-[#DFAC6B]">📍</span> 
                            <span>Batam, Kepulauan Riau, Indonesia</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="border-t border-white/10 bg-[#322822] py-4 px-4 text-center text-xs text-white/60">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
                <p>&copy; {{ date('Y') }} Manies Cakery. All rights reserved.</p>
                <p class="text-[11px] text-white/40">Made with ❤️ for PBL Project IF 2A</p>
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

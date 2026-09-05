<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<body class="bg-[#FAF7F2] text-[#332B25] flex flex-col min-h-screen font-sans antialiased selection:bg-[#DFAC6B] selection:text-[#241C16]">

    <!-- Top Announcement & Store Info Bar (Glass Theme) -->
    <div class="glass-topbar text-[#DFAC6B] text-[11px] md:text-xs py-2 px-4 shadow-sm relative z-50">
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-3 md:gap-5 text-center sm:text-left text-white/80">
                <span class="inline-flex items-center gap-1.5 bg-white/5 px-2.5 py-0.5 rounded-full border border-white/10 backdrop-blur-md">
                    <span class="text-amber-400">📍</span> Batam, Kepri
                </span>
                <span class="hidden md:inline text-white/20">•</span>
                <span class="hidden md:inline-flex items-center gap-1.5 bg-white/5 px-2.5 py-0.5 rounded-full border border-white/10 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Buka Setiap Hari (08.00 - 20.00 WIB)
                </span>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-white/90 font-medium hidden sm:inline">✨ Freshly Baked Daily</span>
                <span class="text-white/20 hidden sm:inline">•</span>
                <a 
                    href="https://wa.me/6289665314602" 
                    target="_blank" 
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 hover:bg-[#DFAC6B] text-[#DFAC6B] hover:text-[#241C16] border border-white/15 transition-all duration-300 font-semibold shadow-sm"
                >
                    <span>📱 WA: 0896-6531-4602</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header with Frosted Glass Theme -->
    <header class="glass-nav sticky top-0 z-50 shadow-2xl transition-all duration-300">
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo with Glowing Hover Accent -->
                <a href="/" class="flex items-center gap-3 group relative">
                    <div class="relative py-1">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery Logo" 
                            class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105 filter drop-shadow-[0_4px_12px_rgba(223,172,107,0.3)]"
                        >
                    </div>
                </a>

                <!-- Desktop Navigation Links (Floating Glass Pill Container) -->
                <nav class="hidden md:flex items-center gap-1.5 glass-pill p-1.5 rounded-full shadow-inner">
                    <a 
                        href="/" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->is('/') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/20' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        Beranda
                    </a>
                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->routeIs('produk.*') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/20' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        Katalog Produk
                    </a>
                    <a 
                        href="{{ route('about.index') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 {{ request()->routeIs('about.*') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/20' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        Tentang Kami
                    </a>
                </nav>

                <!-- Desktop User & Action Buttons (Glass Theme) -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <!-- Admin Dashboard Button -->
                        @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#F1CF9B] hover:brightness-105 transition-all shadow-md shadow-amber-500/20 transform hover:-translate-y-0.5"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        @endif

                        <!-- User Profile Frosted Glass Chip -->
                        <div class="flex items-center gap-2 pl-2 pr-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-white shadow-inner">
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
                                class="p-2.5 rounded-full text-white/70 hover:text-rose-400 hover:bg-white/10 border border-transparent hover:border-white/10 transition-all duration-200 cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <!-- Guest Login Button (Glowing Glass Pill) -->
                        <a 
                            href="{{ route('login') }}" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#EBC690] to-[#DFAC6B] hover:shadow-amber-500/30 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 border border-white/30"
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
                        class="p-2.5 rounded-xl text-white hover:text-[#DFAC6B] hover:bg-white/10 border border-white/10 focus:outline-none transition cursor-pointer"
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

        <!-- Mobile Navigation Menu Drawer (Frosted Glass) -->
        <div id="mobileMenu" class="hidden md:hidden glass-nav border-t border-white/10 px-4 pt-4 pb-6 space-y-2 transition-all duration-300">
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
                    <div class="flex items-center justify-between px-4 py-2.5 bg-white/10 border border-white/15 rounded-xl text-white">
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
            <div class="flex items-center justify-between p-4 text-emerald-900 bg-emerald-50/90 border border-emerald-200/80 rounded-2xl shadow-sm backdrop-blur-md" role="alert">
                <div class="flex items-center gap-3">
                    <span class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">✓</span>
                    <span class="text-xs md:text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-sm font-bold ml-4 p-1">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center justify-between p-4 text-rose-900 bg-rose-50/90 border border-rose-200/80 rounded-2xl shadow-sm backdrop-blur-md" role="alert">
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
            class="relative flex items-center justify-center w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl transition-all duration-300 transform hover:scale-110 animate-pulse-ring border-2 border-white/40"
        >
            <svg class="w-7 h-7 fill-current" viewBox="0 0 448 512">
                <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
            </svg>
        </a>
    </div>

    <!-- Modern E-Commerce Bakery Footer (Frosted Glass Theme) -->
    <footer class="relative bg-[#18120e] text-white mt-24 border-t border-white/10 overflow-hidden">
        
        <!-- Ambient Background Glow Gradients -->
        <div class="absolute -top-40 left-1/4 w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-40 right-1/4 w-[500px] h-[500px] bg-amber-600/10 rounded-full blur-[120px] pointer-events-none"></div>

        <!-- Top Slogan & Instant Pre-Order Banner (Floating Glass Card) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 pt-12 pb-6">
            <div class="glass-card-gold text-[#241C16] p-8 md:p-12 rounded-3xl shadow-2xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left">
                <!-- Background pattern -->
                <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-white/20 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-2xl space-y-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/15 text-[#241C16] font-bold text-xs uppercase tracking-wider">
                        <span>✨</span> Order Instan via WhatsApp
                    </span>
                    <h3 class="font-norican text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">
                        Made with Love, Enjoyed with Happiness
                    </h3>
                    <p class="text-xs sm:text-sm font-semibold text-[#241C16]/85 max-w-xl">
                        Sajikan kehangatan rasa di setiap momen berharga bersama aneka brownies fudgy, cookies, dan cake premium dari Manies Cakery.
                    </p>
                </div>

                <div class="relative z-10 flex flex-wrap items-center justify-center gap-3">
                    <a 
                        href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20pesan%20kue%20sekarang" 
                        target="_blank" 
                        class="inline-flex items-center gap-2.5 px-8 py-4 bg-[#241C16] hover:bg-black text-white rounded-full text-xs sm:text-sm font-extrabold shadow-2xl transition-all duration-300 transform hover:scale-105 active:scale-95 border border-white/20"
                    >
                        <span>💬</span>
                        <span>Pesan Sekarang via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Footer Columns Grid (4 Glass Cards) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                
                <!-- Col 1: Brand & Socials (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-5 hover:border-amber-400/30 transition-all duration-300">
                    <div class="space-y-3">
                        <img src="{{ asset('assets/maniescakery2.png') }}" alt="Manies Cakery" class="h-14 w-auto object-contain filter drop-shadow-[0_4px_12px_rgba(223,172,107,0.3)]">
                        <p class="text-xs text-white/70 leading-relaxed font-light">
                            Toko kue rumahan yang memproduksi brownies panggang, bolu pisang keju, butter cookies renyah, dan hampers eksklusif dari bahan alami berkualitas tanpa pemanis buatan.
                        </p>
                    </div>

                    <div class="pt-2">
                        <p class="text-[10px] text-[#DFAC6B] font-bold uppercase tracking-wider mb-2.5">Temukan Kami:</p>
                        <div class="flex items-center gap-2.5">
                            <a 
                                href="https://wa.me/6289665314602" 
                                target="_blank" 
                                title="WhatsApp" 
                                class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] border border-white/15 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 shadow-sm"
                            >
                                <img src="{{ asset('assets/icons/wa.png') }}" alt="WhatsApp" class="w-5 h-5">
                            </a>
                            <a 
                                href="https://www.instagram.com/manies.cakery/" 
                                target="_blank" 
                                title="Instagram" 
                                class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] border border-white/15 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 shadow-sm"
                            >
                                <img src="{{ asset('assets/icons/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                            </a>
                            <a 
                                href="#" 
                                title="Gojek / Grab" 
                                class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-[#DFAC6B] hover:text-[#241C16] border border-white/15 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 shadow-sm"
                            >
                                <img src="{{ asset('assets/icons/gojek.icon.png') }}" alt="GoFood" class="w-5 h-5">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Quick Links (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/30 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>🍰</span> Menu & Kategori
                    </h4>
                    <ul class="space-y-2.5 text-xs text-white/80 font-light">
                        <li><a href="{{ route('produk.index', '*') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Semua Katalog Produk</a></li>
                        <li><a href="{{ route('produk.index', 'Brownies') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Brownies Panggang Fudgy</a></li>
                        <li><a href="{{ route('produk.index', 'Cake') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Kue Ulang Tahun & Bolu</a></li>
                        <li><a href="{{ route('produk.index', 'Cookies') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Cookies & Browkies</a></li>
                        <li><a href="{{ route('produk.index', 'Hampers') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Paket Hampers Hadiah</a></li>
                        <li><a href="{{ route('about.index') }}" class="hover:text-[#DFAC6B] hover:translate-x-1 transition-all inline-flex items-center gap-2"><span>&rarr;</span> Tentang Manies Cakery</a></li>
                    </ul>
                </div>

                <!-- Col 3: Services & Operation (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/30 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>🕒</span> Layanan & Operasional
                    </h4>
                    <ul class="space-y-3 text-xs text-white/80 font-light">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">📅</span>
                            <div>
                                <strong class="text-white font-semibold">Jam Operasional:</strong>
                                <p class="text-white/70">Senin - Minggu: 08.00 - 20.00 WIB</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">🎂</span>
                            <div>
                                <strong class="text-white font-semibold">Custom Cake:</strong>
                                <p class="text-white/70">Pemesanan H-1 / H-2 sebelumnya</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#DFAC6B] text-sm">🛵</span>
                            <div>
                                <strong class="text-white font-semibold">Pengiriman:</strong>
                                <p class="text-white/70">Pesan antar seluruh wilayah Kota Batam</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Payment Methods (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/30 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>📍</span> Kontak & Lokasi
                    </h4>
                    <div class="space-y-2.5 text-xs text-white/80 font-light">
                        <p class="flex items-center gap-2">
                            <span class="text-[#DFAC6B]">📱</span> 
                            <span>+62 896-6531-4602</span>
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

                    <!-- Payment Partner Glass Badges -->
                    <div class="pt-3 border-t border-white/10">
                        <p class="text-[10px] text-white/50 uppercase font-semibold mb-2">Metode Pembayaran:</p>
                        <div class="flex flex-wrap gap-1.5 text-[11px] font-bold text-white/90">
                            <span class="px-2.5 py-1 bg-white/10 rounded-xl border border-white/15 backdrop-blur-md">QRIS</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-xl border border-white/15 backdrop-blur-md">BCA</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-xl border border-white/15 backdrop-blur-md">Mandiri</span>
                            <span class="px-2.5 py-1 bg-white/10 rounded-xl border border-white/15 backdrop-blur-md">Cash</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Bar (Floating Glass Strip) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 pb-8">
            <div class="glass-pill py-4 px-6 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/60">
                <p>&copy; {{ date('Y') }} <strong class="text-white font-semibold">Manies Cakery</strong>. All rights reserved.</p>
                <div class="flex items-center gap-3 text-[11px] text-white/40">
                    <span>Freshly Baked in Batam</span>
                    <span>•</span>
                    <span>PBL IF 2A Malam • Polibatam</span>
                </div>
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

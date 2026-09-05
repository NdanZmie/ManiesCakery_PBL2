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
            <div class="flex items-center gap-3 md:gap-4 text-center sm:text-left text-white/80">
                <span class="inline-flex items-center gap-1.5 bg-white/5 hover:bg-white/10 px-3 py-0.5 rounded-full border border-white/10 backdrop-blur-md transition-colors">
                    <span class="text-amber-400">📍</span> 
                    <span class="font-medium text-white/90">Batam, Kepri</span>
                </span>
                <span class="hidden md:inline text-white/20">•</span>
                <span class="hidden md:inline-flex items-center gap-2 bg-white/5 hover:bg-white/10 px-3 py-0.5 rounded-full border border-white/10 backdrop-blur-md transition-colors">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="font-medium text-white/90">Buka Setiap Hari (08.00 - 20.00 WIB)</span>
                </span>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-white/90 font-medium hidden sm:inline-flex items-center gap-1.5 bg-white/5 px-2.5 py-0.5 rounded-full border border-white/10">
                    <span>✨</span>
                    <span>100% Freshly Baked Daily</span>
                </span>
                <span class="text-white/20 hidden sm:inline">•</span>
                <a 
                    href="https://wa.me/6289665314602" 
                    target="_blank" 
                    class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/10 hover:bg-[#DFAC6B] text-[#DFAC6B] hover:text-[#241C16] border border-white/15 hover:border-transparent transition-all duration-300 font-bold shadow-sm transform hover:scale-105 active:scale-95"
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
                    <div class="relative py-1 flex items-center gap-3">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery Logo" 
                            class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105 filter drop-shadow-[0_4px_16px_rgba(223,172,107,0.35)]"
                        >
                    </div>
                </a>

                <!-- Desktop Navigation Links (Floating Glass Pill Container) -->
                <nav class="hidden md:flex items-center gap-1.5 glass-pill p-1.5 rounded-full shadow-inner border border-white/15">
                    <a 
                        href="/" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 flex items-center gap-1.5 {{ request()->is('/') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BE88] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/25' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        <span>🏠</span>
                        <span>Beranda</span>
                    </a>
                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 flex items-center gap-1.5 {{ request()->routeIs('produk.*') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BE88] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/25' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        <span>🍰</span>
                        <span>Katalog Produk</span>
                    </a>
                    <a 
                        href="{{ route('about.index') }}" 
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 flex items-center gap-1.5 {{ request()->routeIs('about.*') ? 'bg-gradient-to-r from-[#DFAC6B] via-[#E8BE88] to-[#DFAC6B] text-[#241C16] shadow-md shadow-amber-500/25' : 'text-white/85 hover:text-white hover:bg-white/10' }}"
                    >
                        <span>📖</span>
                        <span>Tentang Kami</span>
                    </a>
                </nav>

                <!-- Desktop User & Action Buttons (Refactored Glass & Shine Theme) -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <!-- Admin Dashboard Button -->
                        @if (in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="btn-shine inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#F2D19F] to-[#DFAC6B] hover:brightness-105 transition-all shadow-md shadow-amber-500/25 transform hover:scale-105 active:scale-95 border border-amber-300/40"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        @endif

                        <!-- User Profile Frosted Glass Chip -->
                        <div class="flex items-center gap-2.5 pl-2.5 pr-4 py-1.5 rounded-full bg-white/10 hover:bg-white/15 border border-white/15 hover:border-amber-400/30 backdrop-blur-md text-white shadow-inner transition-colors">
                            <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#DFAC6B] to-[#C29456] text-[#241C16] font-extrabold text-xs flex items-center justify-center uppercase shadow-inner">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="text-xs font-bold leading-tight max-w-[110px] truncate text-white">
                                    {{ Auth::user()->username }}
                                </span>
                                <span class="text-[10px] text-[#DFAC6B] leading-none uppercase font-extrabold">
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
                                class="p-2.5 rounded-full text-white/70 hover:text-rose-400 bg-white/5 hover:bg-rose-500/15 border border-white/10 hover:border-rose-400/40 transition-all duration-300 transform hover:scale-105 active:scale-95 cursor-pointer shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <!-- Guest Login Button (Refactored Glowing Glass Pill) -->
                        <a 
                            href="{{ route('login') }}" 
                            class="btn-shine inline-flex items-center gap-2.5 px-6 py-2.5 rounded-full text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#EBC690] to-[#C9934E] hover:shadow-amber-500/40 hover:shadow-xl transition-all duration-300 transform hover:scale-105 active:scale-95 border border-white/40 cursor-pointer"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
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
                        class="p-2.5 rounded-2xl text-white hover:text-[#DFAC6B] bg-white/5 hover:bg-white/10 border border-white/15 focus:outline-none transition-all cursor-pointer"
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
                class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold {{ request()->is('/') ? 'text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#E8BE88] shadow-md' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>🏠</span> 
                <span>Beranda</span>
            </a>
            <a 
                href="{{ route('produk.index', '*') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold {{ request()->routeIs('produk.*') ? 'text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#E8BE88] shadow-md' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>🍰</span> 
                <span>Katalog Produk</span>
            </a>
            <a 
                href="{{ route('about.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold {{ request()->routeIs('about.*') ? 'text-[#241C16] bg-gradient-to-r from-[#DFAC6B] to-[#E8BE88] shadow-md' : 'text-white/90 hover:text-[#DFAC6B] hover:bg-white/5' }}"
            >
                <span>📖</span> 
                <span>Tentang Kami</span>
            </a>

            <div class="pt-4 border-t border-white/10 space-y-3">
                @auth
                    <div class="flex items-center justify-between px-4 py-3 bg-white/10 border border-white/15 rounded-2xl text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#DFAC6B] to-[#C29456] text-[#241C16] font-bold text-xs flex items-center justify-center uppercase shadow-md">
                                {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                            </div>
                            <div class="text-left">
                                <p class="text-xs font-bold leading-tight">{{ Auth::user()->username }}</p>
                                <p class="text-[10px] text-[#DFAC6B] font-extrabold uppercase">{{ Auth::user()->role }}</p>
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
                            class="block text-center py-3 rounded-2xl text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#E8BE88] to-[#DFAC6B] shadow-lg shadow-amber-500/25 border border-white/30"
                        >
                            📊 Buka Dashboard Admin
                        </a>
                    @endif
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="btn-shine block text-center py-3 rounded-2xl text-xs font-extrabold text-[#241C16] bg-gradient-to-r from-[#DFAC6B] via-[#EBC690] to-[#C9934E] shadow-lg shadow-amber-500/25 border border-white/30"
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
        <!-- Floating Tooltip Popover (Desktop) -->
        <div class="hidden sm:flex items-center gap-2 px-3.5 py-2 rounded-2xl bg-[#1E1611]/95 text-white text-xs font-semibold shadow-2xl border border-white/15 backdrop-blur-md opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300 pointer-events-none">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <span>👋 Tanya kue / custom cake? Chat WhatsApp yuk!</span>
        </div>
        
        <a 
            href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20tanya%20produk%20dan%20pemesanan%20kue" 
            target="_blank"
            title="Chat WhatsApp Kami"
            class="relative flex items-center justify-center w-14 h-14 bg-gradient-to-tr from-emerald-600 to-emerald-400 hover:from-emerald-500 hover:to-emerald-300 text-white rounded-full shadow-2xl shadow-emerald-500/40 transition-all duration-300 transform hover:scale-110 active:scale-95 animate-pulse-ring border-2 border-white/40"
        >
            <svg class="w-7 h-7 fill-current drop-shadow-md" viewBox="0 0 448 512">
                <path d="M380.9 97.1C339-2.5 231.9-33.8 144.8 6.7C84.7 33.7 44.2 95.1 48.7 161.4c2.2 31.3 11.1 62.1 25.8 89.9L32.8 480l234.5-65.8c24.7 7 50.4 10.7 76.1 10.7c88.7 0 164.5-59.6 185.6-144.6c15.5-64.2-2.7-132.6-56.1-183.2zM229.6 377.4c-32.5-1.5-64.3-9.8-93.1-24.6l-8.2-4.4l-69 19.3l18.4-67.4l-4.3-8.3c-14.5-28-22.1-59.2-22-91.1c.5-102.5 83.8-185.5 186.3-184.9c49.7.2 96.3 19.9 131.3 55c35.2 35.4 54.7 82.2 54.5 131.9c-.4 102.6-83.8 185.4-186.4 185.1zm101.3-138.4c-5.5-2.8-32.6-16.1-37.7-17.9c-5.1-1.9-8.8-2.8-12.6 2.8c-3.7 5.6-14.5 17.9-17.8 21.6c-3.3 3.7-6.6 4.2-12.1 1.4c-33.1-16.5-54.8-29.5-76.6-66.8c-5.8-9.9 5.8-9.2 16.5-30.6c1.8-3.7.9-6.9-.5-9.6c-1.4-2.8-12.6-30.3-17.3-41.5c-4.6-11.2-9.3-9.6-12.6-9.8c-3.2-.2-6.9-.2-10.5-.2s-9.6 1.4-14.6 6.9c-5.1 5.6-19.3 18.9-19.3 46s19.8 53.5 22.5 57.2c2.8 3.7 38.8 59.2 94.1 83.1c13.2 5.7 23.5 9.1 31.5 11.6c13.2 4.2 25.2 3.6 34.7 2.2c10.6-1.6 32.6-13.3 37.2-26.2c4.6-13 4.6-24.1 3.2-26.3c-1.3-2.2-5-3.6-10.5-6.3z"/>
            </svg>
            <!-- Live Dot -->
            <span class="absolute top-1 right-1 w-3.5 h-3.5 bg-white rounded-full flex items-center justify-center shadow-md">
                <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></span>
            </span>
        </a>
    </div>

    <!-- Modern E-Commerce Bakery Footer (Frosted Glass & Warm Cocoa Theme) -->
    <footer class="relative bg-gradient-to-b from-[#19120D] via-[#120D09] to-[#0A0705] text-white mt-24 border-t border-amber-900/30 overflow-hidden">
        
        <!-- Ambient Background Glow Gradients -->
        <div class="absolute -top-40 left-1/4 w-[600px] h-[600px] bg-[#DFAC6B]/10 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute -bottom-40 right-1/4 w-[600px] h-[600px] bg-amber-600/10 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-amber-900/5 rounded-full blur-[160px] pointer-events-none"></div>

        <!-- Top Slogan & Instant Pre-Order Banner (Floating Glass Card) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 pt-12 pb-6">
            <div class="glass-card-gold text-[#241C16] p-8 md:p-12 rounded-[2.5rem] shadow-2xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left border border-white/50">
                <!-- Background decorative elements -->
                <div class="absolute -right-16 -bottom-16 w-72 h-72 bg-white/25 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -left-16 -top-16 w-60 h-60 bg-amber-300/30 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-2xl space-y-2.5">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/15 text-[#241C16] font-extrabold text-xs uppercase tracking-wider backdrop-blur-md border border-black/10">
                        <span class="text-sm">✨</span> 
                        <span>Order Instan & Fast Response WhatsApp</span>
                    </div>
                    <h3 class="font-norican text-4xl sm:text-5xl md:text-6xl font-bold leading-tight drop-shadow-sm text-[#241C16]">
                        Made with Love, Enjoyed with Happiness
                    </h3>
                    <p class="text-xs sm:text-sm font-semibold text-[#241C16]/85 max-w-xl leading-relaxed">
                        Sajikan kehangatan rasa di setiap momen istimewa bersama aneka brownies fudgy, crunchy cookies, dan custom cake premium dari Manies Cakery.
                    </p>
                </div>

                <!-- Refactored CTA Action Buttons -->
                <div class="relative z-10 flex flex-wrap items-center justify-center gap-3.5">
                    <a 
                        href="https://wa.me/6289665314602?text=Halo%20Manies%20Cakery%2C%20saya%20ingin%20pesan%20kue%20sekarang" 
                        target="_blank" 
                        class="btn-shine inline-flex items-center gap-3 px-8 py-4 bg-[#241C16] hover:bg-black text-white rounded-full text-xs sm:text-sm font-extrabold shadow-2xl shadow-black/40 transition-all duration-300 transform hover:scale-105 active:scale-95 border border-amber-300/30 cursor-pointer"
                    >
                        <span class="text-base">💬</span>
                        <span>Pesan Sekarang via WhatsApp</span>
                        <span class="text-xs font-bold text-[#DFAC6B]">&rarr;</span>
                    </a>

                    <a 
                        href="{{ route('produk.index', '*') }}" 
                        class="inline-flex items-center gap-2 px-6 py-4 bg-white/20 hover:bg-white/35 text-[#241C16] rounded-full text-xs sm:text-sm font-extrabold backdrop-blur-md border border-white/40 shadow-md transition-all duration-300 transform hover:scale-105 active:scale-95 cursor-pointer"
                    >
                        <span>🍰</span>
                        <span>Lihat Semua Menu</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Footer Columns Grid (4 Modern Glass Cards) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                
                <!-- Col 1: Brand & Socials (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-5 hover:border-amber-400/40 transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-3.5">
                        <div class="relative inline-block py-1">
                            <img src="{{ asset('assets/maniescakery2.png') }}" alt="Manies Cakery" class="h-14 w-auto object-contain filter drop-shadow-[0_4px_16px_rgba(223,172,107,0.35)] transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <p class="text-xs text-white/70 leading-relaxed font-light">
                            Toko kue rumahan terpercaya di Batam yang menghadirkan aneka brownies panggang fudgy, bolu pisang keju, butter cookies renyah, dan hampers eksklusif menggunakan 100% bahan alami pilihan tanpa pengawet buatan.
                        </p>
                    </div>

                    <div class="pt-3 border-t border-white/10">
                        <p class="text-[10px] text-[#DFAC6B] font-bold uppercase tracking-wider mb-3">Sosial Media & Pemesanan:</p>
                        <div class="flex items-center gap-2.5">
                            <a 
                                href="https://wa.me/6289665314602" 
                                target="_blank" 
                                title="Chat WhatsApp Resmi" 
                                class="w-11 h-11 rounded-2xl bg-white/[0.06] hover:bg-gradient-to-br hover:from-emerald-500 hover:to-emerald-600 text-white border border-white/10 hover:border-transparent flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-500/25"
                            >
                                <img src="{{ asset('assets/icons/wa.png') }}" alt="WhatsApp" class="w-5 h-5">
                            </a>
                            <a 
                                href="https://www.instagram.com/manies.cakery/" 
                                target="_blank" 
                                title="Follow Instagram @manies.cakery" 
                                class="w-11 h-11 rounded-2xl bg-white/[0.06] hover:bg-gradient-to-br hover:from-rose-500 hover:to-amber-500 text-white border border-white/10 hover:border-transparent flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-rose-500/25"
                            >
                                <img src="{{ asset('assets/icons/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                            </a>
                            <a 
                                href="https://gofood.link" 
                                target="_blank"
                                title="Pesan via GoFood" 
                                class="w-11 h-11 rounded-2xl bg-white/[0.06] hover:bg-gradient-to-br hover:from-rose-600 hover:to-red-500 text-white border border-white/10 hover:border-transparent flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-red-500/25"
                            >
                                <img src="{{ asset('assets/icons/gojek.icon.png') }}" alt="GoFood" class="w-5 h-5">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Quick Links & Menu Kategori (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/40 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>🍰</span> Menu & Kategori
                    </h4>
                    <ul class="space-y-2.5 text-xs text-white/80 font-light">
                        <li>
                            <a href="{{ route('produk.index', '*') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Semua Katalog Produk</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white/10 text-[#DFAC6B]">Katalog</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk.index', 'Brownies') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Brownies Panggang Fudgy</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-300">Favorit</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk.index', 'Cake') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Kue Ulang Tahun & Tart</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white/10 text-white/70">Custom</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk.index', 'Cookies') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Cookies & Browkies Renyah</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white/10 text-white/70">Crunchy</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk.index', 'Hampers') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Paket Gift Hampers Eksklusif</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-400/20 text-[#DFAC6B]">Gift Box</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}" class="group/link flex items-center justify-between py-1 text-white/70 hover:text-white transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-[#DFAC6B] group-hover/link:translate-x-1 transition-transform">&rarr;</span>
                                    <span>Cerita & Profil Kami</span>
                                </span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white/10 text-white/70">Tentang</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Services & Operation (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/40 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>🕒</span> Layanan & Operasional
                    </h4>
                    <ul class="space-y-3.5 text-xs text-white/80 font-light">
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-emerald-500/15 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/20 text-sm">
                                📅
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <strong class="text-white font-semibold">Jam Operasional</strong>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-[10px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Buka
                                    </span>
                                </div>
                                <p class="text-white/70 mt-0.5">Senin - Minggu: 08.00 - 20.00 WIB</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center shrink-0 border border-amber-500/20 text-sm">
                                🎂
                            </div>
                            <div>
                                <strong class="text-white font-semibold">Custom Order & Request</strong>
                                <p class="text-white/70 mt-0.5">Pemesanan H-1 / H-2 sebelumnya agar hasil fresh & maksimal.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-blue-500/15 text-blue-400 flex items-center justify-center shrink-0 border border-blue-500/20 text-sm">
                                🛵
                            </div>
                            <div>
                                <strong class="text-white font-semibold">Layanan Pengiriman</strong>
                                <p class="text-white/70 mt-0.5">Pesan antar seluruh wilayah Kota Batam & Self-Pickup di Workshop.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Payment Methods (Glass Card) -->
                <div class="glass-card-dark p-7 rounded-3xl space-y-4 hover:border-amber-400/40 transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#DFAC6B] uppercase tracking-wider flex items-center gap-2 border-b border-white/10 pb-3">
                        <span>📍</span> Kontak & Lokasi
                    </h4>
                    <div class="space-y-3 text-xs text-white/80 font-light">
                        <a 
                            href="https://wa.me/6289665314602" 
                            target="_blank" 
                            class="flex items-center gap-3 p-2.5 rounded-2xl bg-white/[0.04] hover:bg-white/10 border border-white/10 transition-all hover:border-amber-400/30 group/contact"
                        >
                            <span class="text-base text-emerald-400">📱</span> 
                            <div>
                                <span class="text-[10px] text-white/50 block">WhatsApp Official</span>
                                <span class="text-white font-bold group-hover/contact:text-[#DFAC6B] transition-colors">+62 896-6531-4602</span>
                            </div>
                        </a>
                        <a 
                            href="https://www.instagram.com/manies.cakery/" 
                            target="_blank" 
                            class="flex items-center gap-3 p-2.5 rounded-2xl bg-white/[0.04] hover:bg-white/10 border border-white/10 transition-all hover:border-amber-400/30 group/contact"
                        >
                            <span class="text-base text-rose-400">📸</span> 
                            <div>
                                <span class="text-[10px] text-white/50 block">Instagram</span>
                                <span class="text-white font-bold group-hover/contact:text-[#DFAC6B] transition-colors">@manies.cakery</span>
                            </div>
                        </a>
                        <div class="flex items-start gap-3 p-2.5 rounded-2xl bg-white/[0.04] border border-white/10">
                            <span class="text-base text-amber-400">🏠</span> 
                            <div>
                                <span class="text-[10px] text-white/50 block">Lokasi Dapur</span>
                                <span class="text-white font-semibold">Batam, Kepulauan Riau, Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Partner Glass Badges -->
                    <div class="pt-3 border-t border-white/10">
                        <p class="text-[10px] text-white/50 uppercase font-semibold mb-2 flex items-center gap-1.5">
                            <span>💳</span> Metode Pembayaran Aman:
                        </p>
                        <div class="flex flex-wrap gap-1.5 text-[11px] font-bold text-white/90">
                            <span class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-xl border border-white/15 backdrop-blur-md transition-colors shadow-sm">QRIS</span>
                            <span class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-xl border border-white/15 backdrop-blur-md transition-colors shadow-sm">BCA</span>
                            <span class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-xl border border-white/15 backdrop-blur-md transition-colors shadow-sm">Mandiri</span>
                            <span class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-xl border border-white/15 backdrop-blur-md transition-colors shadow-sm">BNI</span>
                            <span class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-xl border border-white/15 backdrop-blur-md transition-colors shadow-sm">COD</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Bar & Refactored Back-To-Top Button (Floating Glass Strip) -->
        <div class="max-w-[1720px] w-full mx-auto px-4 sm:px-6 lg:px-10 pb-8">
            <div class="glass-pill py-4 px-6 sm:px-8 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/60">
                <div class="flex items-center gap-2 text-center sm:text-left">
                    <p>&copy; {{ date('Y') }} <strong class="text-white font-semibold">Manies Cakery</strong>. All rights reserved.</p>
                </div>
                
                <div class="flex items-center gap-4 text-[11px] text-white/40">
                    <span>Freshly Baked in Batam</span>
                    <span>•</span>
                    <span>PBL IF 2A Malam • Polibatam</span>
                </div>

                <!-- Refactored Back to Top Button -->
                <button 
                    type="button" 
                    onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 hover:bg-[#DFAC6B] text-white hover:text-[#241C16] text-xs font-bold border border-white/15 hover:border-transparent transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 cursor-pointer shadow-sm"
                >
                    <span>Kembali ke Atas</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                </button>
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

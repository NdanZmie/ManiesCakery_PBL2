<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard - Manies Cakery')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Flowbite & Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
    <script src="{{ asset('js/flowbite.min.js') }}" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-[#F6F4EF] text-gray-800 flex flex-col min-h-screen font-sans antialiased">
    
    <!-- Top Admin Header -->
    <header class="bg-[#493C32] h-16 flex items-center justify-between py-4 px-6 sticky top-0 z-50 shadow-md border-b border-white/10">
        <div class="flex items-center gap-3">
            <button id="toggleSidebar" aria-label="Toggle Menu" class="border border-white/30 p-2 rounded-xl text-white hover:bg-white/10 lg:hidden cursor-pointer transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('assets/maniescakery2.png') }}" alt="Manies Cakery" class="h-9 w-auto">
                <span class="hidden sm:inline-block px-2.5 py-0.5 rounded-full bg-[#DFAC6B] text-[#493C32] text-[10px] font-extrabold uppercase tracking-wider">
                    Admin Panel
                </span>
            </a>
        </div>

        <!-- Right Side Header Controls -->
        <div class="flex items-center gap-4">
            <a 
                href="{{ route('produk.index', '*') }}" 
                class="hidden sm:inline-flex items-center gap-1.5 text-xs text-white/80 hover:text-[#DFAC6B] transition font-medium"
            >
                <span>&larr;</span> Lihat Katalog Toko
            </a>

            @auth
            <div class="flex items-center gap-2 pl-3 border-l border-white/20 text-white">
                <div class="w-8 h-8 rounded-lg bg-[#DFAC6B] text-[#493C32] font-bold text-xs flex items-center justify-center uppercase shadow-sm">
                    {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                </div>
                <div class="hidden md:flex flex-col text-left">
                    <span class="text-xs font-semibold text-white leading-tight">
                        {{ Auth::user()->username }}
                    </span>
                    <span class="text-[10px] text-[#DFAC6B] uppercase font-bold">
                        {{ Auth::user()->role }}
                    </span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline ml-2">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 text-white/70 hover:text-rose-400 hover:bg-white/10 rounded-lg transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full lg:translate-x-0 bg-white border-r border-amber-100/80 shadow-sm">
            <nav class="flex flex-col h-full py-6 px-4 justify-between">
                <div class="space-y-1.5">
                    <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>

                    <!-- Dashboard Home -->
                    <a 
                        href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#493C32] text-white shadow-md' : 'text-gray-600 hover:bg-amber-50 hover:text-amber-900' }}"
                    >
                        <span class="text-sm">📊</span>
                        <span>Ringkasan Dashboard</span>
                    </a>

                    <!-- Products Management -->
                    <a 
                        href="{{ route('dashboard.product.index') }}"
                        class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('dashboard.product.*') ? 'bg-[#493C32] text-white shadow-md' : 'text-gray-600 hover:bg-amber-50 hover:text-amber-900' }}"
                    >
                        <span class="text-sm">🍰</span>
                        <span>Kelola Produk</span>
                    </a>

                    <!-- Users Management -->
                    <a 
                        href="{{ route('usersdashboard') }}"
                        class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('users*') ? 'bg-[#493C32] text-white shadow-md' : 'text-gray-600 hover:bg-amber-50 hover:text-amber-900' }}"
                    >
                        <span class="text-sm">👥</span>
                        <span>Kelola Pengguna</span>
                    </a>
                </div>

                <!-- Bottom Sidebar Links -->
                <div class="pt-4 border-t border-gray-100 space-y-2">
                    <a 
                        href="/" 
                        class="flex items-center gap-2 px-3.5 py-2 text-xs font-semibold text-gray-600 hover:text-amber-800 hover:bg-gray-50 rounded-xl transition"
                    >
                        <span>🏠</span>
                        <span>Halaman Depan Toko</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Dashboard View Container -->
        <main class="flex-1 flex flex-col p-6 md:p-8 transition-all duration-300 lg:ml-64 max-w-full">
            @yield('content')
        </main>
    </div>

    <!-- Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            if (toggle && sidebar) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>

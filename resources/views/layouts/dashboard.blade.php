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

<body class="bg-[#F8F6F2] text-gray-800 flex flex-col min-h-screen font-sans antialiased">
    
    <!-- Modern Admin Header (Clean Dark Cocoa & Warm Gold) -->
    <header class="bg-[#18110D] h-16 md:h-18 flex items-center justify-between px-4 sm:px-8 sticky top-0 z-50 border-b border-white/10 shadow-md">
        <!-- Left: Toggle & Brand -->
        <div class="flex items-center gap-3 sm:gap-4">
            <!-- Mobile Sidebar Toggle -->
            <button 
                id="toggleSidebar" 
                type="button"
                aria-label="Toggle Sidebar Menu" 
                class="p-2 rounded-xl text-white/80 hover:text-[#DFAC6B] hover:bg-white/5 transition-colors lg:hidden cursor-pointer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Brand Logo & Workspace Info -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <img 
                    src="{{ asset('assets/maniescakery2.png') }}" 
                    alt="Manies Cakery" 
                    class="h-8 sm:h-9 md:h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                >
                <div class="hidden sm:flex flex-col border-l border-white/15 pl-3">
                    <span class="text-xs font-bold text-white tracking-wide">Admin Workspace</span>
                    <span class="text-[10px] text-[#DFAC6B] font-medium tracking-wider uppercase">Manies Cakery Portal</span>
                </div>
            </a>
        </div>

        <!-- Right: Actions & User Profile -->
        <div class="flex items-center gap-2 sm:gap-4">
            <!-- Storefront Quick Link -->
            <a 
                href="/" 
                target="_blank"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-white/70 hover:text-[#DFAC6B] hover:bg-white/5 transition-all"
                title="Buka Website Toko"
            >
                <svg class="w-4 h-4 text-[#DFAC6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span class="hidden md:inline">Lihat Toko</span>
            </a>

            <!-- Subtle Vertical Separator -->
            <div class="h-5 w-px bg-white/15 hidden sm:block"></div>

            @auth
            <!-- User Profile & Logout -->
            <div class="flex items-center gap-3">
                <!-- Avatar & Identity -->
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#DFAC6B] to-[#B88746] text-[#18110D] font-extrabold text-xs flex items-center justify-center uppercase shadow-sm">
                        {{ substr(Auth::user()->name ?: Auth::user()->username, 0, 1) }}
                    </div>
                    <div class="hidden md:flex flex-col text-left">
                        <span class="text-xs font-semibold text-white leading-tight">
                            {{ Auth::user()->username }}
                        </span>
                        <span class="text-[10px] text-[#DFAC6B] font-medium uppercase tracking-wider">
                            {{ Auth::user()->role ?? 'Admin' }}
                        </span>
                    </div>
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button 
                        type="submit" 
                        title="Keluar dari Admin" 
                        class="p-2 text-white/60 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </header>

    <div class="flex flex-1 relative">
        <!-- Mobile Sidebar Backdrop Overlay -->
        <div id="sidebarBackdrop" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden backdrop-blur-xs transition-opacity"></div>

        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="fixed top-16 md:top-18 left-0 z-40 w-64 h-[calc(100vh-4rem)] md:h-[calc(100vh-4.5rem)] transition-transform -translate-x-full lg:translate-x-0 bg-white border-r border-gray-200/80 shadow-xs flex flex-col justify-between">
            <nav class="py-5 px-3.5 space-y-1">
                <div class="px-3 pb-2 flex items-center justify-between">
                    <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Navigasi Utama</span>
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                </div>

                <!-- Dashboard Home -->
                <a 
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-[#241C16] text-[#DFAC6B] shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
                >
                    <svg class="w-4 h-4 {{ request()->routeIs('dashboard') ? 'text-[#DFAC6B]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Ringkasan Dashboard</span>
                </a>

                <!-- Products Management -->
                <a 
                    href="{{ route('dashboard.product.index') }}"
                    class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('dashboard.product.*') ? 'bg-[#241C16] text-[#DFAC6B] shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
                >
                    <svg class="w-4 h-4 {{ request()->routeIs('dashboard.product.*') ? 'text-[#DFAC6B]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span>Kelola Produk & Menu</span>
                </a>

                <!-- Users Management -->
                <a 
                    href="{{ route('usersdashboard') }}"
                    class="flex items-center gap-3 py-2.5 px-3.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('users*') ? 'bg-[#241C16] text-[#DFAC6B] shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
                >
                    <svg class="w-4 h-4 {{ request()->routeIs('users*') ? 'text-[#DFAC6B]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Kelola Pengguna</span>
                </a>
            </nav>

            <!-- Bottom Sidebar Links -->
            <div class="p-3.5 border-t border-gray-100">
                <a 
                    href="/" 
                    target="_blank"
                    class="flex items-center justify-between px-3.5 py-2.5 text-xs font-medium text-gray-500 hover:text-[#241C16] hover:bg-gray-100 rounded-xl transition-colors"
                >
                    <span class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-[#DFAC6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Halaman Toko</span>
                    </span>
                    <span class="text-xs text-gray-400">&rarr;</span>
                </a>
            </div>
        </aside>

        <!-- Main Dashboard View Container -->
        <main class="flex-1 flex flex-col p-4 sm:p-6 md:p-8 transition-all duration-300 lg:ml-64 max-w-full min-h-[calc(100vh-4.5rem)]">
            @yield('content')
        </main>
    </div>

    <!-- Toggle & Backdrop Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            
            function toggleNav() {
                if (sidebar && backdrop) {
                    sidebar.classList.toggle('-translate-x-full');
                    backdrop.classList.toggle('hidden');
                }
            }

            if (toggle) {
                toggle.addEventListener('click', toggleNav);
            }
            if (backdrop) {
                backdrop.addEventListener('click', toggleNav);
            }
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>

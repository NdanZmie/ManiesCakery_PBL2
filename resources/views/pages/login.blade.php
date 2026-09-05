@extends('layouts.app')
@section('title', 'Manies Cakery - Masuk ke Akun Anda')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-8 sm:py-12">
    
    <!-- Ambient Background Glows -->
    <div class="relative w-full max-w-5xl">
        <div class="absolute -top-12 -left-12 w-72 h-72 bg-amber-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-12 -right-12 w-72 h-72 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Main Glass Card Container -->
        <div class="relative bg-white/90 backdrop-blur-2xl rounded-3xl shadow-2xl border border-amber-200/60 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            
            <!-- Left Column: Bakery Branding & Visual Showcase (5 Cols) -->
            <div class="hidden lg:flex lg:col-span-5 relative bg-[#241C16] text-white p-10 flex-col justify-between overflow-hidden">
                <!-- Background Cover Image with Dark Vignette -->
                <div class="absolute inset-0 z-0">
                    <img 
                        src="{{ asset('assets/beranda/B1.jfif') }}" 
                        alt="Manies Cakery Bakery" 
                        class="w-full h-full object-cover brightness-[0.35] contrast-125 scale-105"
                        onerror="this.src='{{ asset('assets/banner.png') }}'"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#18120E] via-[#241C16]/70 to-transparent"></div>
                </div>

                <!-- Top: Logo & Store Identity -->
                <div class="relative z-10 space-y-4">
                    <a href="/" class="inline-block">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery" 
                            class="h-12 w-auto object-contain filter drop-shadow-[0_4px_12px_rgba(223,172,107,0.4)]"
                        >
                    </a>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-[#DFAC6B] text-[11px] font-bold uppercase tracking-wider">
                        <span>✨</span> Freshly Baked Everyday
                    </div>
                </div>

                <!-- Middle / Bottom: Inspiring Quote & Highlights -->
                <div class="relative z-10 space-y-6">
                    <div class="space-y-2">
                        <span class="text-3xl text-[#DFAC6B] font-serif leading-none block">&ldquo;</span>
                        <p class="text-lg font-serif italic text-white/90 leading-snug">
                            Cita rasa otentik yang dipanggang dengan cinta, menghadirkan senyum di setiap gigitan.
                        </p>
                        <p class="text-xs text-[#DFAC6B] font-semibold pt-1">— Dapur Manies Cakery</p>
                    </div>

                    <!-- 3 Feature Chips -->
                    <div class="pt-4 border-t border-white/15 grid grid-cols-2 gap-2 text-[11px] text-white/80 font-medium">
                        <div class="flex items-center gap-1.5">
                            <span class="text-amber-400">🧁</span> 100% Homemade
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-amber-400">🌿</span> Bahan Alami
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-amber-400">🚚</span> Pesan Antar
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-amber-400">💎</span> Cita Rasa Premium
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Login Form (7 Cols) -->
            <div class="lg:col-span-7 p-8 sm:p-12 md:p-14 flex flex-col justify-center bg-white/80 backdrop-blur-xl">
                
                <!-- Form Header -->
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-xs font-bold uppercase tracking-wider mb-3">
                        <span>👋</span> Selamat Datang
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-[#332B25] font-serif">
                        Masuk ke Akun Anda
                    </h1>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">
                        Gunakan username atau alamat email Anda yang telah terdaftar.
                    </p>
                </div>

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">⚠</span>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- Form Login --}}
                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    <!-- Username / Email Input -->
                    <div>
                        <label for="username" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Username / Email
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                value="{{ old('username') }}"
                                required 
                                placeholder="Masukkan username atau email"
                                autocomplete="username"
                                class="block w-full py-3.5 pl-11 pr-4 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-amber-900/40">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Password
                            </label>
                            <a href="{{ route('lupapassword') }}" class="text-xs font-semibold text-[#C9934E] hover:text-[#241C16] hover:underline transition-colors">
                                Lupa Password?
                            </a>
                        </div>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                required 
                                placeholder="Masukkan password Anda"
                                autocomplete="current-password"
                                class="block w-full py-3.5 pl-11 pr-12 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-amber-900/40">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <button
                                type="button"
                                onclick="togglePassword('password', this)"
                                aria-label="Lihat Password"
                                class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700 cursor-pointer p-1"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full py-4 px-6 bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#C9934E] text-[#241C16] font-extrabold text-sm rounded-2xl shadow-xl shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <span>Masuk Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="flex items-center gap-3 my-6">
                    <hr class="flex-1 border-gray-200" />
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Atau</span>
                    <hr class="flex-1 border-gray-200" />
                </div>

                <!-- Guest Login Button -->
                <div>
                    <a 
                        href="{{ route('login.guest') }}" 
                        class="w-full py-3.5 px-4 rounded-2xl border border-amber-950/20 text-[#332B25] font-bold text-xs bg-[#FAF7F2] hover:bg-[#241C16] hover:text-white transition-all duration-300 flex items-center justify-center gap-2 shadow-sm transform hover:-translate-y-0.5"
                    >
                        <span>🛍️</span>
                        <span>Masuk Instan sebagai Tamu (Guest)</span>
                    </a>
                </div>

                <!-- Register Link Footer -->
                <p class="text-xs sm:text-sm text-center text-gray-600 mt-8">
                    Belum punya akun Manies Cakery? 
                    <a href="{{ route('register') }}" class="font-bold text-[#DFAC6B] hover:text-[#C9934E] hover:underline ml-1">
                        Daftar Akun Baru Sekarang &rarr;
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(inputId, el) {
        const input = document.getElementById(inputId);
        if (!input) return;

        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";

        el.innerHTML = isPassword
            ? `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.174-3.338M9.88 9.88a3 3 0 104.24 4.24" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
               </svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
               </svg>`;
    }
</script>
@endpush

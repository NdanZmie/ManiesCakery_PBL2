@extends('layouts.app')
@section('title', 'Manies Cakery - Masuk & Pendaftaran Akun')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-10 px-4 sm:px-6">
    
    <!-- 3D Perspective Container with Ambient Glows -->
    <div class="relative w-full max-w-lg auth-perspective">
        <!-- Ambient Background Glows -->
        <div class="absolute -top-12 -left-12 w-72 h-72 bg-amber-400/20 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute -bottom-12 -right-12 w-72 h-72 bg-amber-600/15 rounded-full blur-3xl pointer-events-none -z-10"></div>

        <!-- 3D Flipper Element -->
        <div id="authCardWrapper" class="auth-flipper {{ (isset($initialMode) && $initialMode === 'register') || old('role') || $errors->has('bypass_password') || $errors->has('password_confirmation') ? 'is-flipped' : '' }}">
            
            <!-- ==========================================
                 FRONT FACE: LOGIN CARD
                 ========================================== -->
            <div id="loginCard" class="auth-card-front bg-white/95 backdrop-blur-2xl rounded-3xl shadow-2xl border border-amber-200/60 p-8 sm:p-10">
                
                <!-- Brand Logo & Header -->
                <div class="text-center mb-7">
                    <a href="/" class="inline-flex items-center justify-center mb-4 group px-6 py-3 rounded-2xl bg-[#241C16] border border-amber-500/30 shadow-xl shadow-amber-950/20 transition-all duration-300 hover:scale-105 hover:border-amber-400">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery" 
                            class="h-10 sm:h-11 w-auto mx-auto object-contain filter drop-shadow-[0_2px_8px_rgba(223,172,107,0.4)]"
                        >
                    </a>
                    
                    <h1 class="text-2xl sm:text-3xl font-bold text-[#332B25] font-serif">
                        Masuk ke Akun Anda
                    </h1>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">
                        Silakan masukkan username atau email untuk melanjutkan.
                    </p>
                </div>

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="mb-5 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-3 shadow-sm">
                        <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Error Message (Only when not in register mode) --}}
                @if ($errors->any() && !old('role') && !$errors->has('password_confirmation') && !$errors->has('bypass_password'))
                    <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3 shadow-sm">
                        <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">⚠</span>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- Form Login --}}
                <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                    @csrf

                    <!-- Username / Email Input -->
                    <div>
                        <label for="login_username" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Username / Email
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="username" 
                                id="login_username" 
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
                            <label for="login_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
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
                                id="login_password"
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
                                onclick="togglePasswordVisibility('login_password', this)"
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
                            class="w-full py-3.5 sm:py-4 px-6 bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#C9934E] text-[#241C16] font-extrabold text-sm rounded-2xl shadow-xl shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <span>Masuk Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="flex items-center gap-3 my-5">
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

                <!-- 3D Flip Trigger to Register -->
                <div class="text-center mt-6 pt-2 border-t border-gray-100">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Belum punya akun Manies Cakery?
                    </p>
                    <button 
                        type="button"
                        onclick="flipCardTo('register')"
                        class="mt-1 inline-flex items-center gap-1.5 font-bold text-[#C9934E] hover:text-[#241C16] hover:underline cursor-pointer transition-colors group text-xs sm:text-sm"
                    >
                        <span>Daftar Akun Baru Sekarang</span>
                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </button>
                </div>

            </div>

            <!-- ==========================================
                 BACK FACE: REGISTER CARD
                 ========================================== -->
            <div id="registerCard" class="auth-card-back bg-white/95 backdrop-blur-2xl rounded-3xl shadow-2xl border border-amber-200/60 p-8 sm:p-10">
                
                <!-- Brand Logo & Header -->
                <div class="text-center mb-6">
                    <a href="/" class="inline-flex items-center justify-center mb-3 group px-6 py-2.5 rounded-2xl bg-[#241C16] border border-amber-500/30 shadow-xl shadow-amber-950/20 transition-all duration-300 hover:scale-105 hover:border-amber-400">
                        <img 
                            src="{{ asset('assets/maniescakery2.png') }}" 
                            alt="Manies Cakery" 
                            class="h-9 sm:h-10 w-auto mx-auto object-contain filter drop-shadow-[0_2px_8px_rgba(223,172,107,0.4)]"
                        >
                    </a>
                    
                    <h2 class="text-2xl sm:text-3xl font-bold text-[#332B25] font-serif">
                        Daftar Akun Baru
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">
                        Lengkapi formulir untuk menikmati penawaran terbaik.
                    </p>
                </div>

                {{-- Error Message (Only when in register mode) --}}
                @if ($errors->any() && (old('role') || $errors->has('password_confirmation') || $errors->has('bypass_password') || $errors->has('email') || $errors->has('username')))
                    <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-3 shadow-sm">
                        <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">⚠</span>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- Form Register --}}
                <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label for="reg_username" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                            Username
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="username" 
                                id="reg_username" 
                                value="{{ old('username') }}"
                                required 
                                placeholder="Username unik Anda"
                                autocomplete="username"
                                class="block w-full py-3 pl-11 pr-4 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-amber-900/40">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="reg_email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                name="email" 
                                id="reg_email" 
                                value="{{ old('email') }}"
                                required 
                                placeholder="contoh@email.com"
                                autocomplete="email"
                                class="block w-full py-3 pl-11 pr-4 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-amber-900/40">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Fields Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <!-- Password -->
                        <div>
                            <label for="reg_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="reg_password" 
                                    required 
                                    placeholder="Min. 6 karakter"
                                    autocomplete="new-password"
                                    class="block w-full py-3 pl-10 pr-9 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-amber-900/40">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <button
                                    type="button"
                                    onclick="togglePasswordVisibility('reg_password', this)"
                                    aria-label="Lihat Password"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700 cursor-pointer p-1"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="reg_password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                                Konfirmasi
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="reg_password_confirmation" 
                                    required 
                                    placeholder="Ulangi password"
                                    autocomplete="new-password"
                                    class="block w-full py-3 pl-10 pr-9 text-xs sm:text-sm text-gray-900 bg-[#FAF7F2] border border-amber-950/15 rounded-2xl focus:ring-2 focus:ring-[#DFAC6B] focus:bg-white focus:outline-none transition-all placeholder:text-gray-400 font-medium"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-amber-900/40">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <button
                                    type="button"
                                    onclick="togglePasswordVisibility('reg_password_confirmation', this)"
                                    aria-label="Lihat Password"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700 cursor-pointer p-1"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Role Selector -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Pilih Jenis Akun
                        </label>
                        <div class="grid grid-cols-3 gap-2">
                            <!-- Pelanggan / User -->
                            <label class="relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-amber-950/15 bg-[#FAF7F2] cursor-pointer hover:bg-amber-50/50 has-checked:border-[#DFAC6B] has-checked:bg-amber-50/90 has-checked:ring-2 has-checked:ring-[#DFAC6B] transition-all">
                                <input type="radio" name="role" value="user" {{ old('role', 'user') === 'user' ? 'checked' : '' }} onchange="handleRoleChange(this.value)" class="sr-only">
                                <span class="text-base mb-0.5">🛍️</span>
                                <span class="text-[11px] font-bold text-gray-800">Pembeli</span>
                            </label>

                            <!-- Admin -->
                            <label class="relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-amber-950/15 bg-[#FAF7F2] cursor-pointer hover:bg-amber-50/50 has-checked:border-[#DFAC6B] has-checked:bg-amber-50/90 has-checked:ring-2 has-checked:ring-[#DFAC6B] transition-all">
                                <input type="radio" name="role" value="admin" {{ old('role') === 'admin' ? 'checked' : '' }} onchange="handleRoleChange(this.value)" class="sr-only">
                                <span class="text-base mb-0.5">🛡️</span>
                                <span class="text-[11px] font-bold text-gray-800">Admin</span>
                            </label>

                            <!-- Super Admin -->
                            <label class="relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-amber-950/15 bg-[#FAF7F2] cursor-pointer hover:bg-amber-50/50 has-checked:border-[#DFAC6B] has-checked:bg-amber-50/90 has-checked:ring-2 has-checked:ring-[#DFAC6B] transition-all">
                                <input type="radio" name="role" value="superadmin" {{ old('role') === 'superadmin' ? 'checked' : '' }} onchange="handleRoleChange(this.value)" class="sr-only">
                                <span class="text-base mb-0.5">👑</span>
                                <span class="text-[11px] font-bold text-gray-800">Super Admin</span>
                            </label>
                        </div>
                    </div>

                    <!-- Bypass Password Field (Shown only for Admin / Superadmin) -->
                    <div id="bypassFieldContainer" class="{{ in_array(old('role'), ['admin', 'superadmin']) ? '' : 'hidden' }} p-3.5 rounded-2xl bg-amber-50 border border-amber-300 transition-all">
                        <label for="reg_bypass_password" class="block text-xs font-bold text-amber-950 uppercase tracking-wider mb-1">
                            Password Bypass Otorisasi
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="bypass_password" 
                                id="reg_bypass_password" 
                                placeholder="Masukkan kode otorisasi pendaftaran"
                                class="block w-full py-2.5 pl-10 pr-9 text-xs sm:text-sm text-gray-900 bg-white border border-amber-300 rounded-xl focus:ring-2 focus:ring-[#DFAC6B] focus:outline-none"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-amber-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-amber-800 mt-1 font-medium">
                            * Wajib diisi untuk pendaftaran peran Admin atau Super Admin.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full py-3.5 sm:py-4 px-6 bg-gradient-to-r from-[#DFAC6B] via-[#E8BA7E] to-[#C9934E] text-[#241C16] font-extrabold text-sm rounded-2xl shadow-xl shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <span>Daftar Akun Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- 3D Flip Trigger back to Login -->
                <div class="text-center mt-6 pt-2 border-t border-gray-100">
                    <p class="text-xs sm:text-sm text-gray-600">
                        Sudah punya akun Manies Cakery?
                    </p>
                    <button 
                        type="button"
                        onclick="flipCardTo('login')"
                        class="mt-1 inline-flex items-center gap-1.5 font-bold text-[#C9934E] hover:text-[#241C16] hover:underline cursor-pointer transition-colors group text-xs sm:text-sm"
                    >
                        <span>Masuk ke Akun Sekarang</span>
                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function updateContainerHeight() {
        const wrapper = document.getElementById('authCardWrapper');
        const loginCard = document.getElementById('loginCard');
        const registerCard = document.getElementById('registerCard');
        
        if (!wrapper || !loginCard || !registerCard) return;

        const isFlipped = wrapper.classList.contains('is-flipped');
        const targetHeight = isFlipped ? registerCard.scrollHeight : loginCard.scrollHeight;
        wrapper.style.height = targetHeight + 'px';
    }

    function flipCardTo(target) {
        const wrapper = document.getElementById('authCardWrapper');
        if (!wrapper) return;

        if (target === 'register') {
            wrapper.classList.add('is-flipped');
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', '{{ route("register") }}');
            }
        } else {
            wrapper.classList.remove('is-flipped');
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', '{{ route("login") }}');
            }
        }

        setTimeout(updateContainerHeight, 50);
        setTimeout(updateContainerHeight, 400);
        setTimeout(updateContainerHeight, 800);
    }

    function handleRoleChange(role) {
        const bypassField = document.getElementById('bypassFieldContainer');
        if (!bypassField) return;

        if (role === 'admin' || role === 'superadmin') {
            bypassField.classList.remove('hidden');
        } else {
            bypassField.classList.add('hidden');
        }

        updateContainerHeight();
    }

    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        if (!input) return;

        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";

        button.innerHTML = isPassword
            ? `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.174-3.338M9.88 9.88a3 3 0 104.24 4.24" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
               </svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
               </svg>`;
    }

    // Initialize on DOM ready & hash navigation
    document.addEventListener('DOMContentLoaded', () => {
        // Check hash or query param or location path
        const isRegisterRoute = window.location.pathname.includes('register') || window.location.hash === '#register';
        const wrapper = document.getElementById('authCardWrapper');
        
        if (isRegisterRoute && wrapper && !wrapper.classList.contains('is-flipped')) {
            wrapper.classList.add('is-flipped');
        }

        updateContainerHeight();
        window.addEventListener('resize', updateContainerHeight);
    });
</script>
@endpush

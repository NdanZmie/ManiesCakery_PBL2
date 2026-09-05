<!-- nama: dea asnuari
nim: 3312411001 -->
@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-lg p-12 bg-white rounded-lg shadow-sm">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Buat Akun</h2>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-4 text-green-600 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">

            @csrf

            <div class="mb-4">
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    required 
                    placeholder="Username"
                    autocomplete="off"
                    class="w-full p-3 bg-gray-100 border border-transparent rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#DFAC6B]"
                >
            </div>

            <div class="mb-4">
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    placeholder="Email"
                    autocomplete="off"
                    class="w-full p-3 bg-gray-100 border border-transparent rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#DFAC6B]"
                >
            </div>

                <div class="mb-4">
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password"
                            name="password"
                            required
                            placeholder="password"
                            autocomplete="off"
                            class="w-full p-3 pr-12 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-[#DFAC6B] focus:border-[#DFAC6B]"
                        >
                        <button type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600">
                            <svg id="eye-password" xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 
                                    0 8.268 2.943 9.542 7-1.274 4.057-5.064 
                                    7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation"
                            required
                            placeholder="konfirmasi password"
                            autocomplete="off"
                            class="w-full p-3 pr-12 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-[#DFAC6B] focus:border-[#DFAC6B]"
                        >
                        <button type="button"
                            onclick="togglePassword('password_confirmation', this)"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600">
                            <svg id="eye-password_confirmation" xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 
                                    0 8.268 2.943 9.542 7-1.274 4.057-5.064 
                                    7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Pilih Role:</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="role" value="user" checked class="w-4 h-4 text-[#DFAC6B] bg-gray-100 border-gray-300 focus:ring-[#DFAC6B]">
                            <span class="ml-2 text-sm text-gray-700">Pengguna / Pembeli</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="role" value="admin" class="w-4 h-4 text-[#DFAC6B] bg-gray-100 border-gray-300 focus:ring-[#DFAC6B]">
                            <span class="ml-2 text-sm text-gray-700">Admin</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="role" value="superadmin" class="w-4 h-4 text-[#DFAC6B] bg-gray-100 border-gray-300 focus:ring-[#DFAC6B]">
                            <span class="ml-2 text-sm text-gray-700">Super Admin</span>
                        </label>
                    </div>
                </div>

                <div id="bypass-field" class="mb-4 hidden">
                    <input 
                        type="password" 
                        name="bypass_password" 
                        id="bypass_password"
                        placeholder="Masukkan password bypass (khusus Admin/SuperAdmin)"
                        class="w-full p-3 bg-yellow-50 border border-yellow-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    >
                    <p class="text-xs text-yellow-600 mt-1">* Wajib diisi untuk pendaftaran Admin / SuperAdmin</p>
                </div>

            <div class="flex justify-center">
                <button type="submit" class="text-white bg-[#4B372F] hover:bg-[#3a2b25] focus:ring-10 focus:outline-none focus:ring-[#DFAC6B] shadow-lg shadow-[#4B372F]/50 font-large rounded-lg text-sm px-15 py-3 text-center mb-2">
                    Buat Akun
                </button>
            </div>

            <p class="text-sm text-center text-gray-600 mt-6">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-[#4B372F] hover:underline">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(fieldId, button) {
        const input = document.getElementById(fieldId);
        const icon = button.querySelector('svg');

        if (input.type === "password") {
            input.type = "text";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0 
                    -8.268-2.943-9.542-7a10.05 10.05 0 
                    012.109-3.378M9.88 9.88A3 3 0 
                    0114.12 14.12M6.1 6.1l11.8 11.8" />
            `;
        } else {
            input.type = "password";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 
                    0 8.268 2.943 9.542 7-1.274 4.057-5.064 
                    7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            `;
        }
    }

    // Tampilkan field password bypass saat role admin/superadmin dipilih
    document.addEventListener('DOMContentLoaded', () => {
        const roleRadios = document.querySelectorAll('input[name="role"]');
        const bypassField = document.getElementById('bypass-field');

        roleRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'admin' || radio.value === 'superadmin') {
                    bypassField.classList.remove('hidden');
                } else {
                    bypassField.classList.add('hidden');
                }
            });
        });
    });
</script>
@endpush

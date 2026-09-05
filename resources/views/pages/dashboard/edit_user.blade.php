@extends('layouts.dashboard')
@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Pengguna</h1>
        <a href="{{ route('usersdashboard') }}" class="text-sm px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
            &larr; Kembali ke Daftar Pengguna
        </a>
    </div>

    @if($errors->any())
        <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-200 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $user->telepon) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" id="role" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User (Customer)</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ old('role', $user->role) === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('usersdashboard') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Batal</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

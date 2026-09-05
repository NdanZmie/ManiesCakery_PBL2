<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user,username',
            'email'    => 'required|email|max:255|unique:user,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:user,admin,superadmin',
            'bypass_password' => 'required_if:role,admin,superadmin',
        ]);

        // Cek password bypass jika mendaftar sebagai admin / superadmin
        if (in_array($request->role, ['admin', 'superadmin'])) {
            $adminKey = env('ADMIN_REGISTRATION_KEY', '123456');
            $superadminKey = env('SUPERADMIN_REGISTRATION_KEY', '121233');

            $isBypassValid =
                ($request->role === 'admin' && $request->bypass_password === $adminKey) ||
                ($request->role === 'superadmin' && $request->bypass_password === $superadminKey);

            if (!$isBypassValid) {
                return back()->withErrors(['bypass_password' => 'Password bypass untuk role ini salah.'])->withInput();
            }
        }

        User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}

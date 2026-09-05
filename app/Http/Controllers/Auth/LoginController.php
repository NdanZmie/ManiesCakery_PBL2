<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

        if (!$user) {
            return back()->withErrors(['Username atau Email tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['Password salah'])->withInput();
        }

        $user->update(['last_login_at' => now()]);
        Auth::login($user);

        if (in_array($user->role, ['admin', 'superadmin'])) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->intended('/');
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    // Function Login sebagai Guest
    public function guestLogin()
    {
        $randomUsername = 'guest_' . Str::lower(Str::random(6));
        $randomEmail = $randomUsername . '@guest.test';

        $guest = User::create([
            'name' => 'Guest User',
            'username' => $randomUsername,
            'email' => $randomEmail,
            'telepon' => '0000000000',
            'password' => Hash::make(Str::random(12)),
            'role' => 'guest',
            'last_login_at' => now(),
        ]);

        Auth::login($guest);

        return redirect('/');
    }

// Function hapus user guest saat logout
public function logout(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user(); // Simpan user sebelum logout

    Auth::logout(); // Logout user terlebih dahulu

    // Hapus akun jika role-nya guest
    if ($user && $user->role === 'guest') {
        $user->delete();
    }

    // Hapus session & regenerate token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

   
    return redirect()->route('login')->with('success', 'Logout berhasil. Silakan login kembali.');
}


}

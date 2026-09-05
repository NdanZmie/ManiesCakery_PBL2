<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telepon', 'like', "%{$search}%");
        }

        $users = $query->get();
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get(); // << Tambahkan ini

        return view('pages.dashboard.users', compact('users', 'latestUsers'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'telepon' => 'required',
            'username' => 'required|unique:user',
            'password' => 'required|min:6',
        ]);

        User::create([ 
        'name' => $request->name,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'created_at' => now(), 
        'link_instagram' => $request->link_instagram,
    ]);


        return redirect()->route('usersdashboard')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.dashboard.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:user,username,' . $user->id,
            'email' => 'required|email|unique:user,email,' . $user->id,
            'name' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'role' => 'nullable|in:user,admin,superadmin',
        ]);

        $user->update($request->only(['username', 'email', 'name', 'telepon', 'role']));

        return redirect()->route('usersdashboard')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}

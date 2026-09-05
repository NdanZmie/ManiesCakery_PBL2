<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Default Super Admin / Admin
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Manies Cakery',
                'email' => 'admin@maniescakery.com',
                'telepon' => '089665314602',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Default Customer / Demo User
        User::updateOrCreate(
            ['username' => 'customer'],
            [
                'name' => 'Demo Customer',
                'email' => 'customer@maniescakery.com',
                'telepon' => '081234567890',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        );
    }
}

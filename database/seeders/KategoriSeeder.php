<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['Cake', 'Brownies', 'Cookies', 'Hampers', 'Small Cake', 'Cupcake'];

        foreach ($kategori as $nama) {
            Kategori::firstOrCreate(['nama' => $nama]);
        }
    }
}

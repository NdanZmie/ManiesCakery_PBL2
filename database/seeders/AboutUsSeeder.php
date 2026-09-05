<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = AboutUs::first();
        if (!$about) {
            AboutUs::create([
                'about_left' => 'Manies.Cakery is a home-made cake shop that presents a variety of sweet choices made with all the heart, serving brownies, cookies, breads, and other special cakes with delicious flavors.',
                'about_right' => 'Produk kami menghasilkan cake & brownies premium yang dibuat dengan bahan-bahan alami berkualitas tinggi. Menggabungkan resep tradisional dengan kreasi modern untuk rasa otentik yang selalu terjaga.',
                'philosophy_left' => 'Where smiles are served daily, Enjoy delicious pastries and warm bakes right at home.',
                'philosophy_right' => 'Di Manies Cakery, kami mengutamakan kualitas, cita rasa, dan keindahan tampilan dalam setiap produk yang kami sajikan dengan sepenuh hati.',
            ]);
        }
    }
}

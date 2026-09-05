<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Bolu Pisang Keju Spesial',
                'deskripsi' => 'Bolu pisang lembut khas Manies Cakery dengan aroma pisang raja pilihan dan taburan keju cheddar melimpah di atasnya.',
                'harga' => 45000,
                'kategori' => 'Cake',
                'gambar' => 'images/BoluPisang.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Round U Signature',
                'deskripsi' => 'Brownies panggang berbentuk bundar unik dengan tekstur fudgy dan perpaduan cokelat premium yang lumer di mulut.',
                'harga' => 65000,
                'kategori' => 'Brownies',
                'gambar' => 'images/Bround_U.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Classic Fudgy Brownies',
                'deskripsi' => 'Brownies cokelat klasik dengan shiny crust sempurna dan rasa cokelat pekat yang nikmat disetiap gigitan.',
                'harga' => 55000,
                'kategori' => 'Brownies',
                'gambar' => 'images/Brownies-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Almond Melt',
                'deskripsi' => 'Brownies cokelat panggang dengan limpahan irisan kacang almond renyah dan lelehan cokelat lezat.',
                'harga' => 60000,
                'kategori' => 'Brownies',
                'gambar' => 'images/BrowniesIL.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Special Birthday Cake',
                'deskripsi' => 'Kue ulang tahun spesial berlapis krim lembut dengan hiasan cantik, cocok untuk perayaan hari istimewa Anda.',
                'harga' => 135000,
                'kategori' => 'Cake',
                'gambar' => 'images/Cake-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Choco Chips Crunch Cookies',
                'deskripsi' => 'Kue kering renyah dengan taburan butiran cokelat chips premium, teman setia saat santai bersama kopi atau teh.',
                'harga' => 35000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Custom Topping Brownies',
                'deskripsi' => 'Brownies lezat dengan aneka pilihan topping kombinasi keju, almond, oreo, dan choco chips sesuai selera Anda.',
                'harga' => 70000,
                'kategori' => 'Brownies',
                'gambar' => 'images/CustomBrownies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Matcha Green Tea Cake',
                'deskripsi' => 'Kue lembut dengan sentuhan bubuk matcha Jepang asli berkualitas tinggi, menghasilkan rasa manis berpadu aroma green tea autentik.',
                'harga' => 85000,
                'kategori' => 'Cake',
                'gambar' => 'images/CustomMatcha.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Duo Brownies Combo',
                'deskripsi' => 'Kombinasi dua rasa brownies favorit dalam satu paket hemat, memberikan sensasi rasa ganda yang memanjakan lidah.',
                'harga' => 75000,
                'kategori' => 'Brownies',
                'gambar' => 'images/DuoBrownies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Mini Browkies Bites',
                'deskripsi' => 'Perpaduan unik antara brownies lembut dan cookies renyah dalam ukuran gigitan kecil yang pas untuk camilan sehari-hari.',
                'harga' => 40000,
                'kategori' => 'Cookies',
                'gambar' => 'images/MiniBrowkies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Premium Red Velvet Cake',
                'deskripsi' => 'Kue red velvet mewah dengan tekstur super lembut dipadukan dengan cream cheese frosting gurih nan lezat.',
                'harga' => 95000,
                'kategori' => 'Cake',
                'gambar' => 'images/PREM1.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Premium Tiramisu Delight',
                'deskripsi' => 'Kue tiramisu ala Italia dengan sentuhan kopi espresso wangi dan lapisan krim mascarpone yang lembut lumer.',
                'harga' => 95000,
                'kategori' => 'Cake',
                'gambar' => 'images/PREM2.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Sweet Cupcake Strawberry',
                'deskripsi' => 'Cupcake imut dengan krim vanila lembut dan selai stroberi segar, cocok untuk kudapan manis keluarga.',
                'harga' => 25000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Vanilla Cream Celebration Cake',
                'deskripsi' => 'Kue bolu vanila lembut berlapis krim susu segar yang dihias elegan untuk melengkapi momen kebersamaan.',
                'harga' => 110000,
                'kategori' => 'Cake',
                'gambar' => 'images/cake6.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Manies Hampers Exclusive',
                'deskripsi' => 'Paket hampers eksklusif berisi aneka kue pilihan Manies Cakery dalam kemasan mewah, cocok sebagai hadiah momen spesial.',
                'harga' => 185000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
        ];

        foreach ($products as $data) {
            Produk::updateOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }
    }
}

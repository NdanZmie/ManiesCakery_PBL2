<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan folder storage images tersedia
        $storageDir = storage_path('app/public/images');
        $publicStorageDir = public_path('storage/images');

        if (!File::exists($storageDir)) {
            File::makeDirectory($storageDir, 0755, true);
        }

        if (!File::exists($publicStorageDir) && !is_link($publicStorageDir)) {
            File::makeDirectory($publicStorageDir, 0755, true);
        }

        // Salin semua file dari public/assets/produk ke storage/app/public/images
        $assetsDir = public_path('assets/produk');
        if (File::exists($assetsDir)) {
            foreach (File::files($assetsDir) as $file) {
                File::copy($file->getPathname(), $storageDir . '/' . $file->getFilename());
                if (File::exists($publicStorageDir) && !is_link(public_path('storage'))) {
                    File::copy($file->getPathname(), $publicStorageDir . '/' . $file->getFilename());
                }
            }
        }

        // Salin hampers juga
        $hampersAsset = public_path('assets/hampers/Hampers-M.png');
        if (File::exists($hampersAsset)) {
            File::copy($hampersAsset, $storageDir . '/Hampers-M.png');
            if (File::exists($publicStorageDir) && !is_link(public_path('storage'))) {
                File::copy($hampersAsset, $publicStorageDir . '/Hampers-M.png');
            }
        }

        $products = [
            // ==================== 1 - 10: BROWNIES ====================
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
                'nama' => 'Custom Topping Brownies',
                'deskripsi' => 'Brownies lezat dengan aneka pilihan topping kombinasi keju, almond, oreo, dan choco chips sesuai selera Anda.',
                'harga' => 70000,
                'kategori' => 'Brownies',
                'gambar' => 'images/CustomBrownies.jpg',
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
                'deskripsi' => 'Perpaduan renyahnya cookies dan legitnya brownies panggang dalam ukuran mini sekali gigit yang nagih.',
                'harga' => 30000,
                'kategori' => 'Brownies',
                'gambar' => 'images/MiniBrowkies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Nutella Swirl Delight',
                'deskripsi' => 'Brownies lembut berlapis lelehan selai Nutella hazelnut asli dengan aroma menggoda dan tekstur chewy.',
                'harga' => 68000,
                'kategori' => 'Brownies',
                'gambar' => 'images/PREM1.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Lotus Biscoff Caramel',
                'deskripsi' => 'Brownies fudgy berpadu olesan selai Lotus Biscoff dan remahan biskuit karamel renyah di atasnya.',
                'harga' => 72000,
                'kategori' => 'Brownies',
                'gambar' => 'images/PREM2.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Cream Cheese Marble',
                'deskripsi' => 'Marmer brownies cokelat dan cream cheese gurih yang menciptakan keseimbangan rasa manis dan asin yang pas.',
                'harga' => 65000,
                'kategori' => 'Brownies',
                'gambar' => 'images/Brownies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Brownies Choco Peanut Butter',
                'deskripsi' => 'Brownies tebal dengan olesan selai kacang creamy dan taburan butiran dark chocolate chunks melimpah.',
                'harga' => 62000,
                'kategori' => 'Brownies',
                'gambar' => 'images/BrowniesIL.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],

            // ==================== 11 - 22: CAKE ====================
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
                'nama' => 'Premium Red Velvet Cake',
                'deskripsi' => 'Cake red velvet elegan dengan lapisan frosting cream cheese gurih dan taburan remahan halus berwarna merah menggoda.',
                'harga' => 120000,
                'kategori' => 'Cake',
                'gambar' => 'images/PREM1.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Premium Tiramisu Delight',
                'deskripsi' => 'Kue khas Italia dengan aroma kopi espresso asli berpadu kelembutan krim mascarpone dan taburan cocoa powder murni.',
                'harga' => 125000,
                'kategori' => 'Cake',
                'gambar' => 'images/PREM2.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Classic Black Forest Cherries',
                'deskripsi' => 'Sponge cake cokelat berlapis selai ceri segar, krim kocok vanila, dan serutan dark chocolate melimpah.',
                'harga' => 140000,
                'kategori' => 'Cake',
                'gambar' => 'images/cake6.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'New York Baked Cheesecake',
                'deskripsi' => 'Cheesecake panggang otentik dengan crust biskuit renyah dan tekstur keju padat lembut yang meleleh di mulut.',
                'harga' => 130000,
                'kategori' => 'Cake',
                'gambar' => 'images/Cake-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Bolu Gulung Pandan Keju',
                'deskripsi' => 'Bolu gulung pandan wangi asli dengan isian butter cream dan taburan keju cheddar parut tebal.',
                'harga' => 48000,
                'kategori' => 'Cake',
                'gambar' => 'images/BoluPisang.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Korean Minimalist Bento Cake',
                'deskripsi' => 'Kue mini estetik gaya Korea dalam kemasan bento box, dapat dicustom ucapan dan warna sesuai keinginan.',
                'harga' => 50000,
                'kategori' => 'Cake',
                'gambar' => 'images/CustomMatcha.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Japanese Fluffy Strawberry Shortcake',
                'deskripsi' => 'Kue bolu lembut ringan khas Jepang dengan potongan buah stroberi segar dan chantilly cream manis segar.',
                'harga' => 115000,
                'kategori' => 'Cake',
                'gambar' => 'images/cake6.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Choco Fudge Double Layer Cake',
                'deskripsi' => 'Dua lapis sponge cokelat moist dengan olesan cokelat fudge ganache pekat untuk pecinta cokelat sejati.',
                'harga' => 125000,
                'kategori' => 'Cake',
                'gambar' => 'images/PREM1.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Rainbow Celebration Layer Cake',
                'deskripsi' => 'Kue lapis pelangi warna-warni ceria dengan frosting krim vanila yang lembut, favorit untuk pesta anak-anak.',
                'harga' => 110000,
                'kategori' => 'Cake',
                'gambar' => 'images/Cake-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],

            // ==================== 23 - 32: COOKIES ====================
            [
                'nama' => 'Choco Chips Crunch Cookies',
                'deskripsi' => 'Kue kering renyah dengan taburan butiran cokelat chips premium, teman setia saat santai bersama kopi atau teh.',
                'harga' => 35000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Red Velvet White Choco Cookies',
                'deskripsi' => 'Soft cookies warna merah cerah dengan perpaduan potongan white chocolate manis yang lumer saat dipanaskan.',
                'harga' => 38000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Double Choco Soft Baked Cookies',
                'deskripsi' => 'Cookies cokelat pekat khas New York dengan tekstur soft di dalam dan renyah di luar.',
                'harga' => 36000,
                'kategori' => 'Cookies',
                'gambar' => 'images/MiniBrowkies.jpg',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Matcha Almond Butter Cookies',
                'deskripsi' => 'Kue kering butter beraroma teh hijau matcha asli berpadu irisan kacang almond gurih renyah.',
                'harga' => 40000,
                'kategori' => 'Cookies',
                'gambar' => 'images/CustomMatcha.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Kaasstengels Keju Edam Premium',
                'deskripsi' => 'Kastengel renyah gurih dibuat dari keju Edam Belanda dan taburan keju gouda tebal di setiap batangnya.',
                'harga' => 65000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Nastar Nanas Lumer Wijsman',
                'deskripsi' => 'Nastar klasik bermentega Wijsman dengan selai nanas madu buatan sendiri yang legit, manis, dan wangi.',
                'harga' => 70000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Putri Salju Mede Keju',
                'deskripsi' => 'Kue putri salju dengan kacang mete cincang gurih dibalut gula dingin halus yang langsung lumer di lidah.',
                'harga' => 60000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Sagu Keju Renyah Melt',
                'deskripsi' => 'Kue sagu keju gurih renyah dengan aroma santan dan keju parut panggang yang meleleh seketika di mulut.',
                'harga' => 45000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Oatmeal Raisin Healthy Cookies',
                'deskripsi' => 'Kue gandum sehat kaya serat dengan kismis manis alami dan sentuhan kayu manis aromatik.',
                'harga' => 38000,
                'kategori' => 'Cookies',
                'gambar' => 'images/Cookies-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Palm Sugar Cinnamon Cookies',
                'deskripsi' => 'Cookies wangi gula aren asli berpadu rempah kayu manis dengan kerenyahan renyah yang bikin ketagihan.',
                'harga' => 35000,
                'kategori' => 'Cookies',
                'gambar' => 'images/MiniBrowkies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],

            // ==================== 33 - 40: HAMPERS ====================
            [
                'nama' => 'Hampers Manies Eksklusif',
                'deskripsi' => 'Paket hampers eksklusif berisi aneka kue pilihan Manies Cakery dalam kemasan mewah, cocok untuk hantaran dan hadiah spesial.',
                'harga' => 150000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Idul Fitri Barakah',
                'deskripsi' => 'Paket bingkisan Lebaran istimewa berisi toples Nastar Wijsman, Kaasstengels, dan Fudgy Brownies berhias pita emas.',
                'harga' => 220000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Natal & Tahun Baru Joy',
                'deskripsi' => 'Hampers edisi spesial Natal berisi aneka cookies toples cantik, brownies box, dan kartu ucapan kustom.',
                'harga' => 250000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Imlek Golden Sweet',
                'deskripsi' => 'Paket bingkisan Tahun Baru Imlek dengan kemasan merah emas elegan berisi lapis legit mini dan cookies keberuntungan.',
                'harga' => 235000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Brownies & Cookies Duo',
                'deskripsi' => 'Paket duo praktis dalam kotak hardbox estetik berisi 1 loyang brownies fudgy dan 1 toples cookies renyah.',
                'harga' => 125000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Birthday Bliss Gift Box',
                'deskripsi' => 'Kado ulang tahun manis berisi mini cake dekorasi, lilin estetik, brownies bites, dan greeting card kustom.',
                'harga' => 175000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Hampers Bridesmaid & Wedding Sweet',
                'deskripsi' => 'Paket souvenir pernikahan eksklusif dengan kotak pita satin berisi aneka kue kering premium.',
                'harga' => 195000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Mini Hampers Sweet Greeting Box',
                'deskripsi' => 'Paket bingkisan mini terjangkau dengan isi brownies potong dan cookies bag, pas untuk hadiah kantor atau teman.',
                'harga' => 85000,
                'kategori' => 'Hampers',
                'gambar' => 'images/Hampers-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],

            // ==================== 41 - 45: SMALL CAKE ====================
            [
                'nama' => 'Mini Strawberry Cheesecake Cup',
                'deskripsi' => 'Dessert cup cheesecake lembut berpadu remah biskuit mentega dan selai stroberi segar asam manis.',
                'harga' => 25000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Eclair Chocolate Custard Cream',
                'deskripsi' => 'Kue sus panjang renyah khas Prancis dengan isian custard vanila lembut dan glasir dark chocolate mengkilap.',
                'harga' => 22000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Choux Craquelin Vanilla Diplomat',
                'deskripsi' => 'Kue sus krispi bertoping crumbles renyah dengan isian krim diplomat vanila yang lumer berlimpah.',
                'harga' => 20000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Mini Brownies Potongan Box',
                'deskripsi' => 'Satu boks isi 4 potong brownies fudgy aneka topping ukuran mungil yang pas dinikmati sendiri.',
                'harga' => 18000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/MiniBrowkies.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Slice Red Velvet Roll Cake',
                'deskripsi' => 'Potongan bolu gulung red velvet lembut dengan isian cream cheese dingin yang nikmat dan pas di lidah.',
                'harga' => 22000,
                'kategori' => 'Small Cake',
                'gambar' => 'images/PREM1.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],

            // ==================== 46 - 50: CUPCAKE ====================
            [
                'nama' => 'Cupcake Vanilla Rainbow Frosting',
                'deskripsi' => 'Cupcake vanila lembut dengan swirl butter cream warna-warni ceria dan taburan sprinkle manis.',
                'harga' => 18000,
                'kategori' => 'Cupcake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Cupcake Choco Lava Ganache',
                'deskripsi' => 'Cupcake cokelat dengan lelehan cokelat cair di tengahnya dan topping cokelat ganache pekat lezat.',
                'harga' => 20000,
                'kategori' => 'Cupcake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 1,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Cupcake Red Velvet Cream Cheese',
                'deskripsi' => 'Cupcake merah velvet elegan dipadukan dengan swirl cream cheese frosting gurih dan remahan cake.',
                'harga' => 22000,
                'kategori' => 'Cupcake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Cupcake Matcha Green Tea Swirl',
                'deskripsi' => 'Cupcake beraroma matcha autentik Jepang dengan hiasan krim green tea lembut dan white choco chips.',
                'harga' => 20000,
                'kategori' => 'Cupcake',
                'gambar' => 'images/CustomMatcha.jpg',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
            [
                'nama' => 'Cupcake Oreo Cookies & Cream',
                'deskripsi' => 'Cupcake cokelat berpadu krim biskuit Oreo renyah dan hiasan mini biskuit Oreo di atasnya.',
                'harga' => 22000,
                'kategori' => 'Cupcake',
                'gambar' => 'images/Small-M.png',
                'status' => true,
                'favourit' => 0,
                'link_instagram' => 'https://www.instagram.com/manies.cakery/',
            ],
        ];

        // Kosongkan dan insert produk
        Produk::truncate();

        foreach ($products as $item) {
            Produk::create($item);
        }
    }
}

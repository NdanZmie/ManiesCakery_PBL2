<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;
use Illuminate\Support\Facades\File;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Text Content
        $about = AboutUs::first();
        if (!$about) {
            $about = AboutUs::create([
                'about_left' => 'Manies Cakery adalah toko kue rumahan di Batam yang menyajikan berbagai pilihan manisan dibuat sepenuh hati, menghadirkan brownies fudgy, butter cookies renyah, kue tart, dan aneka bakes istimewa dengan cita rasa lezat tak terlupakan.',
                'about_right' => 'Kami selalu mengedepankan kualitas dan keaslian rasa. Menggunakan bahan-bahan alami pilihan tanpa pengawet buatan, setiap adonan dipanggang fresh setiap hari untuk menciptakan tekstur sempurna dan kehangatan rasa di setiap gigitan.',
                'philosophy_left' => 'Where smiles are served daily, Enjoy delicious homemade pastries and warm bakes right at your special moments.',
                'philosophy_right' => 'Filosofi kami berpusat pada cinta, kejujuran bahan, dan ketelitian rasa. Kami percaya bahwa setiap kue yang keluar dari oven kami bukan hanya sekadar makanan penutup, melainkan penghantar kebahagiaan bagi Anda dan orang-orang terkasih.',
            ]);
        } else {
            $about->update([
                'about_left' => $about->about_left ?: 'Manies Cakery adalah toko kue rumahan di Batam yang menyajikan berbagai pilihan manisan dibuat sepenuh hati, menghadirkan brownies fudgy, butter cookies renyah, kue tart, dan aneka bakes istimewa dengan cita rasa lezat tak terlupakan.',
                'about_right' => $about->about_right ?: 'Kami selalu mengedepankan kualitas dan keaslian rasa. Menggunakan bahan-bahan alami pilihan tanpa pengawet buatan, setiap adonan dipanggang fresh setiap hari untuk menciptakan tekstur sempurna dan kehangatan rasa di setiap gigitan.',
                'philosophy_left' => $about->philosophy_left ?: 'Where smiles are served daily, Enjoy delicious homemade pastries and warm bakes right at your special moments.',
                'philosophy_right' => $about->philosophy_right ?: 'Filosofi kami berpusat pada cinta, kejujuran bahan, dan ketelitian rasa. Kami percaya bahwa setiap kue yang keluar dari oven kami bukan hanya sekadar makanan penutup, melainkan penghantar kebahagiaan bagi Anda dan orang-orang terkasih.',
            ]);
        }

        // 2. Galeri Photos from public/assets/beranda/
        $storageGaleriDir = storage_path('app/public/galeri');
        $publicStorageGaleriDir = public_path('storage/galeri');

        if (!File::exists($storageGaleriDir)) {
            File::makeDirectory($storageGaleriDir, 0755, true);
        }

        if (!File::exists($publicStorageGaleriDir) && !is_link($publicStorageGaleriDir)) {
            File::makeDirectory($publicStorageGaleriDir, 0755, true);
        }

        $gallerySources = [
            1 => public_path('assets/beranda/B1.jfif'),
            2 => public_path('assets/beranda/b2.jpg'),
            3 => public_path('assets/beranda/b3.jfif'),
            4 => public_path('assets/beranda/b4.png'),
            5 => public_path('assets/beranda/b5.png'),
            6 => public_path('assets/banner.png'),
        ];

        $existingGaleri = AboutUs::whereNotNull('galeri')->orderBy('id')->get();

        foreach ($gallerySources as $index => $sourcePath) {
            if (File::exists($sourcePath)) {
                $ext = pathinfo($sourcePath, PATHINFO_EXTENSION);
                $targetFilename = "galeri_{$index}.{$ext}";
                $relPath = "galeri/{$targetFilename}";

                // Copy to storage
                File::copy($sourcePath, $storageGaleriDir . '/' . $targetFilename);

                if (File::exists($publicStorageGaleriDir) && !is_link(public_path('storage'))) {
                    File::copy($sourcePath, $publicStorageGaleriDir . '/' . $targetFilename);
                }

                if (isset($existingGaleri[$index - 1])) {
                    $existingGaleri[$index - 1]->update(['galeri' => $relPath]);
                } else {
                    AboutUs::create(['galeri' => $relPath]);
                }
            }
        }
    }
}

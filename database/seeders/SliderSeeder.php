<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storageSliderDir = storage_path('app/public/slider');
        $publicStorageSliderDir = public_path('storage/slider');

        if (!File::exists($storageSliderDir)) {
            File::makeDirectory($storageSliderDir, 0755, true);
        }

        if (!File::exists($publicStorageSliderDir) && !is_link($publicStorageSliderDir)) {
            File::makeDirectory($publicStorageSliderDir, 0755, true);
        }

        $dummyBanners = [
            1 => [
                'sources' => [
                    public_path('assets/beranda/B1.jfif'),
                    public_path('assets/beranda/b1.jpg'),
                    public_path('assets/banner.png'),
                ],
                'target' => 'slider_1.jfif',
            ],
            2 => [
                'sources' => [
                    public_path('assets/beranda/b2.jpg'),
                    public_path('assets/natal2.png'),
                ],
                'target' => 'slider_2.jpg',
            ],
            3 => [
                'sources' => [
                    public_path('assets/beranda/b3.jfif'),
                    public_path('assets/beranda/b3.jpg'),
                    public_path('assets/maniescakery2.png'),
                ],
                'target' => 'slider_3.jfif',
            ],
            4 => [
                'sources' => [
                    public_path('assets/beranda/b4.png'),
                    public_path('assets/hampers/Hampers-M.png'),
                ],
                'target' => 'slider_4.png',
            ],
            5 => [
                'sources' => [
                    public_path('assets/beranda/b5.png'),
                    public_path('assets/produk/Cake-M.png'),
                ],
                'target' => 'slider_5.png',
            ],
        ];

        foreach ($dummyBanners as $id => $banner) {
            $foundSource = null;
            foreach ($banner['sources'] as $src) {
                if (File::exists($src)) {
                    $foundSource = $src;
                    break;
                }
            }

            if ($foundSource) {
                $ext = pathinfo($foundSource, PATHINFO_EXTENSION);
                $targetFile = "slider_{$id}.{$ext}";

                // Copy to storage/app/public/slider
                File::copy($foundSource, $storageSliderDir . '/' . $targetFile);

                // Also copy to public/storage/slider if not symlinked
                if (File::exists($publicStorageSliderDir) && !is_link(public_path('storage'))) {
                    File::copy($foundSource, $publicStorageSliderDir . '/' . $targetFile);
                }

                Slider::updateOrCreate(
                    ['id' => $id],
                    ['gambar' => $targetFile]
                );
            }
        }
    }
}

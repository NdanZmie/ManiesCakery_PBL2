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
                'source' => public_path('assets/banner.png'),
                'target' => 'slider_1.png',
            ],
            2 => [
                'source' => public_path('assets/natal2.png'),
                'target' => 'slider_2.png',
            ],
            3 => [
                'source' => public_path('assets/maniescakery2.png'),
                'target' => 'slider_3.png',
            ],
            4 => [
                'source' => public_path('assets/hampers/Hampers-M.png'),
                'target' => 'slider_4.png',
            ],
            5 => [
                'source' => public_path('assets/produk/Cake-M.png'),
                'target' => 'slider_5.png',
            ],
        ];

        foreach ($dummyBanners as $id => $banner) {
            if (File::exists($banner['source'])) {
                // Copy to storage/app/public/slider
                File::copy($banner['source'], $storageSliderDir . '/' . $banner['target']);

                // Also copy to public/storage/slider if not symlinked
                if (File::exists($publicStorageSliderDir) && !is_link(public_path('storage'))) {
                    File::copy($banner['source'], $publicStorageSliderDir . '/' . $banner['target']);
                }
            }

            Slider::updateOrCreate(
                ['id' => $id],
                ['gambar' => $banner['target']]
            );
        }
    }
}

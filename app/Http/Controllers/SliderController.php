<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // Simpan gambar baru (jika belum ada)
   public function getSliderImages()
{
    $sliders = Slider::orderBy('id')->take(5)->get();

    // Pastikan tetap 5 item
    while ($sliders->count() < 5) {
        $sliders->push(null); // Tambah slot kosong
    }

    return $sliders;
}
    public function update(Request $request)
    {
        $request->validate([
            'sliderImage1' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,jfif,avif|max:5120',
            'sliderImage2' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,jfif,avif|max:5120',
            'sliderImage3' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,jfif,avif|max:5120',
            'sliderImage4' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,jfif,avif|max:5120',
            'sliderImage5' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,jfif,avif|max:5120',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $inputName = "sliderImage{$i}";

            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);

                // Simpan file dengan nama sesuai slot
                $filename = "slider_{$i}." . $file->getClientOriginalExtension();

                // Hapus file lama (jika ada)
                $oldFile = Slider::find($i)?->gambar;
                if ($oldFile && Storage::disk('public')->exists("slider/{$oldFile}")) {
                    Storage::disk('public')->delete("slider/{$oldFile}");
                }

                // Simpan file baru
                Storage::disk('public')->putFileAs('slider', $file, $filename);

                // Update / buat baris baru di database
                Slider::updateOrCreate(
                    ['id' => $i],
                    ['gambar' => $filename]
                );
            }
        }

        return back()->with('success', 'Slider berhasil diperbarui.');
    }

}
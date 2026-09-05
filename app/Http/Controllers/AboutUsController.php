<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutUs;

class AboutUsController extends Controller
{

    public function index()
    {
        $about = AboutUs::first() ?: AboutUs::create([
            'about_left'       => '',
            'about_right'      => '',
            'philosophy_left'  => '',
            'philosophy_right' => '',
        ]);

        $galeriItems = AboutUs::whereNotNull('galeri')
                            ->orderBy('id')
                            ->take(6)
                            ->get();

        while ($galeriItems->count() < 6) {
            $galeriItems->push((object)['galeri' => null]);
        }

        return view('pages.about_us', compact('about', 'galeriItems'));
    }

    public function updateAbout(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $about->update([
            'about_left' => $request->about_left,
            'about_right' => $request->about_right,
        ]);

        return redirect()->back()->with('success', 'About Us updated successfully.');
    }

    public function updatePhilosophy(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $about->update([
            'philosophy_left' => $request->philosophy_left,
            'philosophy_right' => $request->philosophy_right,
        ]);

        return redirect()->back()->with('success', 'Philosophy updated successfully.');
    }
   
    public function updateGaleri(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $existing = AboutUs::whereNotNull('galeri')
                        ->orderBy('id')
                        ->take(6)
                        ->get();

        foreach ($request->file('images', []) as $index => $image) {
            if (!$image) continue;                     

            $path = $image->store('galeri', 'public'); 

            if (isset($existing[$index])) {
               
                $row = $existing[$index];

                if ($row->galeri) {                   
                    Storage::disk('public')->delete($row->galeri);
                }
                $row->update(['galeri' => $path]);

            } else {
                AboutUs::create(['galeri' => $path]);
            }
        }

        return back()->with('success', 'Galeri berhasil diperbarui.');
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return redirect()->route('about.index');
    }

    public function destroyText($id, $section)
    {
        $about = AboutUs::findOrFail($id);
        if (in_array($section, ['about', 'about_left', 'about_right'])) {
            $about->update(['about_left' => '', 'about_right' => '']);
        } elseif (in_array($section, ['philosophy', 'philosophy_left', 'philosophy_right'])) {
            $about->update(['philosophy_left' => '', 'philosophy_right' => '']);
        }

        return redirect()->route('about.index')->with('success', 'Section berhasil direset.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdukDashboardController extends Controller
{
    public function index()
    {
        $products = Produk::latest()->take(25)->get();
        $categories = Kategori::all();
        $editStatus = false;

        return view('pages.dashboard.products', compact('products', 'categories', 'editStatus'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Produk::where('nama', 'like', "%$keyword%")
            ->orWhere('deskripsi', 'like', "%$keyword%")
            ->orWhere('kategori', 'like', "%$keyword%")
            ->latest()
            ->get();

        $categories = Kategori::all();
        $editStatus = false;

        return view('pages.dashboard.products', compact('products', 'categories', 'editStatus', 'keyword'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_instagram' => 'nullable|url|starts_with:https://www.instagram.com/',
        ]);

        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = $gambar->store('images', 'public');
        }

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'gambar' => $gambarName,
            'status' => true,
            'link_instagram' => $request->link_instagram,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Produk $product)
    {
        $categories = Kategori::all();
        $products = Produk::all();
        $editStatus = true;

        return view('pages.dashboard.products', compact('product', 'categories', 'products', 'editStatus'));
    }

    public function update(Request $request, Produk $product)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'link_instagram' => $request->link_instagram,
        ];

        if ($request->hasFile('gambar')) {
            if ($product->gambar && Storage::exists('public/' . $product->gambar)) {
                Storage::delete('public/' . $product->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarName = $gambar->store('images', 'public');
            $data['gambar'] = $gambarName;
        }

        $product->update($data);

        return redirect()->route('dashboard.product.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Produk $product)
    {
        if ($product->gambar && Storage::exists('public/' . $product->gambar)) {
            Storage::delete('public/' . $product->gambar);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    public function addNewCategory(Request $request)
    {
        $request->validate([
            'new-category' => 'required|string|max:255'
        ]);

        Kategori::create([
            'nama' => $request->input('new-category')
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function deleteCategory($param)
    {
        $kategori = Kategori::where('nama', $param)->firstOrFail();
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}

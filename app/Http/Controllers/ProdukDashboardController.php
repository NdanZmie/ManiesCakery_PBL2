<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdukDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();
        
        $filter = $request->query('filter');
        if ($filter === 'favorite') {
            $query->where('favourit', 1);
        }

        $category = $request->query('category');
        if ($category) {
            $query->where('kategori', $category);
        }

        $products = $query->latest()->get();
        $categories = Kategori::all();
        $editStatus = false;
        $favoriteCount = Produk::where('favourit', 1)->count();
        $totalCount = Produk::count();

        return view('pages.dashboard.products', compact('products', 'categories', 'editStatus', 'favoriteCount', 'totalCount', 'filter', 'category'));
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
        $favoriteCount = Produk::where('favourit', 1)->count();
        $totalCount = Produk::count();

        return view('pages.dashboard.products', compact('products', 'categories', 'editStatus', 'keyword', 'favoriteCount', 'totalCount'));
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
            'favourit' => $request->has('favourit') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Produk $product)
    {
        $categories = Kategori::all();
        $products = Produk::all();
        $editStatus = true;
        $favoriteCount = Produk::where('favourit', 1)->count();
        $totalCount = Produk::count();

        return view('pages.dashboard.products', compact('product', 'categories', 'products', 'editStatus', 'favoriteCount', 'totalCount'));
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
            'favourit' => $request->has('favourit') ? 1 : 0,
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

    public function toggleFavorite(Produk $product)
    {
        $product->favourit = $product->favourit ? 0 : 1;
        $product->save();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'isFavourite' => (bool)$product->favourit,
                'message' => $product->favourit ? "Produk '{$product->nama}' dijadikan menu favorit!" : "Produk '{$product->nama}' dihapus dari menu favorit."
            ]);
        }

        $statusText = $product->favourit ? 'dijadikan sebagai menu favorit (tampil di beranda)' : 'dihapus dari menu favorit';
        return back()->with('success', "Produk '{$product->nama}' berhasil {$statusText}.");
    }

    public function syncFavorites(Request $request)
    {
        $selectedIds = $request->input('selected_ids', []);
        
        if (count($selectedIds) > 5) {
            return response()->json([
                'success' => false,
                'message' => 'Maksimal 5 produk yang dapat dipilih untuk ditampilkan di Menu Favorit Beranda.'
            ], 422);
        }

        // Reset all to 0, then update selected to 1
        Produk::query()->update(['favourit' => 0]);
        if (!empty($selectedIds)) {
            Produk::whereIn('id', $selectedIds)->update(['favourit' => 1]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Daftar Menu Favorit Beranda berhasil diperbarui (maksimal 5 produk)!',
            'count' => count($selectedIds)
        ]);
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

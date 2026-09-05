<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index($param, Request $request)
    {
        $query = Produk::query();

        if ($param !== "*") {
            $query->where('kategori', $param);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        $sort = $request->input('sort', 'default');
        if ($sort === 'price_low') {
            $query->orderBy('harga', 'asc');
        } elseif ($sort === 'price_high') {
            $query->orderBy('harga', 'desc');
        } elseif ($sort === 'popular') {
            $query->orderBy('favourit', 'desc')->latest();
        } else {
            $query->latest();
        }

        $products = $query->get();
        $categories = Kategori::all();
        $selectedCategories = $param;

        // Calculate count of products per category
        $categoryCounts = [];
        $totalCount = Produk::where('status', true)->count();
        $categoryCounts['*'] = $totalCount;
        foreach ($categories as $cat) {
            $categoryCounts[$cat->nama] = Produk::where('kategori', $cat->nama)->where('status', true)->count();
        }

        return view('pages.product_page', compact('products', 'categories', 'selectedCategories', 'categoryCounts', 'sort'));
    }


    public function produkDetail($id)
    {
        $produk = Produk::findOrFail($id); // akan throw 404 kalau tidak ketemu
        return view('pages.produk_detail', compact('produk'));
    }

    public function toggleStatus(Request $request)
    {
        // if (in_array(Auth::user()->role, ['admin', 'superadmin'])) {
        //     abort(403, 'Unauthorized');
        // }

        $ids = $request->input('selected_products', []);
        $action = $request->input('action');
        if (empty($ids)) {
            return back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        $status = $action === 'enable' ? 1 : 0;

        Produk::whereIn('id', $ids)->update(['status' => $status]);

        return back()->with('success', 'Status produk berhasil diperbarui.');
    }

}

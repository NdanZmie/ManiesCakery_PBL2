<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Kategori;
use App\Models\Produk;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['pages.product_page', 'pages.produk_detail'], function ($view) {
            $view->with('categories', Kategori::all());
        });

        View::composer('index_new', function ($view) {
            $produkFavorit = Produk::where('favourit', 1)->take(5)->get();
            if ($produkFavorit->isEmpty()) {
                $produkFavorit = Produk::where('status', 1)->take(5)->get();
            }
            $view->with('produkFavorit', $produkFavorit);
        });
    }
}

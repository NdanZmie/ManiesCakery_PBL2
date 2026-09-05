<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Models\Slider;
use App\Models\Produk;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    $sliders = Slider::orderBy('id')->take(5)->get();

    while ($sliders->count() < 5) {
        $sliders->push(null);
    }

    $produkFavorit = Produk::where('favourit', 1)->latest()->take(5)->get();
    if ($produkFavorit->isEmpty()) {
        $produkFavorit = Produk::where('status', 1)->latest()->take(5)->get();
    }

    $allProducts = Produk::orderBy('nama')->get();
    $categories = \App\Models\Kategori::all();

    return view('index_new', [
        'sliders' => $sliders,
        'produkFavorit' => $produkFavorit,
        'allProducts' => $allProducts,
        'categories' => $categories,
    ]);
})->name('home');

// Products Catalog
Route::get('/products/category={param}', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'produkDetail'])->name('produk.detail');

// About Us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');
Route::get('/about_us', function () {
    return redirect()->route('about.index');
})->name('about_us');

// Project Documentation
Route::get('/dokumentasi', [\App\Http\Controllers\DocsController::class, 'index'])->name('docs.index');
Route::get('/docs', function () {
    return redirect()->route('docs.index');
})->name('docs');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/login/guest', [LoginController::class, 'guestLogin'])->name('login.guest');

    // Register
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

    // Forgot / Reset Password
    Route::get('/lupapassword', function () {
        return view('pages.lupa_password');
    })->name('lupapassword');
    Route::post('/lupapassword', [ForgotPasswordController::class, 'checkEmail'])->name('password.check');

    Route::get('/resetpassword', function () {
        return view('pages.reset_password');
    })->name('resetpassword');
    Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
});

// Logout (Authenticated)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin & Superadmin Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard Home
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products Management
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/products', [ProdukDashboardController::class, 'index'])->name('product.index');
        Route::post('/products', [ProdukDashboardController::class, 'store'])->name('product.store');
        Route::get('/products/search', [ProdukDashboardController::class, 'search'])->name('product.search');
        Route::get('/products/{product}/edit', [ProdukDashboardController::class, 'edit'])->name('product.edit');
        Route::put('/products/{product}', [ProdukDashboardController::class, 'update'])->name('product.update');
        Route::post('/products/{product}/toggle-favorite', [ProdukDashboardController::class, 'toggleFavorite'])->name('product.toggle-favorite');
        Route::post('/products/sync-favorites', [ProdukDashboardController::class, 'syncFavorites'])->name('product.sync-favorites');
        Route::delete('/products/{product}', [ProdukDashboardController::class, 'destroy'])->name('product.destroy');

        // Categories Management
        Route::post('/kategori/tambah', [ProdukDashboardController::class, 'addNewCategory'])->name('kategori.tambah');
        Route::delete('/kategori/{nama}', [ProdukDashboardController::class, 'deleteCategory'])->name('kategori.hapus');
    });

    // Toggle Product Status
    Route::post('/produk/toggle-status', [ProdukController::class, 'toggleStatus'])->name('produk.toggle-status');

    // Users Management
    Route::get('/usersdashboard', [UserController::class, 'index'])->name('usersdashboard');
    Route::resource('users', UserController::class);

    // Slider Management
    Route::post('/slider/update', [SliderController::class, 'update'])->name('slider.update');

    // About Us Content Management
    Route::get('/about-us/{id}/edit', [AboutUsController::class, 'edit'])->name('about.edit');
    Route::put('/about-us/{id}/update/about', [AboutUsController::class, 'updateAbout'])->name('about.update.about');
    Route::put('/about-us/{id}/update/philosophy', [AboutUsController::class, 'updatePhilosophy'])->name('about.update.philosophy');
    Route::put('/about-us/update/galeri', [AboutUsController::class, 'updateGaleri'])->name('about.update.galeri');
    Route::delete('/about-us/{id}/delete/{section}', [AboutUsController::class, 'destroyText'])->name('about.destroyText');
    Route::get('/about_us_admin', function () {
        return view('pages.about_us_admin');
    });
});



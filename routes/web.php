<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Models\Slider;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Auth\ForgotPasswordController;


// Routes LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// END Routes LOGIN

// Routes Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
// END Routes Register

// Routes Profil
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// end Routes Profil

// Produk Catalog Routes
Route::get('/products/category={param}', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'produkDetail'])->name('produk.detail');
Route::get('/produk', [ProdukController::class, 'toggleStatus'])->name('produk.toggle-status');

// Produk Catalog Routes
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/products', [ProdukDashboardController::class, 'index'])->name('product.index');
    Route::post('/products', [ProdukDashboardController::class, 'store'])->name('product.store');
    Route::get('products/search', [ProdukDashboardController::class, 'search'])->name('product.search');
    Route::get('/products/{product}/edit', [ProdukDashboardController::class, 'edit'])->name('product.edit');
    Route::put('/products/{product}', [ProdukDashboardController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProdukDashboardController::class, 'destroy'])->name('product.destroy');
    Route::post('/kategori/tambah', [ProdukDashboardController::class, 'addNewCategory'])->name('kategori.tambah');
    Route::delete('/kategori/{id}', [ProdukDashboardController::class, 'deleteCategory'])->name('kategori.hapus');
});

// Route About Us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');
Route::get('/about-us/{id}/edit', [AboutUsController::class, 'edit'])->name('about.edit');
Route::put('/about-us/{id}/update/about', [AboutUsController::class, 'updateAbout'])->name('about.update.about');
Route::put('/about-us/{id}/update/philosophy', [AboutUsController::class, 'updatePhilosophy'])->name('about.update.philosophy');
Route::put('/about-us/update/galeri', [AboutUsController::class, 'updateGaleri'])->name('about.update.galeri');
Route::delete('/about-us/{id}/delete/{section}', [AboutUsController::class, 'destroyText'])->name('about.destroyText');


// Route::get('/usersdashboard', [UserController::class, 'index']);
// Route::get('/usersdashboard', [UserController::class, 'index'])->name('usersdashboard');
// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// Route::resource('users', UserController::class);

Route::get('/usersdashboard', [UserController::class, 'index'])->name('usersdashboard');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::resource('users', UserController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes Profil
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// end Routes Profil

// Routes Gambar Slider
Route::get('/', function () {
    $sliders = Slider::orderBy('id')->take(5)->get();

    // Tambah null jika data kurang dari 5 agar tetap 5 slot
    while ($sliders->count() < 5) {
        $sliders->push(null);
    }

    $produkFavorit = Produk::where('favourit', 1)->take(4)->get();
    if ($produkFavorit->isEmpty()) {
        $produkFavorit = Produk::where('status', 1)->take(4)->get();
    }

    return view('index_new', [
        'sliders' => $sliders,
        'produkFavorit' => $produkFavorit,
    ]);
});
Route::post('/slider/update', [SliderController::class, 'update'])->name('slider.update');
// END Routes Gambar Slider

Route::post('/logout', function () {
    Auth::logout();
        return redirect('/login');
    })->name('logout');

// // Routes lupa password
// Route::get('/lupapassword', function () {
//     return view('pages.lupa_password');
// })->name('lupapassword');
// // END Routes lupa password

// // Routes reset password
// Route::get('/resetpassword', function () {
//     return view('pages.reset_password');
// });




Route::get('/lupapassword', function () {
    return view('pages.lupa_password');
})->name('lupapassword');

Route::post('/lupapassword', [ForgotPasswordController::class, 'checkEmail'])->name('password.check');

Route::get('/resetpassword', function () {
    return view('pages.reset_password');
})->name('resetpassword');

Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');




Route::get('/about_us', function () {
    return view('pages.about_us');
})->name('about_us');

Route::get('/about_us_admin', function () {
    return view('pages.about_us_admin');
});


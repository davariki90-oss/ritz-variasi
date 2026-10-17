<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman publik (bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{layanan}', [LayananController::class, 'show'])->name('layanan.show');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

/*
|--------------------------------------------------------------------------
| Auth customer
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Area customer (wajib login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/booking/{layanan?}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{booking}', [DashboardController::class, 'show'])->name('dashboard.show');

    Route::post('/rating/{booking}', [RatingController::class, 'store'])->name('rating.store');
});

/*
|--------------------------------------------------------------------------
| Auth admin (guard terpisah, prefix /admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'store']);
    });

    Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('logout')->middleware('auth:admin');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('produk', AdminProdukController::class)->except(['show']);
        Route::resource('layanan', AdminLayananController::class)->except(['show']);

        Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
        Route::get('/booking/{booking}', [AdminBookingController::class, 'show'])->name('booking.show');
        Route::post('/booking/{booking}/terima', [AdminBookingController::class, 'terima'])->name('booking.terima');
        Route::post('/booking/{booking}/tolak', [AdminBookingController::class, 'tolak'])->name('booking.tolak');
        Route::post('/booking/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('booking.status');

        Route::get('/customer', [AdminCustomerController::class, 'index'])->name('customer.index');
        Route::get('/customer/{user}', [AdminCustomerController::class, 'show'])->name('customer.show');
    });
});

<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');





Route::get('/', function () {
    return view('User.partial.home');
})->name('user');

Route::get('/about', function(){
    return view('User.About Us.about');
})->name('about-us');

Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');
Route::get('/donate/{id}', [DonateController::class, 'show'])->name('donate.show');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::middleware(['auth'])->group(function(){
    Route::prefix('/user')->group(function(){

        Route::get('/seting', function () {
            return view('User.halaman.seting-akun');
        })->name('user.seting');

        Route::prefix('/donasi')->group(function(){
            Route::get('/', [DonateController::class, 'index'])->name('user.donasi.index');
            Route::get('/{id}', [DonateController::class, 'show'])->name('user.donasi.show');
        });

        Route::prefix('/artikel')->group(function(){
            Route::get('/', [ArtikelController::class, 'index'])->name('user.artikel.index');
            Route::get('/{id}', [ArtikelController::class, 'show'])->name('user.artikel.show');
        });

        Route::prefix('/transaksi')->group(function(){
            Route::post('/create', [TransaksiController::class, 'store'])->name('user.transaksi.store');
        });
    });

    Route::prefix('/admin')->group(function () {

        Route::get('/',function(){
            return view('admin.index');
        })->name('admin');

        Route::prefix('/admin')->group(function(){
            Route::get('/',function(){
                return view('admin.index');
            })->name('admin');

            Route::prefix('/donasi')->group(function(){
                Route::get('/', [DonasiAdminController::class, 'index'])->name('admin.donasi.index');
                Route::get('/{id}', [DonasiAdminController::class, 'show'])->name('admin.donasi.show');
                Route::get('/create', [DonasiAdminController::class,'create'])->name('admin.donasi.create');
                Route::post('/create', [DonasiAdminController::class,'store'])->name('admin.donasi.store');
                Route::get('/{id}/edit', [DonasiAdminController::class,'edit'])->name('admin.donasi.edit');
                Route::put('/{id}/edit', [DonasiAdminController::class,'update'])->name('admin.donasi.update');
                Route::delete('/{id}', [DonasiAdminController::class,'dstroy'])->name('admin.donasi.destroy');
            });

            Route::prefix('/artikel')->group(function(){
                Route::get('/', [ArtikelAdminController::class, 'index'])->name('admin.artikel.index');
                Route::get('/{id}', [ArtikelAdminController::class, 'show'])->name('admin.artikel.show');
                Route::get('/create', [ArtikelAdminController::class,'create'])->name('admin.artikel.create');
                Route::post('/create', [ArtikelAdminController::class,'store'])->name('admin.artikel.store');
                Route::get('/{id}/edit', [ArtikelAdminController::class,'edit'])->name('admin.artikel.edit');
                Route::put('/{id}/edit', [ArtikelAdminController::class,'update'])->name('admin.artikel.update');
                Route::delete('/{id}', [ArtikelAdminController::class,'dstroy'])->name('admin.artikel.destroy');
            });

            Route::prefix('/transaksi')->group(function(){
                Route::get('/', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
                Route::get('/{id}', [TransaksiController::class, 'show'])->name('admin.transaksi.show');
                Route::put('/{id}/edit', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
            });
        });
    });
});

Auth::routes();
Auth::routes(['verify' => true]);

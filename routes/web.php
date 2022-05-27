<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\User\ArtikelController;
use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\TransaksiController;
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

Route::get('/about', function () {
    return view('User.About Us.about');
})->name('about-us');

Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');


// yang faros rubah -- soale masih pusing baca codingan saugi
Route::get('/seting', function () {
    return view('User.halaman.seting-akun');
})->middleware('auth');


Route::get('/donass/detail', function () {
    return view('User.halaman.donation-detail');
})->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');


    Route::resource('/artikel-admin', ArtikelAdminController::class);
    Route::resource('/donasi-admin', DonasiAdminController::class);
    Route::resource('/profile', ProfileAdminController::class);

    Route::prefix('/transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
        Route::get('/{id}', [TransaksiController::class, 'show'])->name('admin.transaksi.show');
        Route::put('/{id}/edit', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
    });
});

Auth::routes();
Auth::routes(['verify' => true]);

<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DonateController;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('User.partial.home');
});


Route::get('/about', function(){
    return view('User.About Us.about');
});

Route::prefix('/donate')->group(function(){
    Route::get('/', [DonateController::class, 'index'])->name('donate.index');
    Route::get('/{id}', [DonateController::class, 'show'])->name('donate.show');
    Route::get('/create', [DonateController::class, 'create'])->name('donate.create');
    Route::post('/create', [DonateController::class, 'store'])->name('donate.store');
    Route::get('/{id}/edit', [DonateController::class, 'edit'])->name('donate.edit');
    Route::put('/{id}/edit', [DonateController::class, 'update'])->name('donate.update');
    Route::delete('/{id}', [DonateController::class, 'destroy'])->name('donate.destroy');
});

Route::prefix('/artikel')->group(function(){
    Route::get('/', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::get('/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/create', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/{id}/edit', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
});






Route::get('/seting', function () {
    return view('User.halaman.seting-akun');
});



// yang faros rubah -- soale masih pusing baca codingan saugi
Route::get('/donass/detail', function () {
    return view('User.halaman.donation-detail');
});

Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/',function(){
        return view('admin.index');
    });
    
    Route::resource('/artikel-admin', ArtikelAdminController::class);
    Route::resource('/donasi-admin', DonasiAdminController::class );

});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DonateController;
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
});


Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');
Route::get('/donate/{id}', [DonateController::class, 'show'])->name('donate.show');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::prefix('/dashboard')->middleware(['auth'])->group(function(){
    Route::prefix('/donate')->group(function(){
        Route::get('/', [DonateController::class, 'index'])->name('dashboard.donate.index');
        Route::get('/{id}', [DonateController::class, 'show'])->name('dashboard.donate.show');
        Route::get('/create', [DonateController::class, 'create'])->name('dashboard.donate.create');
        Route::post('/create', [DonateController::class, 'store'])->name('dashboard.donate.store');
        Route::get('/{id}/edit', [DonateController::class, 'edit'])->name('dashboard.donate.edit');
        Route::put('/{id}/edit', [DonateController::class, 'update'])->name('dashboard.donate.update');
        Route::delete('/{id}', [DonateController::class, 'destroy'])->name('dashboard.donate.destroy');
    });

    Route::prefix('/artikel')->group(function(){
        Route::get('/', [ArtikelController::class, 'index'])->name('dashboard.artikel.index');
        Route::get('/{id}', [ArtikelController::class, 'show'])->name('dashboard.artikel.show');
        Route::get('/create', [ArtikelController::class, 'create'])->name('dashboard.artikel.create');
        Route::post('/create', [ArtikelController::class, 'store'])->name('dashboard.artikel.store');
        Route::get('/{id}/edit', [ArtikelController::class, 'edit'])->name('dashboard.artikel.edit');
        Route::put('/{id}/edit', [ArtikelController::class, 'update'])->name('dashboard.artikel.update');
        Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('dashboard.artikel.destroy');
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


    Route::prefix('/donasi')->group(function(){
        Route::get('/', [DonateController::class, 'index'])->name('dashboard.donasi.index');
        Route::get('/{id}', [DonateController::class, 'show'])->name('dashboard.donasi.show');
        Route::get('/create', [DonateController::class, 'create'])->name('dashboard.donasi.create');
        Route::post('/create', [DonateController::class, 'store'])->name('dashboard.donasi.store');
        Route::get('/{id}/edit', [DonateController::class, 'edit'])->name('dashboard.donasi.edit');
        Route::put('/{id}/edit', [DonateController::class, 'update'])->name('dashboard.donasi.update');
        Route::delete('/{id}', [DonateController::class, 'destroy'])->name('dashboard.donasi.destroy');
    });
});


Route::get('/seting', function () {
    return view('User.halaman.seting-akun');
})->middleware('auth');



// yang faros rubah -- soale masih pusing baca codingan saugi
Route::get('/donass/detail', function () {
    return view('User.halaman.donation-detail');
})->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    
    Route::get('/',function(){
        return view('admin.index');
    })->name('admin');
    
    Route::resource('/artikel-admin', ArtikelAdminController::class);
    Route::resource('/donasi-admin', DonasiAdminController::class );

});

<<<<<<< Updated upstream
=======




>>>>>>> Stashed changes
Auth::routes();
Auth::routes(['verify' => true]);;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

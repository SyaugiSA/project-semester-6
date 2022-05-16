<?php

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

Route::prefix('/doate')->group(function(){
    Route::get('/', [DonateController::class, 'index']);
    Route::get('/{id}', [DonateController::class, 'show']);
    Route::get('/create', [DonateController::class, 'create']);
    Route::post('/create', [DonateController::class, 'store']);
    Route::get('/{id}/edit', [DonateController::class, 'edit']);
    Route::put('/{id}/edit', [DonateController::class, 'update']);
    Route::delete('/{id}', [DonateController::class, 'destroy']);
});

Route::prefix('/artikel')->group(function(){
    Route::get('/', [ArtikelController::class, 'index']);
    Route::get('/{id}', [ArtikelController::class, 'show']);
    Route::get('/create', [ArtikelController::class, 'create']);
    Route::post('/create', [ArtikelController::class, 'store']);
    Route::get('/{id}/edit', [ArtikelController::class, 'edit']);
    Route::put('/{id}/edit', [ArtikelController::class, 'update']);
    Route::delete('/{id}', [ArtikelController::class, 'destroy']);
});

Route::get('/seting', function () {
    return view('User.halaman.seting-akun');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

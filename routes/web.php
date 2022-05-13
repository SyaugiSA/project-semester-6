<?php

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


Route::get('/donate', function () {
    return view('User.halaman.donate');
});

Route::get('/donate/detail', function () {
    return view('User.halaman.donation-detail');
});

Route::get('/artikel', function () {
    return view('User.halaman.artikel');
});
Route::get('/artikel/detail', function () {
    return view('User.halaman.artikel-detail');
});
Route::get('/seting', function () {
    return view('User.halaman.seting-akun');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

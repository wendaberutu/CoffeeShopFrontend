<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
})->name('login');  

Route::get('/requestOtp', function () {
    return view('requestOtp'); // Halaman registrasi
})->name('requestOtp');

Route::get('/otp/verify', function () {
    return view('verivy');  // Menampilkan halaman verifikasi OTP
});
Route::get('/formRegister', function () {
    return view('formRegister'); // Halaman pendaftaran
});
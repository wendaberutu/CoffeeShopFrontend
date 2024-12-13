<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/admin/products', [ProductController::class, 'index']);



// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('admin/products/{id}', [ProductController::class, 'edit']);

 

Route::get('/admin/tambah', function () {
    return view('admin.tambah');
})->name('tambah.product');

Route::get('/admin/broadcast', function () {
    return view('admin.broadcast');
})->name('admin.broadcast');

Route::get('/otp/request', function () {
    return view('requestOtp');
})->name('otp.request');

Route::get('/register', function () {
    return view('formRegister'); // Halaman register
})->name('register');


Route::post('/otp/request', [OtpController::class, 'requestOTP'])->name('otp.request');
Route::get('/otp/verify', [OtpController::class, 'otpVerify'])->name('otp.verify');
Route::post('/otp/verify', [OtpController::class, 'postVerify'])->name('post.verify');


Route::prefix('user')->group(function () {
    Route::get('product', function () {
        return view('user.user-menu');
    })->name('user.product');

    Route::get('dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

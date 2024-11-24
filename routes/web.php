<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;

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

Route::get('/otp/request', function () {
    return view('requestOtp');  
})->name('otp.request');

Route::get('/register', function () {
    return view('formRegister'); // Halaman register
})->name('register');


Route::post('/otp/request', [OtpController::class, 'requestOTP'])->name('otp.request');
Route::get( '/otp/verify', [OtpController::class, 'otpVerify'])->name('otp.verify');
Route::get('/register', [OtpController::class, 'getRegister'])->name('register');
Route::post('/otp/verify', [OtpController::class, 'postVerify'])->name('post.verify');





Route::prefix('admin')->group(function () {
    Route::get('broadcast', function () {
        return view('admin.broadcast');
    })->name('admin.broadcast');

    Route::get('menu', function () {
        return view('admin.menu');
    })->name('admin.menu');

    Route::get('tambah-menu', function () {
        return view('admin.tambah');
    })->name('admin.tambah.menu');

    Route::get('edit-menu', function () {
        return view('admin.edit');
    })->name('admin.edit.menu');
});



Route::prefix('user')->group(function () {
    Route::get('menu', function () {
        return view('user.menu');
    })->name('user.menu');
});
 

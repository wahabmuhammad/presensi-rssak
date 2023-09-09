<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\registerController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
})->name('login');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/create', [PresensiController::class, 'index'])->name('presensi')->middleware('auth');
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::post('presensi_rssak/public/store', [PresensiController::class, 'store'])->name('store')->middleware('auth');

Route::get('/register', [registerController::class, 'register'])->name('register');
Route::post('/register/store', [registerController::class, 'store'])->name('storedata');

Route::controller(registerController::class)->group(function(){
    Route::get('/ResetPassword', 'update')->name('resetPassword');
    Route::post('/ResetPassword/reset', 'resetPassword')->name('reset');
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('/reset-passsword', [registerController::class, 'reset'])->name('reset-password');
});


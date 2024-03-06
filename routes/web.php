<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\presensiOut_Controller;
use App\Http\Controllers\profilController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\registerController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

URL::forceScheme('https');

// Route home
Route::get('/', function () {
    return view('auth.login');
})->name('login');

//Route Pegawai 
Route::middleware(['auth', 'cekRole'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/slip-gaji/{user}', [profilController::class, 'slipgaji'])->name('slip-gaji');
    Route::get('/profil{user}', [profilController::class, 'index'])->name('profil');
    Route::put('/update-profile{user}', [profilController::class, 'store'])->name('updateprofil');
    Route::get('/slip-gaji{user}', [profilController::class, 'slipgaji'])->name('slipgaji');
    Route::get('/masuk', [PresensiController::class, 'index'])->name('masuk');
    Route::get('/pulang', [presensiOut_Controller::class, 'index'])->name('pulang');
    Route::post('/presensi/public/masuk', [PresensiController::class, 'store'])->name('store');
    Route::post('/presensi/public/pulang', [presensiOut_Controller::class, 'store'])->name('pulangStore');
});

// Route Admin
Route::middleware(['auth', 'cekAdmin'])->group(function(){
    Route::get('/user', [adminController::class, 'user'])->name('kepegawaianUser');
    Route::post('/user/create-user', [adminController::class, 'create_user'])->name('createUser');
    Route::get('/admin', [adminController::class, 'index'])->name('adminDashboard')->name('admin');
    Route::get('/rekap_Presensi_in', [adminController::class, 'rekap'])->name('rekapPresensi_In');
    Route::get('/rekap_Presensi_in/export/excel', [adminController::class, 'exportMasuk']);
    Route::get('/rekap_Presensi_out/export/excel', [adminController::class, 'exportPulang']);
    Route::get('/rekap_Presensi_out', [adminController::class, 'rekapOut'])->name('rekapPresensi_Out');
    Route::get('/user/{user}/edit', [adminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [adminController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{user}', [adminController::class, 'destroy'])->name('user.delete');
    Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment');
    Route::post('/send/{id}', [RecruitmentController::class, 'sendwa'])->name('sendwa');
});

// Route Login dan Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');

// Route Register
Route::controller(registerController::class)->group(function () {
    Route::get('/register', [registerController::class, 'register'])->name('register');
    Route::post('/register/store', [registerController::class, 'store'])->name('storedata');
    Route::get('/ResetPassword', 'update')->name('resetPassword');
    Route::post('/ResetPassword/reset', 'resetPassword')->name('reset');
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('/reset-passsword', [registerController::class, 'reset'])->name('reset-password');
});

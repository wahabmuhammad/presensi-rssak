<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\cutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\historiPresensi_Controller;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\presensiOut_Controller;
use App\Http\Controllers\profilController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\registerController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\App;
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
    Route::get('/history/{user}', [historiPresensi_Controller::class, 'show'])->name('historiPresensi');
    Route::get('/slip-gaji/{user}', [profilController::class, 'slipgaji'])->name('slip-gaji');
    // Route::get('/cuti', [cutiController::class, 'index'])->name('cuti');
    Route::get('/profil/{user}', [profilController::class, 'index'])->name('profil');
    Route::put('/update-profile{user}', [profilController::class, 'store'])->name('updateprofil');
    Route::get('/get-data-pegawai', [profilController::class, 'get_data_pegawai'])->name('pegawai.search'); //for ajax edit profile
    // Route::get('/slip-gaji{user}', [profilController::class, 'slipgaji'])->name('slipgaji');
    Route::get('/masuk', [PresensiController::class, 'index'])->name('masuk');
    Route::get('/pulang', [presensiOut_Controller::class, 'index'])->name('pulang');
    Route::get('/dinas-luar', [PresensiController::class, 'dinasLuar'])->name('dinasLuar');
    Route::get('/cuti', [PresensiController::class, 'indexcuti'])->name('cuti');
    Route::post('/presensi/public/masuk', [PresensiController::class, 'store'])->name('store');
    Route::post('/presensi/public/pulang', [presensiOut_Controller::class, 'store'])->name('pulangStore');
});

// Route Admin
Route::middleware(['auth', 'cekAdmin'])->group(function () {
    //Route Slip Gaji Pegawai
    Route::get('/slip-gaji', [adminController::class, 'slip_gaji_pegawai_index'])->name('slip-gaji');
    Route::get('/slip-gaji-get-data', [adminController::class, 'get_data_slip_gaji'])->name('getDataSlipGaji');

    Route::get('/user', [adminController::class, 'user'])->name('kepegawaianUser');
    Route::get('/gaji-pegawai', [adminController::class, 'inputGaji'])->name('gajiPegawai');
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
    Route::post('/bulk-send', [RecruitmentController::class, 'bulkSend'])->name('bulkSend');
    //Route Data Pegawai
    Route::get('/data-pegawai', [adminController::class, 'dataPegawai'])->name('dataPegawai');
    Route::get('/get/data-pegawai', [adminController::class, 'get_datapegawai']);
    Route::get('/pegawai/{pegawaiId}/get', [adminController::class, 'edit_pegawai'])->name('editPegawai');
    Route::put('/pegawai/update', [adminController::class, 'update_pegawai'])->name('updatePegawai');
    Route::get('/pegawai/options', [adminController::class, 'options_datapegawai']);
    Route::post('/pegawai/store', [adminController::class, 'store_datapegawai'])->name('storeDatapegawai');
    Route::get('/get-data-gaji-pegawai', [adminController::class, 'get_data_gaji_pegawai'])->name('getDataGajiPegawai');
    Route::post('/gaji-pegawai/komponen-gaji/save', [adminController::class, 'store_komponengaji'])->name('storeKomponengajiPegawai');
    Route::get('/pegawai/{pegawaiId}/get-komponen-gaji', [adminController::class, 'edit_komponen_gaji'])->name('editKomponenGaji');
    Route::put('/pegawai/komponen-gaji/update', [adminController::class, 'update_komponengaji'])->name('updateKomponenGaji');
    Route::get('/get-komponen-gaji/pegawai', [adminController::class, 'get_komponen_gaji'])->name('getKomponenGaji');

    //route komponen gaji
    Route::get('/komponen-gaji-index', [adminController::class, 'komponenGajiIndex'])->name('komponenGajiIndex');
    Route::get('/komponen-gaji/get-data-tunjangan-pangan', [adminController::class, 'get_data_tunjangan_pangan'])->name('getDataStatusTunjanganPangan'); //for ajax pagination dan search status tunjangan pangan
    Route::get('/komponen-gaji/get-kode-tunjangan-pangan', [adminController::class, 'get_data_kode_tunjangan_pangan'])->name('getDataKodeTunjanganPangan'); //for ajax autocomplete kode tunjangan pangan
    Route::post('/komponen-gaji/save-status-tunjangan-pangan', [adminController::class, 'store_status_tunjangan_pangan'])->name('storeStatusTunjanganPangan');

    //route komponen gaji tunjangan fungsional
    Route::get('/komponen-gaji/get-data-tunjangan-fungsional', [adminController::class, 'get_data_tunjangan_fungsional'])->name('getDataStatusTunjanganFungsional'); //for ajax pagination dan search status tunjangan fungsional
    Route::post('/komponen-gaji/save-status-tunjangan-fungsional', [adminController::class, 'store_status_tunjangan_fungsional'])->name('storeStatusTunjanganFungsional');
    Route::get('/komponen-gaji/get-kode-tunjangan-fungsional', [adminController::class, 'get_data_kode_tunjangan_fungsional'])->name('getDataKodeTunjanganFungsional'); //for ajax autocomplete kode tunjangan fungsional

    //Route komponen gaji tunjangan jabatan
    Route::get('/komponen-gaji/get-data-tunjangan-jabatan', [adminController::class, 'get_data_tunjangan_jabatan'])->name('getDataStatusTunjanganJabatan'); //for ajax pagination dan search status tunjangan jabatan
    Route::get('/komponen-gaji/get-kode-tunjangan-jabatan', [adminController::class, 'get_data_kode_tunjangan_jabatan'])->name('getDataKodeTunjanganJabatan'); //for ajax autocomplete kode tunjangan jabatan
    Route::post('/komponen-gaji/save-status-tunjangan-jabatan', [adminController::class, 'store_status_tunjangan_jabatan'])->name('storeStatusTunjanganJabatan');

    //Route komponen gaji tunjangan kinerja
    Route::get('/komponen-gaji/get-data-tunjangan-kinerja', [adminController::class, 'get_data_tunjangan_kinerja'])->name('getDataStatusTunjanganKinerja'); //for ajax pagination dan search status tunjangan kinerja
    Route::post('/komponen-gaji/save-status-tunjangan-kinerja', [adminController::class, 'store_status_tunjangan_kinerja'])->name('storeStatusTunjanganKinerja');
    // Route::get('/login-page-new', [adminController::class, 'loginPageNew'])->name('loginPageNew');

    //Route BPJS Pegawai
    // Route::get('/bpjs-pegawai', [adminController::class, 'bpjs_pegawai_index'])->name('bpjsPegawaiIndex');
    Route::get('/bpjs-kesehatan', [adminController::class, 'bpjs_kesehatan_index'])->name('bpjsKesehatan');
    Route::get('/bpjs-ketenagakerjaan', [adminController::class, 'bpjs_ketenagakerjaan_index'])->name('bpjsKetenagakerjaan');
    Route::get('/potongan-pegawai', [adminController::class, 'potongan_pegawai_index'])->name('potonganPegawaiIndex');
    Route::get('/tunjangan-pegawai', [adminController::class, 'tunjangan_pegawai_index'])->name('tunjanganPegawaiIndex');

    //route ajax get-pegawai
    Route::get('/get-pegawai', [adminController::class, 'get_pegawai'])->name('get-pegawai');
    Route::get('/slip-gaji-pegawai', function(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.kepegawaian.slipgajiIndex');
        return $pdf->stream();
    });
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

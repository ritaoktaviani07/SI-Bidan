<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PasienController;
// use App\Http\Controllers\KunjunganPasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\IbuMelahirkanController;
use App\Http\Controllers\PemeriksaanKbController;
use App\Http\Controllers\PemeriksaanAnakController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SOptionController;
use App\Http\Controllers\VisitorController;

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
  return redirect('/cek-role');
})->name('landing');

// Route::middleware(['verified'])->group(function() {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/cek-role', function () {
  if (!Auth::check()) {
    return redirect('/login');
  } elseif (Auth::check() && auth()->user()->hasRole(['admin', 'bidan'])) {
    return redirect('/dashboard');
  } elseif (Auth::check() && auth()->user()->hasRole(['pengunjung'])) {
    return redirect('/visitor');
  }
});

Route::group(['middleware' => ['verified', 'role:admin|bidan']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::resource('/tindakan', TindakanController::class);
  Route::get('/tindakan/{id}/konfirmasi', [TindakanController::class, 'konfirmasi']);
  Route::get('/tindakan/{id}/delete', [TindakanController::class, 'delete']);


  Route::resource('/pasien', PasienController::class);
  Route::get('/pasien/{id}/konfirmasi', [PasienController::class, 'konfirmasi']);
  Route::get('/pasien/{id}/delete', [PasienController::class, 'delete']);


  Route::resource('/pemeriksaan', PemeriksaanController::class);
  Route::get('/pemeriksaan/{id}/konfirmasi', [PemeriksaanController::class, 'konfirmasi']);
  Route::get('/pemeriksaan/{id}/delete', [PemeriksaanController::class, 'delete']);
  Route::get('/pemeriksaan/status/{status}', [PemeriksaanController::class, 'showByStatus'])->name('pemeriksaanByStatus');
  Route::post('/pemeriksaan/status/updating', [PemeriksaanController::class, 'updateStatus'])->name('upstatus');
  Route::get('/pemeriksaan/laporan', [PemeriksaanController::class, 'laporan']);



  Route::resource('/ibu_hamil', IbuHamilController::class)->except('show');
  Route::resource('/ibu_melahirkan', IbuMelahirkanController::class)->except('show');
  Route::resource('/pemeriksaan_kb', PemeriksaanKbController::class)->except('show');
  Route::resource('/pemeriksaan_anak', PemeriksaanAnakController::class)->except('show');

  // Route::resource('/kunjungan_pasien', KunjunganPasienController::class);

  Route::resource('/rekam_medis', RekamMedisController::class);


  Route::resource('/admin', AdminController::class);
  Route::get('/admin/{id}/konfirmasi', [AdminController::class, 'konfirmasi']);
  Route::get('/admin/{id}/delete', [AdminController::class, 'delete']);



  Route::resource('/bidan', BidanController::class);
  Route::resource('/pengunjung', PengunjungController::class);


  Route::get('/footer', [FooterController::class, 'index']);
  Route::patch('/footer/{id}', [FooterController::class, 'update']);

  Route::get('/user/{id}/setting', [UserController::class, 'setting']);
  Route::patch('/user/{id}/setting', [UserController::class, 'ubah_password']);
});


// Route::middleware('auth','role:admin')->group(function() {
//     Route::get('/user',UserController::class);
// });

Route::middleware(['verified', 'role:pengunjung'])->group(function () {
  // Route::resource('visitor', VisitorController::class);
  Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor.index');
  Route::get('/visitor/profile', [VisitorController::class, 'profile'])->name('visitor.mprofile');
  Route::post('/visitor/profile/updating', [VisitorController::class, 'updateProfile'])->name('up-profile');
  Route::get('/visitor/registrasi', [VisitorController::class, 'registrasi'])->name('visitor.mregistrasi');
  Route::post('/visitor/registering', [VisitorController::class, 'registering'])->name('registering');
  Route::get('/visitor/report', [VisitorController::class, 'report'])->name('visitor.mreport');
  Route::get('/visitor/view/{id}', [VisitorController::class, 'show'])->name('showreport');
  Route::get('/visitor/print/{id}', [ReportController::class, 'pemeriksaanById'])->name('printreport');
});


Route::get('/getPemeriksaan/{id}', [SOptionController::class, 'getPemeriksaanById']);

Route::get('/report/pemeriksaan', [ReportController::class, 'allPemeriksaan'])->name('pemeriksaanPdf');
Route::post('/report/pemeriksaan', [ReportController::class, 'pemeriksaan']);
Route::get('/rekam_medis/print/{id}', [ReportController::class, 'rekammedisById'])->name('rekamoneprint');

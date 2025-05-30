<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\PerangkatLab1Controller;
use App\Http\Controllers\PerangkatLab2Controller;
use App\Http\Controllers\Auth\SiswaAuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
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

// Ubah default route ke halaman login siswa
Route::get('/', [SiswaAuthController::class, 'showLoginForm'])->name('login-siswa');

//route admin
;

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/siswa', [AdminController::class, 'indexSiswa'])->name('admin.siswa.index');
    Route::get('admin/perangkat-rusak', [AdminController::class, 'indexPerangkat'])->name('admin.rusak');
    Route::get('perangkat-rusak/{perangkatRusak}/edit', [AdminController::class, 'editperangkat'])->name('perangkat-rusak.edit');
    Route::put('perangkat-rusak/{perangkatRusak}', [AdminController::class, 'updateperangkat'])->name('perangkat-rusak.update');
    Route::delete('perangkat-rusak/{perangkatRusak}', [AdminController::class, 'destroyperangkat'])->name('perangkat-rusak.destroy');

    Route::get('admin/status-peminjaman', [AdminController::class, 'peminjaman'])->name('admin.peminjaman.index');
    Route::get('admin/peminjaman/{id}/edit', [AdminController::class, 'edit'])->name('admin.peminjaman.edit');
    Route::put('admin/peminjaman/{id}', [AdminController::class, 'update'])->name('admin.peminjaman.update');
    Route::delete('admin/peminjaman/{id}', [AdminController::class, 'destroypeminjaman'])->name('admin.peminjaman.destroy');
    Route::get('admin/status-pengambalian', [AdminController::class, 'pengembalian'])->name('admin.pengembalian.home');
    Route::get('admin/pengembalian/{id}/edit', [AdminController::class, 'editpengembalian'])->name('admin.pengembalian.edit');
    Route::put('admin/pengembalian/{id}', [AdminController::class, 'updatepengembalian'])->name('admin.pengembalian.update');
    Route::delete('admin/pengembalian/{id}', [AdminController::class, 'destroypengembalian'])->name('admin.pengembalian.destroy');
    Route::delete('admin/siswa/{id}', [AdminController::class, 'destroy'])->name('admin.siswa.hapus');
    Route::get('admin/laporan/data-siswa', [AdminController::class, 'datasiswa'])->name('admin.laporan.data-siswa');
    Route::get('admin/laporan/data-siswa/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.siswa.export.pdf');
    Route::get('admin/laporan/data-siswa/export/excel', [AdminController::class, 'exportExcel'])->name('admin.siswa.export.excel');
    Route::get('admin/laporan/data-peminjaman', [AdminController::class, 'datapeminjaman'])->name('admin.laporan.data-peminjaman');
    Route::get('admin/laporan/data-peminjaman/export/pdf', [AdminController::class, 'exportPdf1'])->name('admin.peminjaman.export.pdf');
    Route::get('admin/laporan/data-peminjaman/export/excel', [AdminController::class, 'exportExcel1'])->name('admin.peminjaman.export.excel');
    Route::get('admin/laporan/data-pengembalian', [AdminController::class, 'datapengembalian'])->name('admin.laporan.data-pengembalian');
    Route::get('admin/laporan/data-pengembalian/export/pdf', [AdminController::class, 'exportPdf2'])->name('admin.pengembalian.export.pdf');
    Route::get('admin/laporan/data-pengembalian/export/excel', [AdminController::class, 'exportExcel2'])->name('admin.pengembalian.export.excel');
    Route::get('admin/laporan/data-perangkat', [AdminController::class, 'dataperangkat'])->name('admin.laporan.data-perangkat');
    Route::get('admin/laporan/data-perangkat/export-pdf', [AdminController::class, 'exportPdf3'])->name('admin.laporan.export.pdf');
    Route::get('admin/laporan/data-perangkat/export-excel', [AdminController::class, 'exportExcel3'])->name('admin.laporan.export.excel');



});
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Rute untuk Ruang Server
Route::prefix('admin/ruang-server')->name('admin.rserver.')->group(function () {
    // Menampilkan daftar perangkat
    Route::get('/', [PerangkatController::class, 'index'])->name('index');
    
    // Menampilkan form untuk menambah perangkat baru
    Route::get('/create', [PerangkatController::class, 'create'])->name('create');
    
    // Menyimpan perangkat baru
    Route::post('/store', [PerangkatController::class, 'store'])->name('store');
    
    // Menampilkan detail perangkat
    Route::get('/{id}', [PerangkatController::class, 'show'])->name('show');
    
    // Menampilkan form untuk mengedit perangkat
    Route::get('/{id}/edit', [PerangkatController::class, 'edit'])->name('edit');
    
    // Memperbarui perangkat yang sudah ada
    Route::put('/{id}', [PerangkatController::class, 'update'])->name('update');
    
    // Menghapus perangkat
    Route::delete('/{id}', [PerangkatController::class, 'destroy'])->name('destroy');
});

// Rute untuk Ruang Lab 1
Route::prefix('admin/lab-sija-1')->name('admin.lab_sija_1.')->group(function () {
    // Menampilkan daftar perangkat
    Route::get('/', [PerangkatLab1Controller::class, 'index'])->name('index');
    
    // Menampilkan form untuk menambah perangkat baru
    Route::get('/create', [PerangkatLab1Controller::class, 'create'])->name('create');
    
    // Menyimpan perangkat baru
    Route::post('/store', [PerangkatLab1Controller::class, 'store'])->name('store');
    
    // Menampilkan detail perangkat
    Route::get('/{id}', [PerangkatLab1Controller::class, 'show'])->name('show');
    
    // Menampilkan form untuk mengedit perangkat
    Route::get('/{id}/edit', [PerangkatLab1Controller::class, 'edit'])->name('edit');
    
    // Memperbarui perangkat yang sudah ada
    Route::put('/{id}', [PerangkatLab1Controller::class, 'update'])->name('update');
    
    // Menghapus perangkat
    Route::delete('/{id}', [PerangkatLab1Controller::class, 'destroy'])->name('destroy');
});


// Rute untuk Ruang Lab 1
Route::prefix('admin/lab-sija-2')->name('admin.lab_sija_2.')->group(function () {
    // Menampilkan daftar perangkat
    Route::get('/', [PerangkatLab2Controller::class, 'index'])->name('index');
    
    // Menampilkan form untuk menambah perangkat baru
    Route::get('/create', [PerangkatLab2Controller::class, 'create'])->name('create');
    
    // Menyimpan perangkat baru
    Route::post('/store', [PerangkatLab2Controller::class, 'store'])->name('store');
    
    // Menampilkan detail perangkat
    Route::get('/{id}', [PerangkatLab2Controller::class, 'show'])->name('show');
    
    // Menampilkan form untuk mengedit perangkat
    Route::get('/{id}/edit', [PerangkatLab2Controller::class, 'edit'])->name('edit');
    
    // Memperbarui perangkat yang sudah ada
    Route::put('/{id}', [PerangkatLab2Controller::class, 'update'])->name('update');
    
    // Menghapus perangkat
    Route::delete('/{id}', [PerangkatLab2Controller::class, 'destroy'])->name('destroy');
});





// Route untuk dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth:admin');

// Routes siswa

Route::post('/login-siswa', [SiswaAuthController::class, 'login'])->name('login-siswa.submit');
Route::post('/register', [SiswaAuthController::class, 'register'])->name('register-siswa.submit');
Route::post('/logout-siswa', [SiswaAuthController::class, 'logout'])->name('logout-siswa');


Route::middleware('guest:siswa')->group(function () {
    Route::get('/login-siswa', [SiswaAuthController::class, 'showLoginForm'])->name('login-siswa');
    Route::get('/register-siswa', [SiswaAuthController::class, 'showRegisterForm'])->name('register-siswa');
});


// Routes yang membutuhkan autentikasi siswa
Route::middleware('auth:siswa')->group(function () {
    Route::get('/dashboard-siswa', [SiswaAuthController::class, 'dashboard'])->name('dashboard-siswa');
    Route::get('/perangkat', [SiswaAuthController::class, 'perangkat'])->name('perangkat'); 
    Route::get('/profile', [SiswaAuthController::class, 'profile'])->name('profile');
      Route::get('/info/perangkat/{id}', [SiswaAuthController::class, 'info'])->name('info');
    Route::get('/info/perangkatlab1/{id}', [SiswaAuthController::class, 'infoperangkatlab1'])->name('infoperangkatlab1');
    Route::get('/info/perangkatlab2/{id}', [SiswaAuthController::class, 'infoperangkatlab2'])->name('infoperangkatlab2');
    Route::get('/ajukan-kerusakan', [SiswaAuthController::class, 'index'])->name('ajukan-kerusakan.index');
      Route::get('/ajukan-kerusakan/create', [SiswaAuthController::class, 'create'])->name('ajukan-kerusakan.create');
    Route::post('/ajukan-kerusakan/store', [SiswaAuthController::class, 'store'])->name('ajukan-kerusakan.store');

    Route::resource('peminjaman', PeminjamanController::class)->except(['show']);
    

    
   // Routes for peminjaman
   Route::get('/Status-peminjaman', [PeminjamanController::class, 'index'])->name('siswa.peminjaman.index');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/get-perangkat', [PeminjamanController::class, 'getAllPerangkat'])->name('get.perangkat');

   // Routes for pengembalian 


   Route::get('/pengembalian/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
    Route::post('/pengembalian', [PengembalianController::class, 'store'])->name('pengembalian.store');
    Route::get('/Status-pengembalian', [PengembalianController::class, 'index'])->name('siswa.pengembalian.index');



});

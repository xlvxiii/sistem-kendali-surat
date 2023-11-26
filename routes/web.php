<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukPengelolaController;
use App\Http\Controllers\SuratKeluarPengelolaController;
use App\Http\Controllers\SuratKeluarPimpinanController;
use App\Http\Controllers\SuratMasukKabagController;
use App\Http\Controllers\SuratMasukPimpinanController;
use App\Http\Controllers\SuratMasukStaffController;

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [HomeController::class, 'indexAdmin'])->middleware('role:admin')->name('admin.dashboard');
Route::get('/pengolah', [HomeController::class, 'indexPengolah'])->middleware('role:unit pengolah')->name('pengolah.dashboard');
Route::get('/pimpinan', [HomeController::class, 'indexPimpinan'])->middleware('role:pimpinan')->name('pimpinan.dashboard');
Route::get('/kabag', [HomeController::class, 'indexKabag'])->middleware('role:kepala bagian')->name('kabag.dashboard');
Route::get('/staff', [HomeController::class, 'indexStaff'])->middleware('role:staff')->name('staff.dashboard');


Route::resource('/users', UserController::class)->middleware(['auth', 'role:admin|unit pengolah']);
Route::resource('/account', AccountController::class)->only(['edit', 'update'])->middleware(['auth'])->parameters(['account' => 'user']);

Route::resource('/suratMasuk', SuratMasukController::class)->middleware(['auth', 'role:admin']);
Route::get('/suratMasukPengelola/export', [SuratMasukPengelolaController::class, 'export'])->middleware(['auth', 'role:unit pengolah']);
Route::resource('/suratMasukPengelola', SuratMasukPengelolaController::class)->middleware(['auth', 'role:unit pengolah'])->parameters(['suratMasukPengelola' => 'suratMasuk']);
Route::get('/suratMasukPimpinan/pending', [SuratMasukPimpinanController::class, 'pending'])->name('pending')->middleware(['auth', 'role:pimpinan']);
Route::get('/suratMasukPimpinan/pending/{suratMasuk}', [SuratMasukPimpinanController::class, 'showPending'])->middleware(['auth', 'role:pimpinan']);
Route::put('/suratMasukPimpinan/pending/{suratMasuk}', [SuratMasukPimpinanController::class, 'update'])->name('updatePending')->middleware(['auth', 'role:pimpinan']);
Route::resource('/suratMasukPimpinan', SuratMasukPimpinanController::class)->only('index', 'show', 'update')->middleware(['auth', 'role:pimpinan'])->parameters(['suratMasukPimpinan' => 'suratMasuk']);
Route::resource('/suratMasukKabag', SuratMasukKabagController::class)->only('index', 'show', 'update')->middleware(['auth', 'role:kepala bagian'])->parameters(['suratMasukKabag' => 'suratMasuk']);
Route::resource('/suratMasukStaff', SuratMasukStaffController::class)->only('index', 'show', 'update')->middleware(['auth', 'role:staff'])->parameters(['suratMasukStaff' => 'suratMasuk']);

Route::resource('/suratKeluar', SuratKeluarController::class)->middleware(['auth', 'role:admin']);
Route::get('/suratKeluarPengelola/export', [SuratKeluarPengelolaController::class, 'export'])->middleware(['auth', 'role:unit pengolah']);
Route::resource('/suratKeluarPengelola', SuratKeluarPengelolaController::class)->middleware(['auth', 'role:unit pengolah'])->parameters(['suratKeluarPengelola' => 'suratKeluar']);
Route::resource('/suratKeluarPimpinan', SuratKeluarPimpinanController::class)->only('index', 'show')->middleware(['auth', 'role:pimpinan'])->parameters(['suratKeluarPimpinan' => 'suratKeluar']);

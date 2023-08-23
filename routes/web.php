<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\{Route, Auth};

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [HomeController::class, 'indexAdmin'])->middleware('role:admin')->name('admin.dashboard');
Route::get('/pengolah', [HomeController::class, 'indexPengolah'])->middleware('role:unit pengolah')->name('pengolah.dashboard');
Route::get('/pimpinan', [HomeController::class, 'indexPimpinan'])->middleware('role:pimpinan')->name('pimpinan.dashboard');
Route::get('/kabag', [HomeController::class, 'indexKabag'])->middleware('role:kepala bagian')->name('kabag.dashboard');
Route::get('/staff', [HomeController::class, 'indexStaff'])->middleware('role:staff')->name('staff.dashboard');

Route::get('/suratMasuk', [SuratMasukController::class, 'index'])->middleware();
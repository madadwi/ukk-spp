<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugaController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranpetugasController;


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
Route::resource('login', LoginController::class);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware('login')->group(function () {
    //Router Admin
    Route::get('/admin', function () {
        return view('admin.index');
    })->middleware('admin')->name('admin.index');
    Route::resource('/admin/kelas', KelasController::class)->parameter('kelas', 'kelas')->middleware('admin');
    Route::resource('/admin/petugass', PetugasController::class)->parameter('petugass', 'petugass')->middleware('admin');
    Route::resource('/admin/spp', SppController::class)->middleware('admin');
    Route::resource('/admin/siswa', SiswaController::class)->middleware('admin');
    Route::resource('/admin/pembayaran', PembayaranController::class)->middleware('admin');
    Route::get('/users/export', [PembayaranController::class, 'export'])->name('users.export')->middleware('admin');

    //Router Petugas
    Route::resource('/petugas/transaksi', PembayaranpetugasController::class)->middleware('petugas');
    Route::get('/petugas', function () {
        return view('petugas.index');
    })->middleware('petugas')->name('petugas.index');

    //Router Siswa
    Route::get('/siswas', function () {
        return view('siswas.index');
    })->name('siswas.index')->middleware('siswa');

    Route::resource('/siswas/histori', HistoriController::class)->middleware('siswa');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [BerandaController::class, 'index']);
Route::get('informasi', [BerandaController::class, 'informasi']);
Route::get('koleksi', [BerandaController::class, 'koleksi_buku']);
Route::post('cari', [BerandaController::class, 'cari'])->name('search');

// admin route
Route::get('/admin/index', [AdminController::class, 'index']);
Route::resource('admin/anggota', AnggotaController::class);
Route::resource('admin/buku', BukuController::class);
Route::resource('admin/kategori', KategoriController::class);
Route::resource('admin/penerbit', PenerbitController::class);
Route::resource('admin/pengarang', PengarangController::class);
Route::resource('admin/transaksi', TransaksiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

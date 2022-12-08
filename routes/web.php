<?php

use Illuminate\Support\Facades\Route;

use App\Models\Barang;
use App\Models\Transaksi;


use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenjualanController;
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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/barang', [BarangController::class, 'index']);
Route::get('/dashboard/barang/create', [BarangController::class, 'create']);
Route::post('/dashboard/barang', [BarangController::class, 'store']);
Route::get('/dashboard/barang/{id}/edit', [BarangController::class, 'edit']);
Route::post('/dashboard/barang/{id}', [BarangController::class, 'update']);
Route::post('/dashboard/barang-delete/{id}', [BarangController::class, 'destroy']);

Route::get('/dashboard/transaksi', [TransaksiController::class, 'index']);
Route::get('/dashboard/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/dashboard/transaksi', [TransaksiController::class, 'store']);
Route::get('/dashboard/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
Route::post('/dashboard/transaksi/{id}', [TransaksiController::class, 'update']);
Route::post('/dashboard/transaksi-delete/{id}', [TransaksiController::class, 'destroy']);

Route::get('/dashboard/penjualan', [PenjualanController::class, 'index']);
Route::get('/dashboard/penjualan/{id}', [PenjualanController::class, 'show']);
Route::post('/dashboard/penjualan/filter', [PenjualanController::class, 'filter']);

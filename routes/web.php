<?php

use App\Http\Controllers\ShortTripSewaTrukController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\LongTripPindahanController;
use App\Http\Controllers\ShortTripPindahanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/cekharga', function () {
    return view('welcome');
});


// Route Untuk Sewa Truk Long Trip
Route::post('/datas', [HargaController::class, 'cekHarga'])->name('datas');
Route::get('/cekongkir', [IndoregionController::class, 'cekongkir'])->name('cekongkir');
Route::get('/tambahdata', [IndoregionController::class, 'kota'])->name('kota');
Route::post('/kabupaten', [IndoregionController::class, 'kabupaten'])->name('kabupaten');
Route::post('/kecamatan', [IndoregionController::class, 'kecamatan'])->name('kecamatan');
Route::post('/kabupatencek', [IndoregionController::class, 'kabupatencek'])->name('kabupatencek');
Route::post('/kecamatancek', [IndoregionController::class, 'kecamatancek'])->name('kecamatancek');
Route::post('/data', [IndoregionController::class, 'store'])->name('data.store');

Route::get('/orderan/{id}', [IndoregionController::class, 'tampil']);
Route::post('/orderstep/{id}', [IndoregionController::class, 'tampil'])->name('orderstep');
Route::get('/order', function () {
    return view('orderstep');
});

// Route Untuk Sewa Truk Short Trip
Route::post('/shortsewa', [ShortTripSewaTrukController::class, 'cekHarga'])->name('shortsewa');
Route::get('/cekongkirdalamkota', [ShortTripSewaTrukController::class, 'cekongkir'])->name('cekongkir');
Route::post('/kabupaten2', [ShortTripSewaTrukController::class, 'kabupaten2'])->name('kabupaten2');
Route::post('/kecamatan2', [ShortTripSewaTrukController::class, 'kecamatan2'])->name('kecamatan2');
Route::post('/kelurahan2', [ShortTripSewaTrukController::class, 'kelurahan2'])->name('kelurahan2');
Route::post('/kabupatencek2', [ShortTripSewaTrukController::class, 'kabupatencek2'])->name('kabupatencek2');
Route::post('/kecamatancek2', [ShortTripSewaTrukController::class, 'kecamatancek2'])->name('kecamatancek2');
Route::post('/kelurahancek2', [ShortTripSewaTrukController::class, 'kelurahancek2'])->name('kelurahancek2');

// Route Untuk Pindahan Long Trip
Route::get('/pindahan', [LongTripPindahanController::class, 'pindahan'])->name('pindahan');
Route::post('/pindahanlong', [LongTripPindahanController::class, 'cekHarga'])->name('pindahanlong');
Route::get('/tambahdata/pindahan', [LongTripPindahanController::class, 'kota'])->name('kota/pindahan');
Route::post('/kabupaten/pindahan', [LongTripPindahanController::class, 'kabupaten'])->name('kabupaten/pindahan');
Route::post('/kecamatan/pindahan', [LongTripPindahanController::class, 'kecamatan'])->name('kecamatan/pindahan');
Route::post('/kabupatencek/pindahan', [LongTripPindahanController::class, 'kabupatencek'])->name('kabupatencek/pindahan');
Route::post('/kecamatancek/pindahan', [LongTripPindahanController::class, 'kecamatancek'])->name('kecamatancek/pindahan');
Route::post('/kelurahancek/pindahan', [LongTripPindahanController::class, 'kelurahancek'])->name('kelurahancek/pindahan');
Route::post('/data/pindahan', [LongTripPindahanController::class, 'store'])->name('data.store/pindahan');

// Route Untuk Pindahan Short Trip
Route::post('/pindahanshort', [ShortTripPindahanController::class, 'cekHarga'])->name('pindahanshort');
Route::get('/cekongkirdalamkota2', [ShortTripPindahanController::class, 'cekongkir'])->name('cekongkir');
Route::get('/tambahdata/pindahan2', [ShortTripPindahanController::class, 'kota'])->name('kota/pindahan2');
Route::post('/kabupaten/pindahan2', [ShortTripPindahanController::class, 'kabupaten2'])->name('kabupaten/pindahan2');
Route::post('/kecamatan/pindahan2', [ShortTripPindahanController::class, 'kecamatan2'])->name('kecamatan/pindahan2');
Route::post('/kelurahan/pindahan2', [ShortTripPindahanController::class, 'kelurahan2'])->name('kelurahan/pindahan2');
Route::post('/kabupatencek/pindahan2', [ShortTripPindahanController::class, 'kabupatencek2'])->name('kabupatencek/pindahan2');
Route::post('/kecamatancek/pindahan2', [ShortTripPindahanController::class, 'kecamatancek2'])->name('kecamatancek/pindahan2');
Route::post('/kelurahancek/pindahan2', [ShortTripPindahanController::class, 'kelurahancek2'])->name('kelurahancek/pindahan2');
Route::post('/data/pindahan2', [ShortTripPindahanController::class, 'store'])->name('data.store/pindahan2');



<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ShortTripSewaTrukController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\KeranjangController;
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

// Route::get('/cekharga', function () {
//     return view('welcome');
// });
Route::get('/', [IndoregionController::class, 'cekongkir'])->name('cekongkir');

Route::get('/login', function () {
    return view('layout/login');
})->name('login');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'hadleGoogleCallback'])->name('google.callback');
Route::get('/logout', [GoogleController::class, 'logout'])->name('logout');

// Dependent Cek Sewa Truk Long Trip
Route::post('/kabupaten', [IndoregionController::class, 'kabupaten'])->name('kabupaten');
Route::post('/kecamatan', [IndoregionController::class, 'kecamatan'])->name('kecamatan');
Route::post('/kabupatencek', [IndoregionController::class, 'kabupatencek'])->name('kabupatencek');
Route::post('/kecamatancek', [IndoregionController::class, 'kecamatancek'])->name('kecamatancek');

// Dependent Cek Sewa Truk Short Trip
Route::post('/kabupaten2', [ShortTripSewaTrukController::class, 'kabupaten2'])->name('kabupaten2');
Route::post('/kecamatan2', [ShortTripSewaTrukController::class, 'kecamatan2'])->name('kecamatan2');
Route::post('/kelurahan2', [ShortTripSewaTrukController::class, 'kelurahan2'])->name('kelurahan2');
Route::post('/kabupatencek2', [ShortTripSewaTrukController::class, 'kabupatencek2'])->name('kabupatencek2');
Route::post('/kecamatancek2', [ShortTripSewaTrukController::class, 'kecamatancek2'])->name('kecamatancek2');
Route::post('/kelurahancek2', [ShortTripSewaTrukController::class, 'kelurahancek2'])->name('kelurahancek2');

// Dependent Cek Pindahan Long Trip
Route::post('/kabupaten/pindahan', [LongTripPindahanController::class, 'kabupaten'])->name('kabupaten/pindahan');
Route::post('/kecamatan/pindahan', [LongTripPindahanController::class, 'kecamatan'])->name('kecamatan/pindahan');
Route::post('/kabupatencek/pindahan', [LongTripPindahanController::class, 'kabupatencek'])->name('kabupatencek/pindahan');
Route::post('/kecamatancek/pindahan', [LongTripPindahanController::class, 'kecamatancek'])->name('kecamatancek/pindahan');
Route::post('/kelurahancek/pindahan', [LongTripPindahanController::class, 'kelurahancek'])->name('kelurahancek/pindahan');

// Dependent Cek Pindahan Short Trip
Route::post('/kabupaten/pindahan2', [ShortTripPindahanController::class, 'kabupaten2'])->name('kabupaten/pindahan2');
Route::post('/kecamatan/pindahan2', [ShortTripPindahanController::class, 'kecamatan2'])->name('kecamatan/pindahan2');
Route::post('/kelurahan/pindahan2', [ShortTripPindahanController::class, 'kelurahan2'])->name('kelurahan/pindahan2');
Route::post('/kabupatencek/pindahan2', [ShortTripPindahanController::class, 'kabupatencek2'])->name('kabupatencek/pindahan2');
Route::post('/kecamatancek/pindahan2', [ShortTripPindahanController::class, 'kecamatancek2'])->name('kecamatancek/pindahan2');
Route::post('/kelurahancek/pindahan2', [ShortTripPindahanController::class, 'kelurahancek2'])->name('kelurahancek/pindahan2');

Route::middleware(['auth'])->group(function () {
    // Route Untuk Sewa Truk Long Trip
    Route::post('/datas', [HargaController::class, 'cekHarga'])->name('datas');
    Route::get('/tambahdata', [IndoregionController::class, 'kota'])->name('kota');
    Route::post('/data', [IndoregionController::class, 'store'])->name('data.store');

    // Route::get('/orderan/{id}', [IndoregionController::class, 'tampil']);
    Route::get('/orderstep/{id}', [IndoregionController::class, 'tampil'])->name('orderstep');
    Route::get('/order', function () {
        return view('orderstep');
    });

    // Route Untuk Sewa Truk Short Trip
    Route::post('/shortsewa', [ShortTripSewaTrukController::class, 'cekHarga'])->name('shortsewa');
    Route::get('/ordersteptrukshort/{id}', [ShortTripSewaTrukController::class, 'tampil'])->name('ordersteptrukshort');

    // Route Untuk Pindahan Long Trip
    Route::post('/pindahanlong', [LongTripPindahanController::class, 'cekHarga'])->name('pindahanlong');
    Route::get('/tambahdata/pindahan', [LongTripPindahanController::class, 'kota'])->name('kota/pindahan');
    Route::post('/data/pindahan', [LongTripPindahanController::class, 'store'])->name('data.store/pindahan');
    Route::get('/ordersteppindahanlong/{id}', [LongTripPindahanController::class, 'tampil'])->name('ordersteppindahanlong');

    // Route Untuk Pindahan Short Trip
    Route::post('/pindahanshort', [ShortTripPindahanController::class, 'cekHarga'])->name('pindahanshort');
    Route::get('/tambahdata/pindahan2', [ShortTripPindahanController::class, 'kota'])->name('kota/pindahan2');
    Route::post('/data/pindahan2', [ShortTripPindahanController::class, 'store'])->name('data.store/pindahan2');
    Route::get('/ordersteppindahanshort/{id}', [ShortTripPindahanController::class, 'tampil'])->name('ordersteppindahanshort');

    // Keranjang
    Route::get('/riwayat', [KeranjangController::class, 'showKeranjangTrukLong']);
    Route::get('/riwayattrukshort', [KeranjangController::class, 'showKeranjangTrukShort']);
    Route::get('/riwayatpindahanlong', [KeranjangController::class, 'showKeranjangPindahanLong']);
    Route::get('/riwayatpindahanshort', [KeranjangController::class, 'showKeranjangPindahanShort']);

    // Order Truk Long
    Route::get('/ordertruklong', [KeranjangController::class, 'showOrderTrukLong']);
    Route::get('/konfirmasi', [KeranjangController::class, 'showKonfirmasiTrukLong']);
    Route::get('/proses', [KeranjangController::class, 'showProsesTrukLong']);
    Route::get('/selesai', [KeranjangController::class, 'showSelesaiTrukLong']);
    Route::post('/upload/image/{id}', [KeranjangController::class, 'uploadImage'])->name('upload.image');

    // Order Truk Short
    Route::get('/ordertrukshort', [KeranjangController::class, 'showOrderTrukShort']);
    Route::get('/konfirmasi/trukshort', [KeranjangController::class, 'showKonfirmasiTrukShort']);
    Route::get('/proses/trukshort', [KeranjangController::class, 'showProsesTrukShort']);
    Route::get('/selesai/trukshort', [KeranjangController::class, 'showSelesaiTrukShort']);
    Route::post('/upload/image/trukshort/{id}', [KeranjangController::class, 'uploadImageTrukShort'])->name('upload.image/trukshort');

    // Order Pindahan Long
    Route::get('/orderpindahanlong', [KeranjangController::class, 'showOrderPindahanLong']);
    Route::get('/konfirmasi/pindahanlong', [KeranjangController::class, 'showKonfirmasiPindahanLong']);
    Route::get('/proses/pindahanlong', [KeranjangController::class, 'showProsesPindahanLong']);
    Route::get('/selesai/pindahanlong', [KeranjangController::class, 'showSelesaiPindahanLong']);
    Route::post('/upload/image/pindahanlong/{id}', [KeranjangController::class, 'uploadImagePindahanLong'])->name('upload.image/pindahanlong');

    // Order Pindahan Short
    Route::get('/orderpindahanshort', [KeranjangController::class, 'showOrderPindahanShort']);
    Route::get('/konfirmasi/pindahanshort', [KeranjangController::class, 'showKonfirmasiPindahanShort']);
    Route::get('/proses/pindahanshort', [KeranjangController::class, 'showProsesPindahanShort']);
    Route::get('/selesai/pindahanshort', [KeranjangController::class, 'showSelesaiPindahanShort']);
    Route::post('/upload/image/pindahanshort/{id}', [KeranjangController::class, 'uploadImagePindahanShort'])->name('upload.image/pindahanshort');
});

// Halaman Cek Ongkir
Route::get('/cekongkir', [IndoregionController::class, 'cekongkir'])->name('cekongkir');
Route::get('/cekongkirdalamkota', [ShortTripSewaTrukController::class, 'cekongkir'])->name('cekongkirdalamkota');
Route::get('/pindahan', [LongTripPindahanController::class, 'pindahan'])->name('pindahan');
Route::get('/cekongkirdalamkota2', [ShortTripPindahanController::class, 'cekongkir'])->name('cekongkirdalamkota2');

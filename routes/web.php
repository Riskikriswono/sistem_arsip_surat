<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DatapegawaiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

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
    return view('auth.login');
});
Route::get('/w', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'dashboard']);
    // data pegawai
    Route::get('/datapegawai', [DatapegawaiController::class, 'index']);
    Route::get('/datapegawai/tambahd', [DatapegawaiController::class, 'add']);
    Route::post('/datapegawai/tambahdata', [DatapegawaiController::class, 'create']);
    Route::get('/datapegawai/edit/{id_data}', [DatapegawaiController::class, 'edit']);
    Route::patch('/datapegawai/edit/{id_data}', [DatapegawaiController::class, 'update']);
    Route::get('/datapegawai/hapus/{id_data}', [DatapegawaiController::class, 'delete']);
    //surat masuk
    Route::get('/suratmasuk', [SuratMasukController::class, 'index']);
    Route::get('/suratmasuk/tambahsuratm', [SuratMasukController::class, 'add']);
    Route::post('/suratmasuk/tambahdata', [SuratMasukController::class, 'create']);
    Route::get('/suratmasuk/edit/{id_data}', [SuratMasukController::class, 'edit']);
    Route::patch('/suratmasuk/edit/{id_data}', [SuratMasukController::class, 'update']);
    Route::get('/suratmasuk/hapus/{id_data}', [SuratMasukController::class, 'delete']);
   //surat keluar
   Route::get('/suratkeluar', [SuratKeluarController::class, 'index']);
   Route::get('/suratkeluar/tambahsuratk', [SuratKeluarController::class, 'add']);
   Route::post('/suratkeluar/tambahdata', [SuratKeluarController::class, 'create']);
   Route::get('/suratkeluar/edit/{id_data}', [SuratKeluarController::class, 'edit']);
   Route::patch('/suratkeluar/edit/{id_data}', [SuratKeluarController::class, 'update']);
   Route::get('/suratkeluar/hapus/{id_data}', [SuratKeluarController::class, 'delete']);
});

Route::view('/test', 'test');

Route::view('dasboard', 'dasboard');
Route::get('/index1', function () {
    return view('index1');
});
Route::middleware(['auth'])->group(function () {

});
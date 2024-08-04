<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Webcontroller;
use Illuminate\Support\Facades\Route;





Route::get('/login', [UserController::class, 'login']);

Route::post('/autentikasi', [UserController::class, 'autentikasi']);

Route::post('/logout', [Usercontroller::class, 'logout']);

Route::get('/hero', [Webcontroller::class, 'dashboard']);

Route::get('/registrasiuser', [Webcontroller::class, 'registrasiuser']);
 
Route::get('/', [Webcontroller::class, 'bayar']);

Route::post('/registrasiuser', [Webcontroller::class, 'tambah']);

Route::get('/data/ubah/{DataPelanggan:id}', [Webcontroller::class, 'ubah'])->name('ubahdata');

Route::put('/data/update/{DataPelanggan:id}', [Webcontroller::class, 'update'])->name('updatedata');

Route::delete('/data/hapus/{DataPelanggan:id}', [Webcontroller::class, 'hapus'])->name('hapusdata');

Route::get('/hero/search', [Webcontroller::class, 'search']);

Route::post('/data/submitpembayaran', [Webcontroller::class, 'submitpembayaran'])->name('submitpembayaran');

Route::get('/data/detailpembayaran/{DataPelanggan:id}', [Webcontroller::class, 'detailpembayaran'])->name('detailpembayaran');

Route::get('/payment-success', function () {
    return redirect('/')->with('payed', 'Anda Berhasil Melakukan Pembayaran'); // Atau halaman yang sesuai dengan kebutuhan Anda
})->name('payment.success');



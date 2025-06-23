<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BelajarController;

Route::get('/', function () {
    return view('welcome');
});

// get: hanya bisa melihat dan membaca
// post: tambah dan ubah data (form)
// put: ubah data (form)
// delete: hapus data (form)

Route::get('belajar', [App\Http\Controllers\BelajarController::class, 'index']);
Route::get('tambah', [App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::get('edit/data-hitung/{jenis}/{id}', [App\Http\Controllers\BelajarController::class, 'editDataHitung'])->name('edit.data-hitung');

// Table Counts
Route::get('data/hitungan', [App\Http\Controllers\BelajarController::class, 'viewHitungan']);

Route::get('duar/{id}', [App\Http\Controllers\BelajarController::class, 'update']);
Route::get('edit', [App\Http\Controllers\BelajarController::class, 'nuall']);

// bisa juga kayak gini, app\... tidak perlu ditulis tinggal kilk kanan di BelajarController lalu pilih import class
// Route::get('belajar', [BelajarController::class, 'index']);
// Route::get('tambah', [elajarController::class, 'tambah'])->name('tambah');
// Route::get('duar/{id}', [BelajarController::class, 'update']);
// Route::get('edit', [BelajarController::class, 'nuall']);

Route::post('tambah-action', [App\Http\Controllers\BelajarController::class, 'tambahAction'])->name('tambah-action');

<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BelajarController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});

// (/): default route
Route::get('/', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [App\Http\Controllers\LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('level', App\Http\Controllers\LevelController::class);
    Route::resource('service', App\Http\Controllers\ServiceController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('trans', App\Http\Controllers\TransOrderController::class);
    Route::get('print_struk/{id}', [App\Http\Controllers\TransOrderController::class, 'printStruk'])->name('print_struk');

    Route::post('trans/{id}/snap', [App\Http\Controllers\TransOrderController::class, 'snap'])->name('trans.snap');
});

// bisa juga jika tidak pakai group tapi hanya bisa satu-satu dan akan terlalu banyak jika route yg ingin di setting ada banyak
// Route::resource('dashboard', App\Http\Controllers\DashboardController::class)->middleware(['auth']);

// resource: untuk mengatur semua kebutuhan route
// get: hanya bisa melihat dan membaca
// post: tambah dan ubah data (form)
// put: ubah data (form)
// delete: hapus data (form)

Route::get('belajar', [App\Http\Controllers\BelajarController::class, 'index']);
Route::get('tambah', [App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::get('edit/data-hitung/{id}', [App\Http\Controllers\BelajarController::class, 'editDataHitung'])->name('edit.data-hitung');
Route::put('update/tambahan/{id}', [App\Http\Controllers\BelajarController::class, 'updateTambahan'])->name('update.tambahan');
Route::delete('softDelete/data-hitung/{id}', [App\Http\Controllers\BelajarController::class, 'softDeleteTambahan'])->name('softDelete.data-hitung');

// Table Counts
Route::get('data/hitungan', [App\Http\Controllers\BelajarController::class, 'viewHitungan'])->name('data-hitungan');

Route::get('duar/{id}', [App\Http\Controllers\BelajarController::class, 'update']);
Route::get('edit', [App\Http\Controllers\BelajarController::class, 'nuall']);

// bisa juga kayak gini, app\... tidak perlu ditulis tinggal kilk kanan di BelajarController lalu pilih import class
// Route::get('belajar', [BelajarController::class, 'index']);
// Route::get('tambah', [elajarController::class, 'tambah'])->name('tambah');
// Route::get('duar/{id}', [BelajarController::class, 'update']);
// Route::get('edit', [BelajarController::class, 'nuall']);

Route::post('tambah-action', [App\Http\Controllers\BelajarController::class, 'tambahAction'])->name('tambah-action');

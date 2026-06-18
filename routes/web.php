<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\IncomingItemController;
use App\Http\Controllers\OutgoingItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('items', ItemController::class)
        ->middleware('role:admin,staff');

    Route::get('/items/{item}/qrcode', [ItemController::class, 'qrCode'])
        ->middleware('role:admin,staff')
        ->name('items.qrcode');

    Route::resource('incoming-items', IncomingItemController::class)
        ->middleware('role:admin,staff');

    Route::resource('outgoing-items', OutgoingItemController::class)
        ->middleware('role:admin,staff');

    Route::resource('categories', CategoryController::class)
        ->middleware('role:admin');

    Route::resource('suppliers', SupplierController::class)
        ->middleware('role:admin');

    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update', 'destroy'])
        ->middleware('role:admin');

    Route::view('/laporan', 'laporan.index')
        ->middleware('role:admin,manager')
        ->name('laporan.index');

    Route::get('/laporan/barang/pdf', [LaporanController::class, 'barangPdf'])
        ->middleware('role:admin,manager')
        ->name('laporan.barang.pdf');

    Route::get('/laporan/barang-masuk/pdf', [LaporanController::class, 'barangMasukPdf'])
        ->middleware('role:admin,manager')
        ->name('laporan.barangMasuk.pdf');

    Route::get('/laporan/barang-keluar/pdf', [LaporanController::class, 'barangKeluarPdf'])
        ->middleware('role:admin,manager')
        ->name('laporan.barangKeluar.pdf');

    Route::get('/laporan/barang/excel', [LaporanController::class, 'barangExcel'])
        ->middleware('role:admin,manager')
        ->name('laporan.barang.excel');

    Route::get('/laporan/barang-masuk/excel', [LaporanController::class, 'barangMasukExcel'])
        ->middleware('role:admin,manager')
        ->name('laporan.barangMasuk.excel');

    Route::get('/laporan/barang-keluar/excel', [LaporanController::class, 'barangKeluarExcel'])
        ->middleware('role:admin,manager')
        ->name('laporan.barangKeluar.excel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
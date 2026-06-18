    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\SupplierController;
    use App\Http\Controllers\ItemController;
    use App\Http\Controllers\IncomingItemController;
    use App\Http\Controllers\OutgoingItemController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\LaporanController;

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('items', ItemController::class);
        Route::resource('incoming-items', IncomingItemController::class);
        Route::resource('outgoing-items', OutgoingItemController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/laporan/barang/pdf', [LaporanController::class, 'barangPdf'])->name('laporan.barang.pdf');
        Route::get('/laporan/barang-masuk/pdf', [LaporanController::class, 'barangMasukPdf'])->name('laporan.barangMasuk.pdf');
        Route::get('/laporan/barang-keluar/pdf', [LaporanController::class, 'barangKeluarPdf'])->name('laporan.barangKeluar.pdf');

        Route::view('/laporan', 'laporan.index')->name('laporan.index');
        Route::get('/items/{item}/qrcode', [ItemController::class, 'qrCode'])->name('items.qrcode');

        Route::get('/laporan/barang/excel', [LaporanController::class, 'barangExcel'])->name('laporan.barang.excel');
        Route::get('/laporan/barang-masuk/excel', [LaporanController::class, 'barangMasukExcel'])->name('laporan.barangMasuk.excel');
        Route::get('/laporan/barang-keluar/excel', [LaporanController::class, 'barangKeluarExcel'])->name('laporan.barangKeluar.excel');

        Route::get('/admin-test', function () {
        return 'Halo Admin';
        })->middleware(['auth', 'role:admin']);
    });

    require __DIR__.'/auth.php';
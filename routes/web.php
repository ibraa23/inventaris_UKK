<?php

use App\Http\Controllers\Admin\AdminControllers;
use App\Http\Controllers\Admin\DepresiasiController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\HitungDepresiasiController;
use App\Http\Controllers\Admin\KategoriAssetController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\MasterBarangController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\MutasiLokasiController;
use App\Http\Controllers\Admin\OpnameController;
use App\Http\Controllers\Admin\PengadaanController;
use App\Http\Controllers\Admin\SatuanController;
use App\Http\Controllers\Admin\SubKategoriAssetController;

use App\Http\Controllers\User\UserControllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


// Login Routes
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Admin dapat mengakses semua halaman
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminControllers::class, 'index'])->name('admin.dashboard' );
        Route::resources([
            'kategori-asset' => KategoriAssetController::class,
            'sub-kategori-asset' => SubKategoriAssetController::class,
            'distributor' => DistributorController::class,
            'merk' => MerkController::class,
            'satuan' => SatuanController::class,
            'master-barang' => MasterBarangController::class,
            'lokasi' => LokasiController::class,
            'mutasi-lokasi' => MutasiLokasiController::class,
            'hitung-depresiasi' => HitungDepresiasiController::class,
        ]);
        Route::prefix('/admin/depresiasi')->group(function () {
            Route::get('/', [DepresiasiController::class, 'index'])->name('admin.depresiasi.index');
            Route::post('/store', [DepresiasiController::class, 'store'])->name('admin.depresiasi.store');
            Route::get('/create', [DepresiasiController::class, 'create'])->name('admin.depresiasi.create');
            Route::put('/update/{depresiasi}', [DepresiasiController::class, 'update'])->name('admin.depresiasi.update');
            Route::get('/{depresiasi}/edit', [DepresiasiController::class, 'edit'])->name('admin.depresiasi.edit');
            Route::delete('/depresiasi/{depresiasi}', [DepresiasiController::class, 'destroy'])->name('admin.depresiasi.destroy');
        });
        Route::prefix('/admin/pengadaan')->group(function () {
            Route::get('/', [PengadaanController::class, 'index'])->name('admin.pengadaan.index');
            Route::post('/store', [PengadaanController::class, 'store'])->name('admin.pengadaan.store');
            Route::get('/create', [PengadaanController::class, 'create'])->name('admin.pengadaan.create');
            Route::put('/update/{pengadaan}', [PengadaanController::class, 'update'])->name('admin.pengadaan.update');
            Route::get('/{id}/edit', [PengadaanController::class, 'edit'])->name('admin.pengadaan.edit');
            Route::delete('/pengadaan/{id}', [PengadaanController::class, 'destroy'])->name('admin.pengadaan.destroy');
        });
        Route::prefix('/admin/opname')->group(function () {
            Route::get('/', [OpnameController::class, 'index'])->name('admin.opname.index');
            Route::post('/store', [OpnameController::class, 'store'])->name('admin.opname.store');
            Route::get('/create', [OpnameController::class, 'create'])->name('admin.opname.create');
            Route::put('/update{id}', [OpnameController::class, 'update'])->name('admin.opname.update');
            Route::get('/{id}/edit', [OpnameController::class, 'edit'])->name('admin.opname.edit');
            Route::delete('/opname/{id}', [OpnameController::class, 'destroy'])->name('admin.opname.destroy');
        });
    });

    // User hanya bisa mengakses Depresiasi, Opname, dan Pengadaan
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [UserControllers::class, 'index'])->name('user.dashboard' );
        Route::get('/depresiasi', [\App\Http\Controllers\User\DepresiasiController::class, 'index'])->name('depresiasi.index');
        Route::get('/opname', [\App\Http\Controllers\User\OpnameController::class, 'index'])->name('opname.index');
        Route::get('/pengadaan', [\App\Http\Controllers\User\PengadaanController::class, 'index'])->name('pengadaan.index');
    });
});


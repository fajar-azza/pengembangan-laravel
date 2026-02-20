<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminRekapController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;

Route::get('/', [LandingPageController::class, 'index'])->name('utama');


//Route untuk menu login dan register
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginpage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerpage']);
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Route untuk menu admin yang hanya bisa diakses yang punya login
// Route::middleware(['auth'])->group(function () {

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('dashboard');

        Route::get('/dataloket', [LoketController::class, 'index'])->name('loket');
        Route::post('/databaruloket', [LoketController::class, 'store'])->name('store.loket');
        Route::get('/hapusdataloket/{id}', [LoketController::class, 'destroy'])->name('destroy.loket');
        // Route::get('/editdataloket/{id}', [LoketController::class, 'edit'])->name('edit.loket');
        Route::post('/updatedataloket/{id}', [LoketController::class, 'update'])->name('update.loket');

        Route::get('/user', [UserController::class, 'registerpage'])->name('register');
        Route::post('/register', [UserController::class, 'register'])->name('daftar');

        Route::get('/loket-aktif', function () {
            return view('admin.pages.loketaktif');
        })->name('loket.aktif');




        Route::get('/petugas-loket', [PetugasController::class, 'create'])->name('datapetugas');
        Route::post('/petugas-store', [PetugasController::class, 'store'])
            ->name('petugas.store');
        Route::get('/hapus-data-Petugas/{id}', [PetugasController::class, 'destroy'])->name('destroy.petugas');
        Route::post('/update-data-Petugas/{id}', [PetugasController::class, 'update'])->name('update.petugas');

        Route::get('/loket-aktif', [LoketController::class, 'loketaktif'])->name('loket.aktif');

        Route::get('/rekap-absensi', [AdminRekapController::class, 'index'])
            ->name('rekap.absen');

        Route::get(
            '/admin/absen/bulk-edit',
            [AdminRekapController::class, 'edit']
        )->name('absen.bulk.edit');

        Route::post(
            '/admin/absen/bulk-update',
            [AdminRekapController::class, 'update']
        )->name('absen.bulk.update');

    });




//Route untuk autentikasi Role User
// command by atta : ini cara yang benar untuk pengunaan route itu coba cek seedeer dan AuthController oke?
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.pages.dashboard');
    })->name('user.dashboard');

    Route::get('/user-absensi', [DashboardController::class, 'index'])
    ->name('user.absensi');
    Route::get('/riwayat-absen', [DashboardController::class, 'riwayat'])
    ->name('absen.riwayat');

    Route::post('/absen/masuk', [AbsensiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen-pulang', [AbsensiController::class, 'absenPulang'])->name('absen.pulang');
});

// });
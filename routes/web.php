<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('utama');


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
        Route::get('/editdataloket/{id}', [LoketController::class, 'edit'])->name('edit.loket');
        Route::post('/updatedataloket/{id}', [LoketController::class, 'update'])->name('update.loket');

        Route::get('/user', [UserController::class, 'registerpage'])->name('register');
        Route::post('/register', [UserController::class, 'register'])->name('daftar');
            Route::get('/tambah-user', function () {
        return view('admin.pages.tambahuser');
    })->name('tambah.user');
    Route::get('/loket-aktif', function () {
        return view('admin.pages.loketaktif');
    })->name('loket.aktif');
    Route::get('/rekap-absen', function () {
        return view('admin.pages.rekapabsen');
    })->name('rekap.absen');
    });

//Route untuk autentikasi Role User
// command by atta : ini cara yang benar untuk pengunaan route itu coba cek seedeer dan AuthController oke?
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.pages.dashboard');
    })->name('user.dashboard');
    Route::get('/absensi-user', function () {
        return view('user.pages.absensi');
    })->name('user.absensi');
});
    
// });
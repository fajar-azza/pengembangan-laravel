<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
})->name('utama');


//Route untuk menu login dan register
Route::middleware(['guest'])->group(function () {
    Route::get('/login',[AuthController::class,'loginpage'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/register',[AuthController::class,'registerpage']);
    Route::post('/register',[AuthController::class,'register']);
});
Route::post('/logout',[AuthController::class,'logout'])->name('logout');



//Route untuk menu admin yang hanya bisa diakses yang punya login
// Route::middleware(['auth'])->group(function () {

    Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::get('/dosen',[DosenController::class,'index'])->name('dosen');
    Route::get('/formdosen',[DosenController::class,'create'])->name('form.dosen');
    Route::post('/storeDosen',[DosenController::class,'store'])->name('store.dosen');
    Route::get('/destroydosen/{id}',[DosenController::class,'destroy'])->name('destroy.dosen');
    Route::get('/editdosen/{id}',[DosenController::class,'edit'])->name('edit.dosen');
    Route::post('/updatedosen/{id}',[DosenController::class,'update'])->name('update.dosen');
    
    });
    
    //Route untuk autentikasi Role User
    Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('dashboard', function () {
            return view('user.pages.dashboard');
            
        })->name('dashboard');
        
    });
    
// });

 
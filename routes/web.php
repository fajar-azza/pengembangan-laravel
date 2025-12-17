<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;

// Route::get('/dashboard', function () {
//     return view('admin.pages.dashboard');
// });
Route::get('/fajar', function () {
    return view('fajar');
});

//Route::get('/dosen/form',[DosenController::class,'index']);


// Route::get('/dashboard', function () {
//     return view('admin.pages.dashboard');
// });


//Route untuk menu login
Route::middleware(['guest'])->group(function () {
    Route::get('/login',[AuthController::class,'loginpage'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
});
Route::post('/logout',[AuthController::class,'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
        
    });
    Route::get('/dosen',[DosenController::class,'index'])->name('dosen');
    Route::get('/formdosen',[DosenController::class,'create'])->name('form.dosen');
    Route::post('/storeDosen',[DosenController::class,'store']);
    Route::get('/destroydosen/{id}',[DosenController::class,'destroy']);
    Route::get('/editdosen/{id}',[DosenController::class,'edit']);
    Route::post('/Dosenedit/{id}',[DosenController::class,'update']);
    
});

 
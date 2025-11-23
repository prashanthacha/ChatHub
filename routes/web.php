<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;


Route::get('/', [ChirpController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');
});


Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Register::class);
});


Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Login::class); 
});


Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

<?php

use App\Http\Controllers\MobileController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/player/{id}/{hash}',[PlayerController::class,'index'])->name('player');

Route::get('/mobile/{id}/{hash}',[MobileController::class,'index'])->name('mobile');


require __DIR__.'/auth.php';

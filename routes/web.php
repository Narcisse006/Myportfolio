<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('/cv', [indexController::class, 'cv'])->name('cv');
Route::post('/contact', [indexController::class, 'store'])->name('contact.store');

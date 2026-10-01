<?php

use App\Http\Controllers\AiChatController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('/about', [indexController::class, 'index'])->name('about');
Route::get('/projects', [indexController::class, 'index'])->name('projects');
Route::get('/skills', [indexController::class, 'index'])->name('skills');
Route::get('/contact', [indexController::class, 'index'])->name('contact');
Route::get('/cv', [indexController::class, 'cv'])->name('cv');
Route::post('/contact', [indexController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
Route::post('/ai/chat', AiChatController::class)
    ->middleware('throttle:20,1')
    ->name('ai.chat');

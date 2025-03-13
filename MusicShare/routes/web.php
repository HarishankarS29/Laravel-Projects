<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MusicController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/music/create', [MusicController::class, 'create']);
    Route::post('/music', [MusicController::class, 'store']);
    Route::get('/music/{music}', [MusicController::class, 'show']);
    Route::post('/music/{music}/like', [MusicController::class, 'like']);
    Route::post('/music/{music}/comment', [MusicController::class, 'comment']);
});
<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\SetAuthGuard;
use Illuminate\Support\Facades\Route;

Route::middleware([SetAuthGuard::class])->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login.candidate');
Route::get('/login-recruiter', [AuthController::class, 'index'])->name('login.recruiter');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

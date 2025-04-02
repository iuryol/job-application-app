<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require 'auth.php';
require 'admin.php';
Route::view('/','home')->name('home');

Route::get('/jobs', [JobController::class, 'homeCandidate'])->name('home.candidate')->middleware('auth:user');

Route::fallback([ErrorController::class,'fallback'])->name('fallback');





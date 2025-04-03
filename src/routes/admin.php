<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:user')->name('admin.')->group(function(){
    Route::post('/application/apply', [ApplicationController::class, 'apply'])->name('apply');
    Route::post('/application/withdraw', [ApplicationController::class, 'withdraw'])->name('withdraw');
});

Route::middleware('auth:admin')->prefix('/admin')->name('admin.')->group(function(){
    Route::resource('jobs',JobController::class);
    Route::post('jobs/{job}/stop',[JobController::class,'stop'])->name('jobs.stop');
    Route::post('jobs/{job}/open',[JobController::class,'open'])->name('jobs.open');
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); 
});


Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); 
Route::post('/users', [UserController::class, 'store'])->name('users.store'); 
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); 
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth:user'); 
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth:user'); 
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth:admin'); 



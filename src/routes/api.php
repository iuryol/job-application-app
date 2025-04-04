<?php

use App\Http\Controllers\Api\ApiJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->name('api.')->group(function(){
    Route::resource('jobs',ApiJobController::class)->except(['create','edit']);
});



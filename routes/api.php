<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Middleware\MeasureResponseTime;
use Illuminate\Support\Facades\Route;



Route::group([], function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('posts', PostController::class);
})->middleware(MeasureResponseTime::class);





Route::group([], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});



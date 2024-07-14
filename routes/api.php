<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Import the PostController class
use App\Http\Controllers\Hero_PostController;

Route::apiResource('posts', PostController::class);
Route::apiResource('heropost', Hero_PostController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

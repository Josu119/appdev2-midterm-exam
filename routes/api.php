<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\ProductAccessMiddleware;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ProductAccessMiddleware
Route::middleware('API_TOKEN')->group(function(){

// CRUD (pinag sama-sama na lahat sa "apiResource")
Route::apiResource('products', ProductController::class);

// Request and File storage
Route::post('/api/upload/local', [ProductController::class, 'uploadImageLocal']);
Route::post('/api/upload/public', [ProductController::class, 'uploadImagePublic']);

});
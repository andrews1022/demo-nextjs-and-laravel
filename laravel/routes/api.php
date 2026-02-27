<?php

use App\Http\Controllers\MessageController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// This will be accessible at /api/hello
Route::get('/hello', [MessageController::class, 'getHello']);

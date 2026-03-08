<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

// This will be accessible at /api/posts
Route::get('/posts', [PostController::class, 'index']);

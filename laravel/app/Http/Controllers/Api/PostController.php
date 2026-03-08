<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // 'with' is Eager Loading - it prevents the N+1 query problem
        return Post::with('user')->latest()->get();
    }
}

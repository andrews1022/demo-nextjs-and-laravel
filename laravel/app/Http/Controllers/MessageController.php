<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getHello(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World from Laravel!',
            'status' => 'success',
            'data' => [
                'version' => '1.0.0',
                'author' => 'Andrew'
            ]
        ]);
    }
}

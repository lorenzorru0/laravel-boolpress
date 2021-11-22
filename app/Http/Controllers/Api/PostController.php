<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class PostController extends Controller
{
    public function index()
    {
        $posts = Blog::all();

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Tag;

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

    public function indexCategories()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function indexTags()
    {
        $tags = Tag::all();

        return response()->json([
            'success' => true,
            'data' => $tags
        ]);
    }
}

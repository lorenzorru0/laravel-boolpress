<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class PageController extends Controller
{
    /**
     * Show the welcome page.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the blog homepage.
     */
    public function home()
    {
        $blogs = Blog::all();

        return view('guest.index', compact('blogs'));
    }

    /**
     * Show the single blog's post.
     * 
     * @param string $slug
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('guest.show', compact('blog'));
    }
}

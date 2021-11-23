<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    /**
     * Show the welcome page.
     */
    public function index()
    {
        return view('guest.front-api');
    }

    /**
     * Show the blog homepage.
     */
    public function home()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('guest.index', compact('blogs', 'categories', 'tags'));
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

    /**
     * Show the single categories.
     * 
     * @param string $slug
     */
    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('guest.show-category', compact('category'));
    }

    /**
     * Show the single categories.
     * 
     * @param string $slug
     */
    public function showTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        return view('guest.show-tag', compact('tag'));
    }

    /**
     * Show the posts with vue.
     */
    public function showApiFront()
    {
        return view('guest.front-api');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Validate rules
     */
    protected $validateRules = [
        'title' => 'required|max:100|min:5',
        // 'slug' => 'required|unique:blogs|max:100|min:5',
        'username' => 'required|max:50|min:5',
        'content' => 'required|min:3'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validateRules);

        $data = $request->all();

        $newBlog = new Blog();
        $newBlog->title = $data['title'];
        $newBlog->slug = Str::of($newBlog['title'])->slug('-');
        $newBlog->username = $data['username'];
        $newBlog->content = $data['content'];
        $newBlog->save();

        return redirect()->route('admin.blogs.show', $newBlog['id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate($this->validateRules);

        $data = $request->all();

        $blog->title = $data['title'];
        $blog->slug = Str::of($blog['title'])->slug('-');
        $blog->username = $data['username'];
        $blog->content = $data['content'];
        $blog->save();

        return redirect()->route('admin.blogs.show', $blog['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }
}

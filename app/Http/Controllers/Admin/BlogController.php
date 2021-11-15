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
        'title' => 'string|required|max:100|min:5',
        'username' => 'string|required|max:50|min:5',
        'content' => 'string|required|min:3'
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
        $newBlog->slug = $this->getSlug($newBlog['title']);
        $newBlog->username = $data['username'];
        $newBlog->content = $data['content'];
        $newBlog->save();

        return redirect()->route('admin.blogs.index', $newBlog['id'])->with('success', 'Il post è stato creato');
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

        if ($blog->title != $request->title) {
            $blog->slug = $this->getSlug($blog['title']);
        }
        
        $data = $request->all();

        $blog->title = $data['title'];
        $blog->username = $data['username'];
        $blog->content = $data['content'];
        $blog->save();

        return redirect()->route('admin.blogs.index', $blog['id'])->with('success', "Il post numero {$blog->id} stato aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $blog = Blog::find($request->deleteId);

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', "Il post numero {$blog->id} è stato eliminato");
    }

    /**
     * Return a rigth slug for a post
     *
     * @param  string  $slug
     * @return string $slug
     */
    private function getSlug($title) 
    {
        $slug = Str::of($title)->slug('-');

        $slugExist = Blog::where('slug', $slug)->first();

        $count = 2;

        while($slugExist) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $slugExist = Blog::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}

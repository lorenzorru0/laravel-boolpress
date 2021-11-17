<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Validate rules
     */
    protected $validateRules = [
        'name' => 'string|required|max:50|min:2'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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

        $newCategory = new Category();
        $newCategory->name = $data['name'];
        $newCategory->slug = Str::of($newCategory['name'])->slug('-');
        $newCategory->save();

        return redirect()->route('admin.categories.index')->with('success', 'The category creation gone success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = Blog::where('category_id', $category->id);

        return view('admin.categories.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ( $category->name != $request->name ) {
            $request->validate($this->validateRules);

            $data = $request->all();
    
            $category = new Category();
            $category->name = $data['name'];
            $category->slug = Str::of($category['name'])->slug('-');
            $category->save();
        } 

        return redirect()->route('admin.categories.index')->with('success', "The category number {$category->id} update gone success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->deleteId);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "The category number {$category->id} has been deleted");
    }
}

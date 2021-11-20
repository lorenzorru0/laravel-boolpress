<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
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
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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

        $newTag = new Tag();
        $newTag->name = $data['name'];
        $newTag->slug = Str::of($newTag['name'])->slug('-');
        $newTag->save();

        return redirect()->route('admin.tags.index')->with('success', 'The tag creation gone success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if ($tag->name != $request->name) {
            $request->validate($this->validateRules);

            $data = $request->all();

            $tag = new Tag();
            $tag->name = $data['name'];
            $tag->slug = Str::of($tag['name'])->slug('-');
            $tag->save();
        }

        return redirect()->route('admin.tags.index')->with('success', "The tag number {$tag->id} update gone success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tag = Tag::find($request->deleteId);

        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', "The tag number {$tag->id} has been deleted");
    }
}

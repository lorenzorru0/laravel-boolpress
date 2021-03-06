@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit blog\'s post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('admin.blogs.update', $blog['id'])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Write the post's title" value="{{ old('title') ? old('title') : $blog['title'] }}">

                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Write the post's username" value="{{ old('username') ? old('username') : $blog['username'] }}">

                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Write the post's content">{{ old('content') ? old('content') : $blog['content'] }}</textarea>

                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control @error('title') is-invalid @enderror">
                                <option value="">-- Select the category --</option>
                                @foreach ($categories as $category)
                                @if ($errors->any())
                                    <option value="{{$category['id']}}" {{old('category') == $category['id'] ? 'selected' : ''}}>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}" {{$blog['category_id'] != null && $blog['category_id'] == $category['id'] ? 'selected' : ''}}>{{$category['name']}}</option>
                                @endif
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="class-group">
                            <p>Tags</p>
                            @foreach ($tags as $tag)    
                                <div class="custom-control custom-checkbox">
                                    @if ($errors->any())
                                        <input {{in_array($tag['id'], old('tags')) ? 'checked' : ''}} name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                                        <label class="custom-control-label" for="tag-{{$tag['id']}}">{{$tag['name']}}</label>
                                    @else
                                        <input {{$blog['tags']->contains($tag['id']) ? 'checked' : ''}} name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                                        <label class="custom-control-label" for="tag-{{$tag['id']}}">{{$tag['name']}}</label>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-warning mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

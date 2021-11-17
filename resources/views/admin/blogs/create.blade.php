@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create blog\'s post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('admin.blogs.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Write the post's title" value="{{ old('title') }}">

                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="username" id="username" placeholder="Write the post's username" value="{{ old('username') }}">

                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control @error('title') is-invalid @enderror" name="content" id="content" cols="30" rows="10" placeholder="Write the post's content">{{ old('content') }}</textarea>

                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control @error('title') is-invalid @enderror">
                                <option value="">-- Select the category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category['id']}}" {{old('category') && old('category') == $category['id'] ? selected : ''}}>{{$category['name']}}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show single blog\'s post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Title: {{$blog['title']}}</h2>
                    <p>Slug: {{$blog['slug']}}</p>
                    <h4>User: {{$blog['username']}}</h4>
                    <h4>Created: {{$blog['created_at']}}</h4>
                    <p>Content: {{$blog['content']}}</p>
                    <a href="{{ route('admin.blogs.edit', $blog['id']) }}"><button type="button" class="btn btn-warning mt-1">Edit</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

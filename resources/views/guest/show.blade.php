@extends('layouts.guest')

@section('blogContent')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-2">
                <h1 class="fw-bolder">View of single blog's post</h1>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container main_show_guest">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{$blog['title']}}</h2>
                        <div class="small text-muted">{{$blog['created_at']}} by {{$blog['username']}}</div>
                        <p class="card-text">{{$blog['content']}}</p>
                        @if ($blog['category'] != null)
                            <p>Category: <a href="{{route('blog.category.show', $blog['category']['slug'])}}">{{$blog['category']['name']}}</a></p>
                        @endif
                        @if (count($blog['tags']) > 0)
                            <div>
                                <span>Tags:</span>
                                @foreach ($blog['tags'] as $tag)
                                    <a href="{{route('blog.tag.show', $tag['slug'])}}" class="badge badge-pill badge-primary">{{$tag['name']}}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
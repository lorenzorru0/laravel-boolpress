@extends('layouts.guest')

@section('blogContent')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-3">
                <h1 class="fw-bolder">Welcome to Boolpress blog Home</h1>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container main_guest">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                @foreach ($blogs as $blog)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{$blog['title']}}</h2>
                            <div class="small text-muted">{{$blog['created_at']}} by {{$blog['username']}}</div>
                            <p class="card-text">{{substr($blog['content'], 0, 100) . '...'}}</p>
                            <a class="btn btn-primary" href="{{ route('blog.show', $blog['slug']) }}">Read more →</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.guest')

@section('blogContent')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-2">
                <h1 class="fw-bolder">View of single tag</h1>
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
                        <h2 class="card-title">Name: {{$tag['name']}}</h2>
                        @if (count($tag['blogs']) > 0)
                            <div>
                                <span>Blogs with this tag:</span>
                                <ul class="list-group list-group-flush">
                                    @foreach ($tag['blogs'] as $blog)
                                        <li class="list-group-item"><a href="{{route('blog.show', $blog['slug'])}}">{{$blog['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
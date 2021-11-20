@extends('layouts.app')

@section('content')
<div class="container show">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Show single blog\'s post') }}
                    <a href="{{ route('admin.blogs.index') }}">All posts</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Name: {{$category['name']}}</h2>
                    <p>Slug: {{$category['slug']}}</p>
                    
                    @if (count($category['blogs']) > 0)
                        <h4>Posts:</h4>
                        @foreach ($category['blogs'] as $blog)
                            <a href="{{route('admin.blogs.show', $blog['id'])}}" class="badge badge-secondary mt-2">{{$blog['title']}}</a> <br>
                        @endforeach
                    @endif

                    <a href="{{ route('admin.categories.edit', $category['id']) }}"><button type="button" class="btn btn-warning mt-3">Edit</button></a>
                    <form action="{{ route('admin.categories.destroy', $category['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mt-1 deleteButton" data-id='{{$category['id']}}' data-toggle="modal" data-target="#exampleModal">
                        Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure that you want delete this category?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="deleteId" id="deleteId">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

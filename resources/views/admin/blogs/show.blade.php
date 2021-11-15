@extends('layouts.app')

@section('content')
<div class="container">
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

                    <h2>Title: {{$blog['title']}}</h2>
                    <p>Slug: {{$blog['slug']}}</p>
                    <h4>User: {{$blog['username']}}</h4>
                    <h4>Created: {{$blog['created_at']}}</h4>
                    <p>Content: {{$blog['content']}}</p>
                    <a href="{{ route('admin.blogs.edit', $blog['id']) }}"><button type="button" class="btn btn-warning mt-1">Edit</button></a>
                    <form action="{{ route('admin.blogs.destroy', $blog['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mt-1 deleteButton" data-id='{{$blog['id']}}' data-toggle="modal" data-target="#exampleModal">
                        Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure that you want delete this post?
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

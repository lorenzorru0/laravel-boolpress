@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('All blogs in the database') }}
                    <a href="{{ route('admin.blogs.create') }}"><button type="button" class="btn btn-success">Create new post</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>    
                            <strong>{{ $message }}</strong>
                        </div>
					@endif

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Username</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Created date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{$blog['id']}}</td>
                                    <td>{{$blog['title']}}</td>
                                    <td>{{$blog['slug']}}</td>
                                    <td>{{$blog['username']}}</td>
                                    <td>{{$blog['category'] != null ? $blog['category']['name'] : ''}}</td>
                                    <td>
                                        @foreach ($blog['tags'] as $tag)
                                            <span class="badge badge-pill badge-primary">{{$tag['name']}}</span> <br>
                                        @endforeach
                                    </td>
                                    <td>{{$blog['created_at']}}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.show', $blog['id']) }}"><button type="button" class="btn btn-primary">View</button></a> <br>
                                        <a href="{{ route('admin.blogs.edit', $blog['id']) }}"><button type="button" class="btn btn-warning mt-1">Edit</button></a> <br>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger mt-1 deleteButton" data-id='{{$blog['id']}}' data-toggle="modal" data-target="#exampleModal">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <form action="{{ route('admin.blogs.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure that you want delete this category?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
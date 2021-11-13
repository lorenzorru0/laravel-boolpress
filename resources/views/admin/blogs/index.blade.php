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

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Username</th>
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
                                    <td>{{$blog['created_at']}}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.show', $blog['id']) }}"><button type="button" class="btn btn-primary">View</button></a> <br>
                                        <a href="{{ route('admin.blogs.edit', $blog['id']) }}"><button type="button" class="btn btn-warning mt-1">Edit</button></a> <br>
                                        <form action="{{ route('admin.blogs.destroy', $blog['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-1">Delete</button>
                                        </form>
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
@endsection
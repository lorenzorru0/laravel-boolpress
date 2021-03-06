@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('All tags in the database') }}
                    <a href="{{ route('admin.tags.create') }}"><button type="button" class="btn btn-success">Create new tag</button></a>
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
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Created date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$tag['id']}}</td>
                                    <td>{{$tag['name']}}</td>
                                    <td>{{$tag['slug']}}</td>
                                    <td>{{$tag['created_at']}}</td>
                                    <td>
                                        <a href="{{ route('admin.tags.show', $tag['id']) }}"><button type="button" class="btn btn-primary">View</button></a> 
                                        <a href="{{ route('admin.tags.edit', $tag['id']) }}"><button type="button" class="btn btn-warning">Edit</button></a> 
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger deleteButton" data-id='{{$tag['id']}}' data-toggle="modal" data-target="#exampleModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Deleting tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.tags.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure that you want delete this tag?
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
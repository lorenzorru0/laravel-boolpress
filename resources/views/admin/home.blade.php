@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Boolpress Backoffice') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.blogs.index') }}" class="badge badge-secondary">All blogs</a> <br>
                    <a href="{{ route('admin.categories.index') }}" class="badge badge-primary mt-2">All categories</a> <br>
                    <a href="{{ route('admin.tags.index') }}" class="badge badge-secondary mt-2">All tags</a> <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>


    <div>
        <h3>Hello, {{ Auth::user()->name }}</h3>
    </div>
    <br>
    <a href="{{ route('posts.create')}}" class="btn btn-primary mb-3">Create new post</a>

    @foreach($temp as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                <div class="d-flex justify-content-between">
                    <div>
                        @can('view-post')
                            <a href="{{ route('posts.show', $post->id)}}" class="btn btn-sm btn-info">View</a>
                        @endcan

                        @can('edit-post')
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan

                    </div>

                    @can('delete-post')
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endcan

                </div>
            </div>
        </div>
    @endforeach

@endsection
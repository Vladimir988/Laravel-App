@extends('layouts.main')
@section('content')
    <div class="post mb-3">
        <div class="post-id">ID: {{ $post->id }}</div>
        <div class="post-title">Title: {{ $post->title }}</div>
        <div class="post-content">Content: {{ $post->post_content }}</div>
        <div class="post-image">Image: {{ $post->image }}</div>
        <div class="post-category">Category: {{ $post->category->title }}</div>
        <div class="post-category">Tags:
            @foreach($post->tags as $tag)
                <span class="badge badge-success">{{ $tag->title }}</span>
            @endforeach
        </div>
    </div>
    <div>
        <a class="btn btn-success mr-3" href="{{ route('post.edit', $post->id) }}" role="button">Edit</a>
        <form action="{{ route('post.delete', $post->id) }}" method="post" style="display: inline-block;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mr-3">Delete</button>
        </form>
        <hr>
        <a class="btn btn-primary" href="{{ route('post.index') }}" role="button">All posts</a>
    </div>
@endsection

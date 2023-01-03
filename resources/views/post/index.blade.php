@extends('layouts.main')
@section('content')
    <div class="new-post-wrapper">
        <a class="btn btn-primary mb-3" href="{{ route('post.create') }}" role="button">Create new post</a>
    </div>
    <div class="post-container">
        @foreach($posts as $post)
            <div class="post mb-3">
                {{ $post->id }}: <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
            </div>
        @endforeach
    </div>
    <div class="links-wrapper mt-4">
        {{ $posts->links() }}
    </div>
@endsection

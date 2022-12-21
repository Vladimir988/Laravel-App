@extends('layouts.main')
@section('content')
    <div>
        <a class="btn btn-primary mb-3" href="{{ route('post.create') }}" role="button">Create new post</a>
    </div>
    @foreach($posts as $post)
        <div class="post">
            {{ $post->id }}: <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
        </div>
        <br>
    @endforeach
@endsection

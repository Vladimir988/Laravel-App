@extends('layouts.main')
@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="post-title">{{ $post->title }}</div>
            <div class="post-content">{{ $post->post_content }}</div>
            <div class="post-likes">{{ $post->likes }}</div>
        </div>
        <br>
    @endforeach
@endsection

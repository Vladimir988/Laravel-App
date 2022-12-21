@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="post_content">Post content</label>
                <textarea name="post_content" class="form-control" id="post_content" placeholder="Content ...">{{ $post->post_content }}</textarea>
                <small id="content_help" class="form-text text-muted">Paste here some content of the post.</small>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">
            </div>
            <div class="form-group">
                <label for="likes">Likes</label>
                <input name="likes" type="number" class="form-control" id="likes" placeholder="Likes" value="{{ $post->likes }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

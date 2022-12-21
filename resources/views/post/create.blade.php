@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="post_content">Post content</label>
                <textarea name="post_content" class="form-control" id="post_content" placeholder="Content ..."></textarea>
                <small id="content_help" class="form-text text-muted">Paste here some content of the post.</small>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Image">
            </div>
            <div class="form-group">
                <label for="likes">Likes</label>
                <input name="likes" type="number" class="form-control" id="likes" placeholder="Likes">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

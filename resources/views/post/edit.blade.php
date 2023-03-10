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
                <label for="category">Category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" multiple class="form-control" id="tags">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a class="btn btn-secondary mr-3" href="{{ route('post.show', $post->id) }}">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

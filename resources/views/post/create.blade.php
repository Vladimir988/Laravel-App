@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="post_content">Post content</label>
                <textarea name="post_content" class="form-control" id="post_content" placeholder="Content ...">{{ old('post_content') }}</textarea>
                <small id="content_help" class="form-text text-muted">Paste here some content of the post.</small>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" multiple class="form-control" id="tags">
                    @foreach($tags as $tag)
                        <option
                            @if(old('tags')) @foreach(old('tags') as $postTag)
                                {{ $tag->id == $postTag ? ' selected ' : '' }}
                            @endforeach @endif
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
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

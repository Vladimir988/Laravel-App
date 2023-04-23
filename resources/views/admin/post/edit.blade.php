@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Edit post', 'breadcrumb' => 'posts'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card card-primary">
                            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="post-name">Name:</label>
                                        <input type="text" class="form-control" id="post-name" name="title" placeholder="Post name" value="{{ $post->title }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="post-name">Content:</label>
                                        <textarea id="post-content" name="content">{{ $post->content }}</textarea>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="preview_image">Add preview</label>
                                        <div class="w-25 mb-3">
                                            <img class="" src="{{ '/storage/' . $post->preview_image }}" alt="alt">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="preview_image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        @error('preview_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="main_image">Add main image</label>
                                        <div class="w-25 mb-3">
                                            <img class="" src="{{ '/storage/' . $post->main_image }}" alt="alt">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="main_image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        @error('preview_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Categories</label>
                                        <div class="input-group">
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}"
                                                        {{ $category->id == $post->category_id ? ' selected' : '' }}
                                                    >
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">Tags</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a tags" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach($tags as $tag)
                                                    <option {{ isTagSelected($tag->id, $post->tags->pluck('id')->toArray()) }} value="{{ $tag->id }}" >
                                                        {{ $tag->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tag_ids')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

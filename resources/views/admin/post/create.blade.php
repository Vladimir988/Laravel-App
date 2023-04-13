@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Add new post'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add post</h3>
                            </div>
                            <form action="{{ route('admin.post.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="post-name">Name:</label>
                                        <input type="text" class="form-control" id="post-name" name="title" placeholder="Post name" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="text-danger">Post name is required!</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="post-name">Content:</label>
                                        <textarea id="post-content" name="content">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="text-danger">Post content is required!</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

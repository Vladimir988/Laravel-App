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
                            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group">
                                        <label for="preview_image">Add preview</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="preview_image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="main_image">Add main image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="main_image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label-bold">Jenis</label>
                                        <select class="select2 form-control" id="type" multiple required>
                                            <option value="">Pilih</option>
                                            <option value="1">Head Office</option>
                                            <option value="2">Branch Office</option>
                                        </select>
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

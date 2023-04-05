@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Add new category'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add category</h3>
                            </div>
                            <form action="{{ route('admin.category.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category-name">Category name</label>
                                        <input type="text" class="form-control" id="category-name" name="title" placeholder="Category name">
                                        @error('title')
                                            <div class="text-danger">Category name is required!</div>
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

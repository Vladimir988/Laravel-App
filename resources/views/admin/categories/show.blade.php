@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Category'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>Title</td>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th>Edit</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td><a href="{{ route('admin.category.edit', $category->id) }}"><i class="far fa-edit"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-3 mb-4">
                <a href="{{ route('admin.category.index') }}" class="btn btn-block btn-primary">All Categories</a>
            </div>
        </section>
    </div>
@endsection

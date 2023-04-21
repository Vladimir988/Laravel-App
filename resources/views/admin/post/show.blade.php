@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => $post->title, 'breadcrumb' => 'posts'])
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
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td><a href="{{ route('admin.post.edit', $post->id) }}"><i class="far fa-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent"><i class="fas fa-trash-alt text-danger" role="button"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-3 mb-4">
                <a href="{{ route('admin.post.index') }}" class="btn btn-block btn-primary">All Posts</a>
            </div>
        </section>
    </div>
@endsection

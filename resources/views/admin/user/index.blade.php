@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Users'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users List</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td><a href="{{ route('admin.user.show', $user->id) }}"><i class="far fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.user.edit', $user->id) }}"><i class="far fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fas fa-trash-alt text-danger" role="button"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-2">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

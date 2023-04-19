@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('admin.includes.content-header', ['title' => 'Edit user'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card card-primary">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="user-name">User name:</label>
                                        <input type="text" class="form-control" id="user-name" name="name" placeholder="User name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="text-danger">User name is required!</div>
                                        @enderror
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

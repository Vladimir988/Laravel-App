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
                                        <label for="user-name">Name</label>
                                        <input type="text" class="form-control" id="user-name" name="name" placeholder="User name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">Email</label>
                                        <input type="text" class="form-control" id="user-email" name="email" placeholder="User email" value="{{ $user->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <div class="input-group">
                                            <select name="role" class="form-control">
                                                @foreach($roles as $id => $role)
                                                    <option
                                                        value="{{ $id }}"
                                                        {{ $id == $user->role ? ' selected' : '' }}
                                                    >
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
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

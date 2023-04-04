@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    @include('admin.includes.content-header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    Categories
                </div>
                <div class="col-lg-2 col-2">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">Create</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

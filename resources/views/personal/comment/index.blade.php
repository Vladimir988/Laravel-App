@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    @include('admin.includes.content-header', ['title' => 'Comments', 'breadcrumb' => 'personal'])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>11111</h3>
                            <p>Liked posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>2222222</h3>
                            <p>Comments</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-comment"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

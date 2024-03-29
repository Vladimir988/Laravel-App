<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title ?? 'Dashboard' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $breadcrumb ?? '' }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

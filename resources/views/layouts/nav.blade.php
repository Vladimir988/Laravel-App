<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about.index') }}">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Posts</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('post.index') }}">All posts</a>
                    <a class="dropdown-item" href="{{ route('post.create') }}">Create</a>
                </div>
            </li>
            @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.post.index') }}">Admin</a>
                </li>
            @endcan
        </ul>
    </div>
</nav>

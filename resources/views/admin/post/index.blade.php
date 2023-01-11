@extends('admin.main')
@section('content')
    <section class="content">
        <div class="container-fluid">

          <div class="post-container">
            @foreach($posts as $post)
              <div class="post mb-3">
                {{ $post->id }}: <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
              </div>
            @endforeach
          </div>
          <div class="links-wrapper mt-4">
            {{ $posts->appends($_GET)->links() }}
          </div>

        </div>
    </section>
@endsection

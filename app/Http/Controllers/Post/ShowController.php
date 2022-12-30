<?php

namespace App\Http\Controllers\Post;

use App\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}

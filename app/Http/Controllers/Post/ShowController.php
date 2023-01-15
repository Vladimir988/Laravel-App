<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostResource;
use App\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return new PostResource($post);
//        return view('post.show', compact('post'));
    }
}

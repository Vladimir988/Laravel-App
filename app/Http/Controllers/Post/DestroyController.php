<?php

namespace App\Http\Controllers\Post;

use App\Post;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}

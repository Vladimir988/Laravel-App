<?php

namespace App\Http\Controllers\Post;

use App\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
//        $posts = Post::all();
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}

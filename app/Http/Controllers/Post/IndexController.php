<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
        public function __invoke()
    {
//      $posts       = Post::with('category')->paginate(3);
        $posts       = Post::paginate(3);
        $randomPosts = Post::inRandomOrder()->limit(10)->get();
        return view('post.index', compact('posts', 'randomPosts'));
    }
}

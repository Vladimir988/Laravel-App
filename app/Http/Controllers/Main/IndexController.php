<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts       = Post::paginate(3);
        $randomPosts = Post::inRandomOrder()->limit(10)->get();
        return view('main.index', compact('posts', 'randomPosts'));
    }
}

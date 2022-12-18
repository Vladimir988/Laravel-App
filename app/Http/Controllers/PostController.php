<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);

        dump($post->title);
        dd($post);
    }
}

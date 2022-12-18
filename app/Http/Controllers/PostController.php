<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            dump($post->title);
        }

        $druftPosts = Post::where('is_published', false)->get();

        foreach ($druftPosts as $post) {
            dump($post->title);
        }

        $firstPublished = Post::where('is_published', true)->first();

        dump($firstPublished->title);

        dd('... end!');
    }
}

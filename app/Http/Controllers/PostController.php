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

    public function create()
    {
        $postsArr = [
            [
                'title'        => 'title of post from phpstorm 2',
                'content'      => 'some interesting content 2',
                'image'        => 'image2.jpg',
                'likes'        => 22,
                'is_published' => true,
            ],
            [
                'title'        => 'title of post from phpstorm 3',
                'content'      => 'some interesting content 3',
                'image'        => 'image3.jpg',
                'likes'        => 33,
                'is_published' => true,
            ],
        ];

        foreach ($postsArr as $post) {
            Post::create($post);
        }

        dd('done!');
    }
}

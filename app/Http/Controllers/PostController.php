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
                'title'        => 'title of post from phpstorm 1',
                'content'      => 'some interesting content 1',
                'image'        => 'image1.jpg',
                'likes'        => 11,
                'is_published' => true,
            ],
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

    public function update()
    {
        $id   = 6;
        $post = Post::find($id);

        $post->update([
            'title'        => 'title of post from phpstorm ' . $id,
            'content'      => 'some interesting content ' . $id,
            'image'        => 'image' . $id . '.jpg',
            'likes'        => $id * 11,
            'is_published' => true,
        ]);

        dd($post);
    }

    public function delete()
    {
        $id   = 2;
        $post = Post::find($id);

        $post->delete();

        dd('deleted !');
    }

    public function restore()
    {
        $id   = 2;
        $post = Post::withTrashed()->find($id);

        $post->restore();

        dd('restored !');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title'        => 'title of anotherPost post',
            'content'      => 'some interesting content of anotherPost',
            'image'        => 'anotherPost.jpg',
            'likes'        => 50000,
            'is_published' => true,
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'title of anotherPost post',
            ],
            $anotherPost
        );

        dump($post->content);
        dd('done !');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title'        => 'updateOrCreate post title 111',
            'content'      => 'updateOrCreate post content 111',
            'image'        => 'updateOrCreate.jpg',
            'likes'        => 1,
            'is_published' => true,
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'updateOrCreate post title',
            ],
            $anotherPost
        );

        dump($post->content);
        dd('done !');
    }
}

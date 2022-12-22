<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    //////////////////////////////////////////////////////////
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

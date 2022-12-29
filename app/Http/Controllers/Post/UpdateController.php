<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title'        => 'required|string',
            'post_content' => 'required|string',
            'image'        => 'required|string',
            'category_id'  => 'integer',
            'tags'         => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
}

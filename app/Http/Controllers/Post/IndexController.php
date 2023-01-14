<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFiletr;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data   = $request->validated();
        $filter = app()->make(PostFiletr::class, ['queryParams' => array_filter($data)]);
        $posts  = Post::filter($filter)->paginate(10);

        return PostResource::collection($posts);

//        return view('post.index', compact('posts'));
    }
}

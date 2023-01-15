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
        $data    = $request->validated();
        $page    = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
        $filter  = app()->make(PostFiletr::class, ['queryParams' => array_filter($data)]);
        $posts   = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
//        $posts  = Post::all();

//        return PostResource::collection($posts);
        return view('post.index', compact('posts'));
    }
}

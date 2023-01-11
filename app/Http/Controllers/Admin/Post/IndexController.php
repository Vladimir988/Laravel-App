<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFiletr;
use App\Http\Requests\Post\FilterRequest;
use App\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data   = $request->validated();
        $filter = app()->make(PostFiletr::class, ['queryParams' => array_filter($data)]);
        $posts  = Post::filter($filter)->paginate(8);

        return view('admin.post.index', compact('posts'));
    }
}

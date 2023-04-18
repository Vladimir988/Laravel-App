<?php

namespace App\Service;

use Exception;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data): void
    {
        try {
            DB::beginTransaction();
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image']    = Storage::disk('public')->put('/images', $data['main_image']);
            $tagIds                = $data['tag_ids'];
            unset($data['tag_ids']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, Post $post): Post
    {
        try {
            DB::beginTransaction();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $post->tags()->sync($tagIds);
            }
            $post->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}

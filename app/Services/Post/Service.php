<?php

namespace App\Services\Post;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags     = $data['tags'] ?? [];
            $category = $data['category'] ?? false;
            unset($data['tags'], $data['category']);

            $tagIds              = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();
            $tags     = $data['tags'] ?? [];
            $category = $data['category'] ?? false;
            unset($data['tags'], $data['category']);

            $tagIds              = $this->getTagIdsWithUpdate($tags);
            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = (!isset($tag['id'])) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getCategoryId($item)
    {
        if ($item) {
            $category = (! isset($item['id'])) ? Category::create($item) : Category::find($item['id']);

            return $category->id;
        }

        return $item;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (! isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }

            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if ($item) {
            if(! isset($item['id'])) {
                $category = Category::create($item);
            } else {
                $category = Category::find($item['id']);
                $category->update($item);
                $category = $category->fresh();
            }

            return $category->id;
        }

        return $item;
    }
}

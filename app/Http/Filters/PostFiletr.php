<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFiletr extends AbstractFilter
{
    public const TITLE       = 'title';
    public const CONTENT     = 'post_content';
    public const IMAGE       = 'image';
    public const CATEGORY_ID = 'category_id';
    public const TAGS        = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE       => [$this, 'title'],
            self::CONTENT     => [$this, 'postContent'],
            self::IMAGE       => [$this, 'image'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function postContent(Builder $builder, $value)
    {
        $builder->where('post_content', 'like', "%{$value}%");
    }

    public function image(Builder $builder, $value)
    {
        $builder->where('image', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

//    public function tags(Builder $builder, $value)
//    {
//        $builder->where('tags', 'like', "%{$value}%");
//    }
}

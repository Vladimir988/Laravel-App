<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'        => $this->title,
            'post_content' => $this->post_content,
            'image'        => $this->image,
            'category_id'  => $this->category_id,
            'tags'         => $this->tags,
        ];
    }
}

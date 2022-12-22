<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table   = 'posts';
    protected $guarded = [];
    // protected $fillable = ['title', 'content', 'image', 'likes', 'is_published'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

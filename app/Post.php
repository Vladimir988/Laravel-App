<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table   = 'posts';
    protected $guarded = [];
    // protected $fillable = ['title', 'content', 'image', 'likes', 'is_published'];
}

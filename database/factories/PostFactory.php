<?php

use App\Post;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'        => $faker->title(10),
        'post_content' => $faker->text,
        'image'        => $faker->imageUrl(),
        'likes'        => random_int(1, 2000),
        'is_published' => 1,
        'category_id'  => Category::get()->random()->id,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'cat_id'=>rand(1,4),
        'name'=>$faker->sentence,
        'price'=>20000,
        'image'=>$faker->imageUrl(),
        'description'=>$faker->text(),
        'count'=>rand(1,50),
        'view_count'=>rand(1,1000),
        'child_image_1'=>$faker->imageUrl(),
        'child_image_2'=>$faker->imageUrl(),
        'child_image_3'=>$faker->imageUrl(),
        'child_image_4'=>$faker->imageUrl(),
    ];
});

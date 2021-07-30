<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'label'=>$faker->sentence,
        'parent_id'=>rand(1,5)
    ];
});

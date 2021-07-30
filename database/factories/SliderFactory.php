<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'name'=>'اسلایدر اول',
        'text'=>'توضیخات اسلایدر',
        'image'=>$faker->imageUrl(),
        'url'=>'https://google.com'
    ];
});

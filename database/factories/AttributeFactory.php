<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'label'=>$faker->name,
        'value'=>$faker->name
    ];
});

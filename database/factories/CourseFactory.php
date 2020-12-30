<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(1, 500),
        'campuse_id' => App\Campuse::pluck('id')->random(),
    ];
});
/*Ahmad Ibrahim*/

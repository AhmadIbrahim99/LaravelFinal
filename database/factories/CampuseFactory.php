<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campuse;
use Faker\Generator as Faker;

$factory->define(Campuse::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->city,
        'school_id' => App\School::pluck('id')->random(),
    ];
});

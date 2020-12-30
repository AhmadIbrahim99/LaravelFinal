<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'logo' => $faker->image('public/storage/schools', 640, 480, null, false),
        'website' => $faker->domainName,
    ];
});
//Hamza Ayman

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourseType;
use Faker\Generator as Faker;

$factory->define(CourseType::class, function (Faker $faker) {
    return [
        'course_id' => App\Course::pluck('id')->random(),
        'type_id' => App\Type::pluck('id')->random(),
    ];
});
/*Ahmad Ibrahim*/

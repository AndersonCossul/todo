<?php

use Faker\Generator as Faker;
use App\Models\Todo;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        // 50 stands for maxNumberOfChars
        'todo' => $faker->realText(50)
    ];
});

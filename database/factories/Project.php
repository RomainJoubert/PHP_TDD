<?php

use Faker\Generator as Faker;

$factory->define(App\Projet::class, function (Faker $faker) {
    return [
        'projectName' => $faker->company,
        'descriptive' => $faker->text,
        'authorName' => $faker->firstName,
        'created_at' =>$faker->dateTime,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Projet::class, function (Faker $faker) use($factory) {
    return [
        'projectName' => $faker->company,
        'descriptive' => $faker->text,
        'created_at' =>$faker->dateTime,
        'user_id' =>$factory->create(App\User::class)->id,
    ];
});

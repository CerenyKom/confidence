<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Com::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence,
        'post_id' => $faker->numberBetween(0,255),
        'user_id' => 1,
    ];
});

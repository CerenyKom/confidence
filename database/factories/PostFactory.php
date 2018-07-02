<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
         'titre_post' => $faker->title,
         'contenue_post' => $faker->sentence,
         'user_id' => 1,
     ];
});

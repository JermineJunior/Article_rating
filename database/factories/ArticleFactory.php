<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title'  => $faker->sentence,
        'body'    =>$faker->paragraph,
    ];
});
$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'user_id'  => auth()->id(),
        'article_id' => $faker->numberBetween(1,4),
        'rating'  => $faker->numberBetween(1,5),
    ];
});


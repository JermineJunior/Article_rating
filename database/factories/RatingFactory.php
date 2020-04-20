<?php
use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'user_id'  => auth()->id(),
        'article_id' => $faker->numberBetween(1,4),
        'rating'  => $faker->numberBetween(1,5),
    ];
});

<?php

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'location' => $faker->city,
        'price' => $faker->numberBetween(100, 100000),
        'availability' => $faker->randomElement(['sale', 'rent']),
        'type' => $faker->randomElement(['apartment', 'studio', 'loft', 'maisonette']),
        'square_meters' => $faker->numberBetween(20, 10000),
    ];
});

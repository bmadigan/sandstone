<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'user_id'               => 1,
        'product_name'          => $faker->company . ' - ' . $faker->jobTitle,
        'product_description'   => $faker->sentence,
        'product_image'         => $faker->imageUrl(640, 480, 'food'),
        'price'                 => $faker->numberBetween(1000, 10000)
    ];
});

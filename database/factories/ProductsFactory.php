<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {

    $productNames = [
        'Beauty Supply', 'B2B Product', 'Belts', 'Personal Care', 'Gear', 'Equipment', 'Parts', 'Nutrition'
    ];

    return [
        'user_id'               => 1,
        'product_name'          => $faker->colorName . ' ' . $faker->randomElement($productNames),
        'product_description'   => $faker->sentence,
        'product_image'         => $faker->imageUrl(640, 480, 'food'),
        'price'                 => $faker->numberBetween(1000, 10000)
    ];
});

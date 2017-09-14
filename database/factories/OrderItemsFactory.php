<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderItem::class, function (Faker $faker) {
    $productNames = [
        'Beauty Supply', 'B2B Product', 'Belts', 'Personal Care', 'Gear', 'Equipment', 'Parts', 'Nutrition'
    ];

    return [
        'order_id'          => 1,
        'product_id'        => 1,
        'product_name'      => $faker->colorName . ' ' . $faker->randomElement($productNames),
        'product_price'     => $faker->numberBetween(1000, 10000),
        'quantity'          => 1
    ];
});

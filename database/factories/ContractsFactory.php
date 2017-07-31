<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contract::class, function (Faker $faker) {
    return [
        'user_id'           => 1,
        'buyer_id'          => 1,
        'contract_name'     => $faker->company . ' - ' . $faker->jobTitle,
        'contract_number'   => $faker->swiftBicNumber,
        'released_date'     => $faker->dateTimeThisYear,
        'released_weight'   => $faker->numberBetween(10000,100000)
    ];
});

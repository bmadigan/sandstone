<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'name'              => $faker->firstNameMale . ' ' . $faker->lastName,
        'email'             => $faker->email,
        'stripe_id'         => 'CUS-' . str_random(),
        'card_brand'        => $faker->creditCardType,
        'card_last_four'    => $faker->numberBetween(1111, 9999)
    ];
});

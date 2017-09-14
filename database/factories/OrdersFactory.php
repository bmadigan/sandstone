<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {

    return [
        'customer_id'       => 1,
        'order_number'      => str_random(),
        'customer_email'    => $faker->email,
        'payment_token'     => 'TOK-' . str_random(),
        'client_ip'         => $faker->ipv4,
        'cc_last_4'         => $faker->numberBetween(1111, 9999),
        'cc_brand'          => $faker->creditCardType,
        'total_paid'        => $faker->numberBetween(11111, 99999),
        'created_at'        => $faker->dateTimeBetween('-2 years', 'now')
    ];

});

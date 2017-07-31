<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Shipment::class, function (Faker $faker) {

    return [
        'user_id'               => 1,
        'contract_id'           => 1,
        'transportation_type'   => $faker->randomElement(['Truck', 'Railcar', 'Ship', 'Barge']),
        'po_number'             => 'PO-' . $faker->ean8,
        'weight_loaded'         => $faker->numberBetween(1000, 100000),
        'weight_measurement'    => $faker->randomElement(['Pounds', 'Tonnes']),
        'actual_shipped_date'   => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        'received_date'         => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        'shipment_notes'        => $faker->sentence,
    ];
});

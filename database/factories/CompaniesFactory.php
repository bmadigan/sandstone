<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'user_id'           => 1,
        'company_name'      => $faker->company,
        'street_address'    => $faker->streetAddress,
        'secondary_address' => $faker->secondaryAddress,
        'city'              => $faker->citySuffix,
        'state'             => $faker->stateAbbr,
        'country'           => 'US',
        'zipcode'           => $faker->postcode,
        'contact_name'      => $faker->name,
        'contact_email'     => $faker->safeEmail,
    ];
});

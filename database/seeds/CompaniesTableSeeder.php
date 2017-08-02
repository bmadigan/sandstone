<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Models\User::all();

        $users->map(function($user) {
            // Create associated Companies with Contracts
            $companies = factory(App\Models\Company::class, rand(10, 20))->create(['user_id' => $user->id]);
            $companies->map(function($company) {
                $contracts = factory(App\Models\Contract::class, rand(3, 15))->create([
                    'user_id' => $company->user_id,
                    'buyer_id' => $company->id
                ]);
                // Create Shipments
                $contracts->map(function($contract) {
                    factory(App\Models\Shipment::class, rand(1, 5))->create([
                        'user_id' => $contract->user_id,
                        'contract_id' => $contract->id
                    ]);
                });
            });


            // Create associated Products
            factory(App\Models\Product::class, rand(5, 20))->create(['user_id' => $user->id]);
        });

    }
}

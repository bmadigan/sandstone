<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // For the sake of simplicity, we are going to create just 1 seeder
        // file that will create the rest of the seeded data
        $this->call(CompaniesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 20)->create();

        // Setup some developer accounts to test with
        $developers = [
            ['name' => 'Brad Madigan', 'email' => 'bradmadigan@gmail.com', 'password' => 'secret'],
            ['name' => 'Admin Tester', 'email' => 'test@example.com', 'password' => 'secret123']
        ];

        collect($developers)->each(function($dev) {
            factory(\App\Models\User::class)->create([
                'name' => $dev['name'],
                'email' => $dev['email'],
                'password' => bcrypt($dev['password']),
            ]);
        });
    }
}

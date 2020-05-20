<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // create user to use for authentication
        factory('App\User')->create(['email' => 'example@256.com']);
    }
}

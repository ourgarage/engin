<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => env('ADMINISTRATOR_NAME'),
            'email' => env('ADMINISTRATOR_EMAIL'),
            'password' => bcrypt(env('ADMINISTRATOR_PASSWORD'))
        ]);
    }
}

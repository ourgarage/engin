<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'example@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}

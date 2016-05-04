<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => env('ADMINISTRATOR_NAME', 'Administrator'),
            'email' => env('ADMINISTRATOR_EMAIL', 'administrator@example.local'),
            'password' => bcrypt(env('ADMINISTRATOR_PASSWORD', '123456')),
            'roles' => User::ROLE_SUPERADMIN
        ]);
    }
}

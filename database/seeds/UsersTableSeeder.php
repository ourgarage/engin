<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@example.local',
            'password' => '123456',
            'roles' => User::ROLE_SUPERADMIN
        ]);
    }
}

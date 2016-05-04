<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administrator@example.local',
            'password' => bcrypt('123456'),
            'roles' => User::ROLE_SUPERADMIN
        ]);
    }
}

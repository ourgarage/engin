<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use Jenssegers\Date\Date;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administrator@example.local',
            'password' => bcrypt('123456'),
            'roles' => User::ROLE_SUPERADMIN,
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
    }
}

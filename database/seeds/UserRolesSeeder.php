<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_has_roles')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        DB::table('users_has_roles')->insert([
            'role_id' => 2,
            'user_id' => 3
        ]);

        DB::table('users_has_roles')->insert([
            'role_id' => 3,
            'user_id' => 8
        ]);
    }
}

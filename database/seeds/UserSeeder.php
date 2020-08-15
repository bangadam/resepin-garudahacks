<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'dok',
            'email' => 'dok@kamarpelajar.com',
            'password' => Hash::make('dok'),
            'created_at' => now()
        ]);
        
        DB::table('users')->insert([
            'name' => 'dok2',
            'email' => 'dok2@kamarpelajar.com',
            'password' => Hash::make('dok2'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'pas',
            'email' => 'pas@kamarpelajar.com',
            'password' => Hash::make('pas'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'pas2',
            'email' => 'pas2@kamarpelajar.com',
            'password' => Hash::make('pas2'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'pas3',
            'email' => 'pas3@kamarpelajar.com',
            'password' => Hash::make('pas3'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'pas4',
            'email' => 'pas4@kamarpelajar.com',
            'password' => Hash::make('pas4'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'pas5',
            'email' => 'pas5@kamarpelajar.com',
            'password' => Hash::make('pas5'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'apo',
            'email' => 'apo@kamarpelajar.com',
            'password' => Hash::make('apo'),
            'created_at' => now()
        ]);
    }
}

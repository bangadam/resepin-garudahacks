<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRolesSeeder::class);        
        $this->call(DokterSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(ApotekSeeder::class);
        $this->call(ApotekerSeeder::class);
        $this->call(ObatSeeder::class);
        $this->call(ResepSeeder::class);
        $this->call(ResepDetailSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApotekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apoteker')->insert([
            'id_user' => 8,
            'id_apotek' => 1
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasien')->insert([
            'id_user' => 3,
            'dob' => '1998-01-01'
        ]);
        
        DB::table('pasien')->insert([
            'id_user' => 4,
            'dob' => '1960-01-01'
        ]);

        DB::table('pasien')->insert([
            'id_user' => 5,
            'dob' => '1965-01-01'
        ]);

        DB::table('pasien')->insert([
            'id_user' => 6,
            'dob' => '2010-01-01'
        ]);

        DB::table('pasien')->insert([
            'id_user' => 7,
            'dob' => '1989-01-01'
        ]);
    }
}

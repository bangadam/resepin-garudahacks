<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokter')->insert([
            'id_user' => 1,
            'sip' => '1111111',
            'str' => '2222222'
        ]);

        DB::table('dokter')->insert([
            'id_user' => 2,
            'sip' => '3333333',
            'str' => '4444444'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep')->insert([
            'id_user_dokter' =>  1,
            'id_user_pasien' =>  3,
            'tanggal_resep' =>  '2020-08-14 10:15:00',
            'id_user_apoteker' =>  8,
            'diagnosa' =>  'Acute headache' 
        ]);

        DB::table('resep')->insert([
            'id_user_dokter' =>  1,
            'id_user_pasien' =>  4,
            'tanggal_resep' =>  '2020-08-14 11:15:00',
            'id_user_apoteker' =>  8,
            'diagnosa' =>  'Stroke' 
        ]);

        DB::table('resep')->insert([
            'id_user_dokter' =>  1,
            'id_user_pasien' =>  5,
            'tanggal_resep' =>  '2020-08-14 12:15:00',
            'id_user_apoteker' =>  8,
            'diagnosa' =>  'Heart failure' 
        ]);

        DB::table('resep')->insert([
            'id_user_dokter' =>  2,
            'id_user_pasien' =>  6,
            'tanggal_resep' =>  '2020-08-14 10:15:00',
            'id_user_apoteker' =>  8,
            'diagnosa' =>  'Asthma' 
        ]);

        DB::table('resep')->insert([
            'id_user_dokter' =>  2,
            'id_user_pasien' =>  7,
            'tanggal_resep' =>  '2020-08-14 11:15:00',
            'id_user_apoteker' =>  8,
            'diagnosa' =>  'Infection' 
        ]);
    }
}

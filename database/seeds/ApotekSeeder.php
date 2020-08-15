<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApotekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apotek')->insert([
            'nama' => 'Apotek Cahaya Bunda',
            'alamat' => 'Jalan Riau, Bandung',
            'nomor_izin' => '99999999'
        ]);
    }
}

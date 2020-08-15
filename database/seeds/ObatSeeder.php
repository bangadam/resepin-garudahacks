<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obat')->insert([
            'nama' => 'amoxyxylin'
        ]);

        DB::table('obat')->insert([
            'nama' => 'bodrex'
        ]);

        DB::table('obat')->insert([
            'nama' => 'xanax'
        ]);

        DB::table('obat')->insert([
            'nama' => 'paracetemol'
        ]);

        DB::table('obat')->insert([
            'nama' => 'aspirin'
        ]);

        DB::table('obat')->insert([
            'nama' => 'beta-blocker'
        ]);

        DB::table('obat')->insert([
            'nama' => 'penicillin'
        ]);

        DB::table('obat')->insert([
            'nama' => 'salbutamol'
        ]);
    }
}

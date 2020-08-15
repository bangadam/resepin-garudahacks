<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep_detail')->insert([
            'id_resep' => 1,
            'id_obat' => 4,
            'kuantitas' => 10,
            'satuan' => 'tablets',
            'periode' => 0,
            'dalam_sehari' => 4,
            'dalam_sekali' => 1,
            'boleh_berulang' => false,
        ]);

        DB::table('resep_detail')->insert([
            'id_resep' => 2,
            'id_obat' => 5,
            'kuantitas' => 56,
            'satuan' => 'tablets',
            'periode' => 14,
            'dalam_sehari' => 1,
            'dalam_sekali' => 4,
            'boleh_berulang' => true,
        ]);

        DB::table('resep_detail')->insert([
            'id_resep' => 3,
            'id_obat' => 6,
            'kuantitas' => 280,
            'satuan' => 'tablets',
            'periode' => 70,
            'dalam_sehari' => 1,
            'dalam_sekali' => 4,
            'boleh_berulang' => false,
        ]);

        DB::table('resep_detail')->insert([
            'id_resep' => 4,
            'id_obat' => 7,
            'kuantitas' => 20,
            'satuan' => 'tablets',
            'periode' => 5,
            'dalam_sehari' => 4,
            'dalam_sekali' => 1,
            'boleh_berulang' => false,
        ]);

        DB::table('resep_detail')->insert([
            'id_resep' => 5,
            'id_obat' => 8,
            'kuantitas' => 28,
            'satuan' => 'tablets',
            'periode' => 0,
            'dalam_sehari' => 3,
            'dalam_sekali' => 2,
            'boleh_berulang' => false,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('redips')->insert([
            'codigo' => 'NA',
            'nombre' => 'SIN INFORMACIÓN',
            'user_id' => 1,
            'deleted_at' => '2024-01-01 00:00:00',
        ]);
        DB::table('redips')->insert([
            'codigo' => 'CA',
            'nombre' => 'CAPITAL',
            'user_id' => 1,
        ]); // 2
        DB::table('redips')->insert([
            'codigo' => 'CE',
            'nombre' => 'CENTRAL',
            'user_id' => 1,
        ]); // 3
        DB::table('redips')->insert([
            'codigo' => 'GU',
            'nombre' => 'GUAYANA',
            'user_id' => 1,
        ]); // 4
        DB::table('redips')->insert([
            'codigo' => 'LA',
            'nombre' => 'LOS ANDES',
            'user_id' => 1,
        ]); // 5
        DB::table('redips')->insert([
            'codigo' => 'LL',
            'nombre' => 'LOS LLANOS',
            'user_id' => 1,
        ]); // 6
        DB::table('redips')->insert([
            'codigo' => 'OC',
            'nombre' => 'OCCIDENTAL',
            'user_id' => 1,
        ]); // 7
        DB::table('redips')->insert([
            'codigo' => 'OR',
            'nombre' => 'ORIENTAL',
            'user_id' => 1,
        ]); // 8
    }
}

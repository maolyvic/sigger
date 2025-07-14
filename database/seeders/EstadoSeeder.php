<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            'codigo' => 'OT',
            'nombre' => 'SIN INFORMACIÓN',
            'redip_id' => 1,
            'user_id' => 1,
            'deleted_at' => '2024-01-01 00:00:00',
        ]);
        DB::table('estados')->insert([
            'codigo' => 'AM',
            'nombre' => 'AMAZONAS',
            'redip_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'AN',
            'nombre' => 'ANZOATEGUI',
            'redip_id' => 8,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'AP',
            'nombre' => 'APURE',
            'redip_id' => 6,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'AR',
            'nombre' => 'ARAGUA',
            'redip_id' => 3,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'BA',
            'nombre' => 'BARINAS',
            'redip_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'BO',
            'nombre' => 'BOLIVAR',
            'redip_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'CA',
            'nombre' => 'CARABOBO',
            'redip_id' => 3,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'CO',
            'nombre' => 'COJEDES',
            'redip_id' => 3,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'DA',
            'nombre' => 'DELTA AMACURO',
            'redip_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'DC',
            'nombre' => 'DISTRITO CAPITAL',
            'redip_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'FA',
            'nombre' => 'FALCON',
            'redip_id' => 7,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'GU',
            'nombre' => 'GUARICO',
            'redip_id' => 6,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'LA',
            'nombre' => 'LARA',
            'redip_id' => 7,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'LG',
            'nombre' => 'LA GUAIRA',
            'redip_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'ME',
            'nombre' => 'MERIDA',
            'redip_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'MI',
            'nombre' => 'MIRANDA',
            'redip_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'MO',
            'nombre' => 'MONAGAS',
            'redip_id' => 8,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'NE',
            'nombre' => 'NUEVA ESPARTA',
            'redip_id' => 8,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'PO',
            'nombre' => 'PORTUGUESA',
            'redip_id' => 6,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'SU',
            'nombre' => 'SUCRE',
            'redip_id' => 8,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'TA',
            'nombre' => 'TACHIRA',
            'redip_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'TR',
            'nombre' => 'TRUJILLO',
            'redip_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'YA',
            'nombre' => 'YARACUY',
            'redip_id' => 6,
            'user_id' => 1,
        ]);
        DB::table('estados')->insert([
            'codigo' => 'ZU',
            'nombre' => 'ZULIA',
            'redip_id' => 7,
            'user_id' => 1,
        ]);
    }
}

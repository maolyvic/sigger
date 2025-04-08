<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@sigger.com',
            'password' => Hash::make('Admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Supervisor',
            'email' => 'supervisor@sigger.com',
            'password' => Hash::make('supervisor123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Analista Avanzado',
            'email' => 'analistaa@sigger.com',
            'password' => Hash::make('analistaa123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Analista Basico',
            'email' => 'analistab@sigger.com',
            'password' => Hash::make('analistab123'),
        ]);
    }
}
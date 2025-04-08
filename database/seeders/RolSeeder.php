<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=> 'Admin']);
        $supervisor = Role::create(['name'=> 'Supervisor']);
        $analistaa = Role::create(['name'=> 'Analista Avanzado']);
        $analistab = Role::create(['name'=> 'Analista Basico']);

        Permission::create(['name' => 'home'])->syncRoles([$admin, $supervisor, $analistaa, $analistab]);

        Permission::create(['name' => 'usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'roles.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'transito.index'])->syncRoles([$admin,$analistab,$analistaa]);
        Permission::create(['name' => 'transito.create'])->syncRoles([$admin,$analistab,$analistaa]);
        Permission::create(['name' => 'transito.edit'])->syncRoles([$admin, $analistab,$analistaa]);
        Permission::create(['name' => 'transito.destroy'])->syncRoles([$admin,$analistaa]);

        Permission::create(['name' => 'notransito.index'])->syncRoles([$admin,$analistab,$analistaa]);
        Permission::create(['name' => 'notransito.create'])->syncRoles([$admin, $analistaa, $analistab,]);
        Permission::create(['name' => 'notransito.edit'])->syncRoles([$admin, $analistab,$analistaa]);
        Permission::create(['name' => 'notransito.destroy'])->syncRoles([$admin,$analistaa]);

        Permission::create(['name' => 'invivo.index'])->syncRoles([$admin,$analistab, $analistaa]);
        Permission::create(['name' => 'invivo.create'])->syncRoles([$admin,$analistab, $analistaa]);
        Permission::create(['name' => 'invivo.edit'])->syncRoles([$admin, $analistab, $analistaa]);
        Permission::create(['name' => 'invivo.destroy'])->syncRoles([$admin, $analistaa]);

        Permission::create(['name' => 'postmortem.index'])->syncRoles([$admin,$analistab, $analistaa]);
        Permission::create(['name' => 'postmortem.create'])->syncRoles([$admin,$analistab, $analistaa]);
        Permission::create(['name' => 'postmortem.edit'])->syncRoles([$admin, $analistab, $analistaa]);
        Permission::create(['name' => 'postmortem.destroy'])->syncRoles([$admin, $analistaa]);

        Permission::create(['name' => 'reportes.index'])->syncRoles([$admin, $supervisor, $analistaa]);
        Permission::create(['name' => 'reportes.generate'])->syncRoles([$admin, $supervisor, $analistaa]);

    }
}

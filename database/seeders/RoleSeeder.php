<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CREANDO ROLES DE USUARIO
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Doctor']);
        
        // CREANDO PERMISOS
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]); // admin y doctor podran ver el dashboard

        // Solo el admin podrá administrar los usuarios
        Permission::create(['name' => 'admin.users.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.update'])->assignRole([$role1]);
        
        // Solo el admin podrá administrar las categorias
        Permission::create(['name' => 'admin.categories.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole([$role1]);

        // Solo el admin podrá administrar las proveedores
        Permission::create(['name' => 'admin.proveedores.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.destroy'])->assignRole([$role1]);

        // Solo el admin podrá administrar las productos
        Permission::create(['name' => 'admin.products.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.products.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.products.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.products.destroy'])->assignRole([$role1]);

        // El admin y el doctor podrán administrar los pacientes
        Permission::create(['name' => 'admin.patient.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.destroy'])->syncRoles([$role1,$role2]);
    }
}

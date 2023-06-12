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
        // Creando roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Doctor']);
        
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        // Creando permisos para el admin
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.products.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.patient.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patient.destroy'])->syncRoles([$role1,$role2]);
    }
}

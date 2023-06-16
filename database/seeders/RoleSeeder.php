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
        Permission::create(['name' => 'admin.home', 'description'=>'Ver el dashboard'])->syncRoles([$role1,$role2]); // admin y doctor podran ver el dashboard

        // Solo el admin podrá administrar los usuarios
        Permission::create(['name' => 'admin.users.index', 'description'=>'Ver lista de usuarios'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description'=>'Asignar un rol'])->assignRole([$role1]);

        // Solo el admin podrá administrar los roles
        Permission::create(['name' => 'admin.roles.index', 'description'=>'Ver lista de roles'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description'=>'Crear un nuevo rol'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description'=>'Editar rol'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description'=>'Ver lista de usuarios'])->assignRole([$role1]);
        
        // Solo el admin podrá administrar las categorias
        Permission::create(['name' => 'admin.categories.index', 'description'=>'Ver lista de categorias'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.create', 'description'=>'Crear nueva categoria'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description'=>'Editar categorias'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description'=>'Eliminar categoria'])->assignRole([$role1]);

        // Solo el admin podrá administrar las proveedores
        Permission::create(['name' => 'admin.proveedores.index', 'description'=>'Ver lista de proveedores'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.create', 'description'=>'Crear nuevo proveedor'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.edit', 'description'=>'Editar proveedor'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.proveedores.destroy', 'description'=>'Eliminar proveedor'])->assignRole([$role1]);

        // Solo el admin podrá administrar las productos
        Permission::create(['name' => 'admin.products.index', 'description'=>'Ver lista de productos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.products.create', 'description'=>'Crear nuevo producto'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.products.edit', 'description'=>'Editar producto'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.products.destroy', 'description'=>'Eliminar producto'])->assignRole([$role1]);

        // El admin y el doctor podrán administrar los pacientes
        Permission::create(['name' => 'admin.patients.index', 'description'=>'Ver lista de pacientes'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patients.create', 'description'=>'Crear nuevo paciente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patients.edit', 'description'=>'Editar paciente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.patients.destroy', 'description'=>'Eliminar paciente'])->syncRoles([$role1,$role2]);

        // El admin y el doctor podrán administrar los tratamientos
        Permission::create(['name' => 'admin.treatments.index', 'description'=>'Ver lista de tratamientos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.treatments.create', 'description'=>'Crear nuevo tratamiento'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.treatments.edit', 'description'=>'Editar tratamiento'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.treatments.destroy', 'description'=>'Eliminar tratamiento'])->syncRoles([$role1,$role2]);
    }
}

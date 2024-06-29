<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Roles
        $superAdmin = Role::create(['name' => 'SuperAdministrador']);
        $admin = Role::create(['name' => 'Administrador']);
        $volunteer = Role::create(['name' => 'Voluntario']);
        $person = Role::create(['name' => 'Persona']);

        // Permisos para Albergues
        Permission::create(['name' => 'albergues.index', 'description' => 'Ver albergues'])->assignRole($superAdmin);
        Permission::create(['name' => 'albergues.create', 'description' => 'Crear albergues'])->assignRole($superAdmin);
        Permission::create(['name' => 'albergues.edit', 'description' => 'Modificar albergues'])->assignRole($superAdmin);
        Permission::create(['name' => 'albergues.destroy', 'description' => 'Eliminar albergues'])->assignRole($superAdmin);

        // Permisos para Animales
        Permission::create(['name' => 'animals.index', 'description' => 'Ver animales'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'animals.create', 'description' => 'Crear animales'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'animals.edit', 'description' => 'Modificar animales'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'animals.destroy', 'description' => 'Eliminar animales'])->syncRoles([$superAdmin, $admin, $volunteer]);

        // Permisos para Adopciones
        Permission::create(['name' => 'adoptions.index', 'description' => 'Ver adopciones'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'adoptions.create', 'description' => 'Crear adopciones'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'adoptions.edit', 'description' => 'Modificar adopciones'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'adoptions.destroy', 'description' => 'Eliminar adopciones'])->syncRoles([$superAdmin, $admin]);

        // Permisos para Donaciones
        Permission::create(['name' => 'donations.index', 'description' => 'Ver donaciones'])->syncRoles([$superAdmin, $admin, $person]);
        Permission::create(['name' => 'donations.create', 'description' => 'Crear donaciones'])->syncRoles([$superAdmin, $admin, $person]);
        Permission::create(['name' => 'donations.edit', 'description' => 'Modificar donaciones'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'donations.destroy', 'description' => 'Eliminar donaciones'])->syncRoles([$superAdmin, $admin]);

        // Permisos para Insumos
        Permission::create(['name' => 'insumos.index', 'description' => 'Ver insumos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'insumos.create', 'description' => 'Crear insumos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'insumos.edit', 'description' => 'Modificar insumos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'insumos.destroy', 'description' => 'Eliminar insumos'])->syncRoles([$superAdmin, $admin, $volunteer]);

        // Permisos para Seguimientos
        Permission::create(['name' => 'seguimientos.index', 'description' => 'Ver seguimientos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'seguimientos.create', 'description' => 'Crear seguimientos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'seguimientos.edit', 'description' => 'Modificar seguimientos'])->syncRoles([$superAdmin, $admin, $volunteer]);
        Permission::create(['name' => 'seguimientos.destroy', 'description' => 'Eliminar seguimientos'])->syncRoles([$superAdmin, $admin, $volunteer]);

        // Permisos para Solicitudes de Adopción
        Permission::create(['name' => 'solicitudes.index', 'description' => 'Ver solicitudes de adopción'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'solicitudes.create', 'description' => 'Crear solicitudes de adopción'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'solicitudes.edit', 'description' => 'Modificar solicitudes de adopción'])->syncRoles([$superAdmin, $admin]);
        Permission::create(['name' => 'solicitudes.destroy', 'description' => 'Eliminar solicitudes de adopción'])->syncRoles([$superAdmin, $admin]);

        // Permisos para Roles de Usuario
        Permission::create(['name' => 'roles.index', 'description' => 'Ver roles de usuario'])->assignRole($superAdmin);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles de usuario'])->assignRole($superAdmin);
        Permission::create(['name' => 'roles.edit', 'description' => 'Modificar roles de usuario'])->assignRole($superAdmin);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles de usuario'])->assignRole($superAdmin);
    }
}

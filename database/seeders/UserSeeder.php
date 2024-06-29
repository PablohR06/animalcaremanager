<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear SuperAdministrador
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'apellido' => 'Admin',
            'telefono' => '1234567890',
            'direccion' => 'Super Admin Address',
            'codigo_postal' => '00000',
            'email' => 'superadmin@example.com',
            'nombre_usuario' => 'superadmin',
            'password' => Hash::make('password'),
            'albergue_id' => null, // No asignar albergue
        ]);
        $superAdmin->assignRole('SuperAdministrador');

        // Crear Administradores
        $admin1 = User::create([
            'name' => 'Admin1',
            'apellido' => 'User1',
            'telefono' => '432142332',
            'direccion' => 'Admin Address 1',
            'codigo_postal' => '00001',
            'email' => 'admin1@example.com',
            'nombre_usuario' => 'admin1',
            'password' => Hash::make('password'),
            'albergue_id' => 1, // Se asignará en el AlbergueSeeder
        ]);
        $admin1->assignRole('Administrador');

        $admin2 = User::create([
            'name' => 'Admin2',
            'apellido' => 'User2',
            'telefono' => '432142332',
            'direccion' => 'Admin Address 2',
            'codigo_postal' => '00002',
            'email' => 'admin2@example.com',
            'nombre_usuario' => 'admin2',
            'password' => Hash::make('password'),
            'albergue_id' => 2, // Se asignará en el AlbergueSeeder
        ]);
        $admin2->assignRole('Administrador');

        // Crear Voluntarios y Personas
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Volunteer{$i}Albergue1",
                'apellido' => "VolLast{$i}",
                'telefono' => "12345678{$i}",
                'direccion' => "Volunteer Address {$i}",
                'codigo_postal' => "1111{$i}",
                'email' => "volunteer{$i}a1@example.com",
                'nombre_usuario' => "volunteer{$i}a1",
                'password' => Hash::make('password'),
                'albergue_id' => 1,
            ])->assignRole('Voluntario');

            User::create([
                'name' => "Volunteer{$i}Albergue2",
                'apellido' => "VolLast{$i}",
                'telefono' => "12345678{$i}",
                'direccion' => "Volunteer Address {$i}",
                'codigo_postal' => "2222{$i}",
                'email' => "volunteer{$i}a2@example.com",
                'nombre_usuario' => "volunteer{$i}a2",
                'password' => Hash::make('password'),
                'albergue_id' => 2,
            ])->assignRole('Voluntario');

            User::create([
                'name' => "Person{$i}Albergue1",
                'apellido' => "PerLast{$i}",
                'telefono' => "87654321{$i}",
                'direccion' => "Person Address {$i}",
                'codigo_postal' => "3333{$i}",
                'email' => "person{$i}a1@example.com",
                'nombre_usuario' => "person{$i}a1",
                'password' => Hash::make('password'),
                'albergue_id' => 1,
            ])->assignRole('Persona');

            User::create([
                'name' => "Person{$i}Albergue2",
                'apellido' => "PerLast{$i}",
                'telefono' => "87654321{$i}",
                'direccion' => "Person Address {$i}",
                'codigo_postal' => "4444{$i}",
                'email' => "person{$i}a2@example.com",
                'nombre_usuario' => "person{$i}a2",
                'password' => Hash::make('password'),
                'albergue_id' => 2,
            ])->assignRole('Persona');
        }
    }
}

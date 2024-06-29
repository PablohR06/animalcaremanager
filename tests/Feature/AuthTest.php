<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Albergue;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\RoleSeeder::class);

        $this->createUsersAndAlbergues();
    }

    private function createUsersAndAlbergues()
    {
        // Crear roles si no existen
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdministrador']);
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $volunteerRole = Role::firstOrCreate(['name' => 'Voluntario']);
        $personRole = Role::firstOrCreate(['name' => 'Persona']);

        // Crear usuarios
        $superAdmin = User::firstOrCreate([
            'email' => 'superadmin@example.com'
        ], [
            'name' => 'Super Admin',
            'apellido' => 'Admin',
            'telefono' => '1234567890',
            'direccion' => 'Super Admin Address',
            'codigo_postal' => '00000',
            'nombre_usuario' => 'superadmin',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole($superAdminRole);

        $admin1 = User::firstOrCreate([
            'email' => 'admin1@example.com'
        ], [
            'name' => 'Admin1',
            'apellido' => 'User1',
            'telefono' => '432142332',
            'direccion' => 'Admin Address 1',
            'codigo_postal' => '00001',
            'nombre_usuario' => 'admin1',
            'password' => Hash::make('password'),
        ]);
        $admin1->assignRole($adminRole);

        $admin2 = User::firstOrCreate([
            'email' => 'admin2@example.com'
        ], [
            'name' => 'Admin2',
            'apellido' => 'User2',
            'telefono' => '432142332',
            'direccion' => 'Admin Address 2',
            'codigo_postal' => '00002',
            'nombre_usuario' => 'admin2',
            'password' => Hash::make('password'),
        ]);
        $admin2->assignRole($adminRole);

        // Crear albergues
        $albergue1 = Albergue::firstOrCreate([
            'nombre' => 'Albergue 1',
            'direccion' => 'Direccion Albergue 1',
            'capacidad' => 50,
            'telefono' => '123456789',
            'ciudad' => 'Ciudad 1',
            'encargado_id' => $admin1->id,
        ]);

        $albergue2 = Albergue::firstOrCreate([
            'nombre' => 'Albergue 2',
            'direccion' => 'Direccion Albergue 2',
            'capacidad' => 50,
            'telefono' => '123456789',
            'ciudad' => 'Ciudad 2',
            'encargado_id' => $admin2->id,
        ]);

        for ($i = 1; $i <= 10; $i++) {
            $volunteer1 = User::firstOrCreate([
                'email' => "volunteer{$i}a1@example.com"
            ], [
                'name' => "Volunteer{$i}Albergue1",
                'apellido' => "VolLast{$i}",
                'telefono' => "12345678{$i}",
                'direccion' => "Volunteer Address {$i}",
                'codigo_postal' => "1111{$i}",
                'nombre_usuario' => "volunteer{$i}a1",
                'password' => Hash::make('password'),
                'albergue_id' => $albergue1->id,
            ]);
            $volunteer1->assignRole($volunteerRole);

            $volunteer2 = User::firstOrCreate([
                'email' => "volunteer{$i}a2@example.com"
            ], [
                'name' => "Volunteer{$i}Albergue2",
                'apellido' => "VolLast{$i}",
                'telefono' => "12345678{$i}",
                'direccion' => "Volunteer Address {$i}",
                'codigo_postal' => "2222{$i}",
                'nombre_usuario' => "volunteer{$i}a2",
                'password' => Hash::make('password'),
                'albergue_id' => $albergue2->id,
            ]);
            $volunteer2->assignRole($volunteerRole);

            $person1 = User::firstOrCreate([
                'email' => "person{$i}a1@example.com"
            ], [
                'name' => "Person{$i}Albergue1",
                'apellido' => "PerLast{$i}",
                'telefono' => "87654321{$i}",
                'direccion' => "Person Address {$i}",
                'codigo_postal' => "3333{$i}",
                'nombre_usuario' => "person{$i}a1",
                'password' => Hash::make('password'),
                'albergue_id' => $albergue1->id,
            ]);
            $person1->assignRole($personRole);

            $person2 = User::firstOrCreate([
                'email' => "person{$i}a2@example.com"
            ], [
                'name' => "Person{$i}Albergue2",
                'apellido' => "PerLast{$i}",
                'telefono' => "87654321{$i}",
                'direccion' => "Person Address {$i}",
                'codigo_postal' => "4444{$i}",
                'nombre_usuario' => "person{$i}a2",
                'password' => Hash::make('password'),
                'albergue_id' => $albergue2->id,
            ]);
            $person2->assignRole($personRole);
        }
    }

    public function test_superadmin_can_login()
    {
        $user = User::where('email', 'superadmin@example.com')->first();

        $response = $this->post('/login', [
            'email' => 'superadmin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_can_login()
    {
        $user = User::where('email', 'admin1@example.com')->first();

        $response = $this->post('/login', [
            'email' => 'admin1@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_volunteer_can_login()
    {
        $user = User::where('email', 'volunteer1a1@example.com')->first();

        $response = $this->post('/login', [
            'email' => 'volunteer1a1@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_person_can_login()
    {
        $user = User::where('email', 'person1a1@example.com')->first();

        $response = $this->post('/login', [
            'email' => 'person1a1@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_page_is_accessible()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_register_page_is_accessible()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_redirect_after_login_for_superadmin()
    {
        $user = User::where('email', 'superadmin@example.com')->first();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_redirect_after_login_for_admin()
    {
        $user = User::where('email', 'admin1@example.com')->first();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_redirect_after_login_for_volunteer()
    {
        $user = User::where('email', 'volunteer1a1@example.com')->first();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_redirect_after_login_for_person()
    {
        $user = User::where('email', 'person1a1@example.com')->first();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }
}

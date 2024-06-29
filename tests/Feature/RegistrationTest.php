<?php

namespace Tests\Feature;

use App\Models\Albergue;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Laravel\Jetstream\Jetstream;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\AlbergueSeeder::class);
    }

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_new_users_can_register()
    {
        $albergue = Albergue::first();

        $response = $this->post('/register', [
            'name' => 'Test User',
            'apellido' => 'User',
            'telefono' => '123456789',
            'direccion' => 'Test Address',
            'codigo_postal' => '12345',
            'email' => 'test@example.com',
            'nombre_usuario' => 'testuser',
            'password' => 'password',
            'password_confirmation' => 'password',
            'albergue_id' => $albergue->id,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $user = User::where('email', 'test@example.com')->first();
        $this->assertNotNull($user, 'User was not created in the database.');
        $this->assertTrue($user->hasRole('Persona'), 'User does not have the Persona role.');

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/dashboard');
    }
}

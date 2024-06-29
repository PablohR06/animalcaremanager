<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SolicitudAdopcion;
use App\Models\User;
use App\Models\Animal;

class SolicitudAdopcionSeeder extends Seeder
{
    public function run()
    {
        $usuarios = User::role('Persona')->get();
        $animales = Animal::all();

        foreach ($usuarios as $usuario) {
            foreach ($animales as $animal) {
                if ($usuario->albergue_id === $animal->albergue_id) {
                    SolicitudAdopcion::factory()->create([
                        'usuario_id' => $usuario->id,
                        'animal_id' => $animal->id,
                        'estado' => 'Pendiente',
                    ]);
                }
            }
        }
    }
}

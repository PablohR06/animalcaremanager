<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seguimiento;
use App\Models\Adopcion;
use App\Models\User;
use App\Models\Animal;

class SeguimientoSeeder extends Seeder
{
    public function run()
    {
        $voluntarios = User::role('Voluntario')->get();
        $adopciones = Adopcion::all();

        foreach ($adopciones as $adopcion) {
            $voluntario = $voluntarios->random();
            for ($i = 0; $i < 2; $i++) {
                Seguimiento::factory()->create([
                    'adopcion_id' => $adopcion->id,
                    'animal_id' => $adopcion->animal_id,
                    'usuario_id' => $voluntario->id,
                ]);
            }
        }
    }
}

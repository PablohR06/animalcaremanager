<?php

// database/seeders/AdopcionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adopcion;
use App\Models\User;
use App\Models\Animal;
use App\Models\SolicitudAdopcion;

class AdopcionSeeder extends Seeder
{
    public function run()
    {
        $voluntarios = User::role('Voluntario')->get();
        $animales = Animal::all();

        foreach ($voluntarios as $voluntario) {
            $animal = $animales->random();

            // Crear una solicitud de adopción aprobada
            $solicitud = SolicitudAdopcion::create([
                'usuario_id' => $voluntario->id,
                'animal_id' => $animal->id,
                'estado' => 'Aprobada',
            ]);

            // Crear la adopción
            Adopcion::create([
                'animal_id' => $animal->id,
                'usuario_id' => $voluntario->id,
                'fecha_adopcion' => now(),
                'estado_animal' => 'Adoptado',
                'comentario' => 'Adopción exitosa',
            ]);

            // Actualizar el estado del animal a 'Adoptado'
            $animal->update(['estadoanimal' => 'Adoptado']);
        }
    }
}

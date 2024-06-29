<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donacion;
use App\Models\User;
use App\Models\Albergue;

class DonacionSeeder extends Seeder
{
    public function run()
    {
        $albergues = Albergue::all();

        foreach ($albergues as $albergue) {
            $personas = User::role('Persona')->get();

            foreach ($personas as $persona) {
                Donacion::factory()->count(5)->create([
                    'albergue_id' => $albergue->id,
                    'usuario_id' => $persona->id,
                ]);
            }
        }
    }
}

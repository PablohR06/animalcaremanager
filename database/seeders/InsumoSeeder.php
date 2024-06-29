<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Insumo;
use App\Models\User;
use App\Models\Albergue;

class InsumoSeeder extends Seeder
{
    public function run()
    {
        $albergues = Albergue::all();

        foreach ($albergues as $albergue) {
            // Insumos para Administrador
            $admin = User::role('Administrador')->where('albergue_id', $albergue->id)->first();
            if ($admin) {
                Insumo::factory()->count(20)->create([
                    'albergue_id' => $albergue->id,
                ]);
            }

            // Insumos para Voluntario
            $volunteers = User::role('Voluntario')->where('albergue_id', $albergue->id)->get();
            foreach ($volunteers as $volunteer) {
                Insumo::factory()->count(10)->create([
                    'albergue_id' => $albergue->id,
                ]);
            }
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Animal;
use App\Models\Adopcion;
use App\Models\Donacion;
use App\Models\Seguimiento;

class ShowStatistics extends Component
{
    public function render()
    {
        $totalAnimales = Animal::count();
        $totalAdopciones = Adopcion::count();
        $totalDonaciones = Donacion::sum('monto');
        $totalSeguimientos = Seguimiento::count();

        return view('livewire.show-statistics', compact('totalAnimales', 'totalAdopciones', 'totalDonaciones', 'totalSeguimientos'));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Seguimiento;
use App\Models\Adopcion;
use App\Models\Animal;

class Seguimientos extends Component
{
    public $seguimientos;
    public $estado_seguimiento;
    public $observaciones;
    public $fecha;
    public $adopcion_id;
    public $animal_id;
    public $selectedSeguimientoId = null;
    public $adopciones;
    public $animales;

    public function mount()
    {
        $this->seguimientos = Seguimiento::all();
        $this->adopciones = Adopcion::all();
        $this->animales = Animal::all();
    }

    public function resetInputFields()
    {
        $this->estado_seguimiento = '';
        $this->observaciones = '';
        $this->fecha = '';
        $this->adopcion_id = '';
        $this->animal_id = '';
        $this->selectedSeguimientoId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'estado_seguimiento' => 'required',
            'observaciones' => 'nullable',
            'fecha' => 'required|date',
            'adopcion_id' => 'required|exists:adopciones,id',
            'animal_id' => 'required|exists:animals,id',
        ]);

        Seguimiento::create($validatedData);

        session()->flash('message', 'Seguimiento creado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        $this->selectedSeguimientoId = $seguimiento->id;
        $this->estado_seguimiento = $seguimiento->estado_seguimiento;
        $this->observaciones = $seguimiento->observaciones;
        $this->fecha = $seguimiento->fecha;
        $this->adopcion_id = $seguimiento->adopcion_id;
        $this->animal_id = $seguimiento->animal_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'estado_seguimiento' => 'required',
            'observaciones' => 'nullable',
            'fecha' => 'required|date',
            'adopcion_id' => 'required|exists:adopciones,id',
            'animal_id' => 'required|exists:animals,id',
        ]);

        $seguimiento = Seguimiento::findOrFail($this->selectedSeguimientoId);
        $seguimiento->update($validatedData);

        session()->flash('message', 'Seguimiento actualizado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Seguimiento::findOrFail($id)->delete();
        session()->flash('message', 'Seguimiento eliminado correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.seguimientos');
    }
}

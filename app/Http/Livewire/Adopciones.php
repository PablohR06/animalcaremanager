<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adopcion;
use App\Models\Animal;
use App\Models\User;

class Adopciones extends Component
{
    public $adopciones;
    public $fecha_adopcion;
    public $estado_animal;
    public $comentario;
    public $animal_id;
    public $usuario_id;
    public $selectedAdopcionId = null;
    public $animales;
    public $usuarios;

    public function mount()
    {
        $this->adopciones = Adopcion::all();
        $this->animales = Animal::all();
        $this->usuarios = User::role('Persona')->get();
    }

    public function resetInputFields()
    {
        $this->fecha_adopcion = '';
        $this->estado_animal = '';
        $this->comentario = '';
        $this->animal_id = '';
        $this->usuario_id = '';
        $this->selectedAdopcionId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'fecha_adopcion' => 'required|date',
            'estado_animal' => 'required',
            'comentario' => 'nullable',
            'animal_id' => 'required|exists:animals,id',
            'usuario_id' => 'required|exists:users,id',
        ]);

        Adopcion::create($validatedData);

        session()->flash('message', 'Adopción creada correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $this->selectedAdopcionId = $adopcion->id;
        $this->fecha_adopcion = $adopcion->fecha_adopcion;
        $this->estado_animal = $adopcion->estado_animal;
        $this->comentario = $adopcion->comentario;
        $this->animal_id = $adopcion->animal_id;
        $this->usuario_id = $adopcion->usuario_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'fecha_adopcion' => 'required|date',
            'estado_animal' => 'required',
            'comentario' => 'nullable',
            'animal_id' => 'required|exists:animals,id',
            'usuario_id' => 'required|exists:users,id',
        ]);

        $adopcion = Adopcion::findOrFail($this->selectedAdopcionId);
        $adopcion->update($validatedData);

        session()->flash('message', 'Adopción actualizada correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Adopcion::findOrFail($id)->delete();
        session()->flash('message', 'Adopción eliminada correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.adopciones');
    }
}

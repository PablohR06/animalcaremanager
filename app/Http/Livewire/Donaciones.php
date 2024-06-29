<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donacion;
use App\Models\Albergue;
use App\Models\User;

class Donaciones extends Component
{
    public $donaciones;
    public $monto;
    public $fecha;
    public $albergue_id;
    public $usuario_id;
    public $selectedDonacionId = null;
    public $albergues;
    public $usuarios;

    public function mount()
    {
        $this->donaciones = Donacion::all();
        $this->albergues = Albergue::all();
        $this->usuarios = User::role('Persona')->get();
    }

    public function resetInputFields()
    {
        $this->monto = '';
        $this->fecha = '';
        $this->albergue_id = '';
        $this->usuario_id = '';
        $this->selectedDonacionId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'albergue_id' => 'required|exists:albergues,id',
            'usuario_id' => 'required|exists:users,id',
        ]);

        Donacion::create($validatedData);

        session()->flash('message', 'Donación creada correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $donacion = Donacion::findOrFail($id);
        $this->selectedDonacionId = $donacion->id;
        $this->monto = $donacion->monto;
        $this->fecha = $donacion->fecha;
        $this->albergue_id = $donacion->albergue_id;
        $this->usuario_id = $donacion->usuario_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'albergue_id' => 'required|exists:albergues,id',
            'usuario_id' => 'required|exists:users,id',
        ]);

        $donacion = Donacion::findOrFail($this->selectedDonacionId);
        $donacion->update($validatedData);

        session()->flash('message', 'Donación actualizada correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Donacion::findOrFail($id)->delete();
        session()->flash('message', 'Donación eliminada correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.donaciones');
    }
}

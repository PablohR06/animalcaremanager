<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Albergue;
use App\Models\User;

class Albergues extends Component
{
    public $albergues;
    public $nombre;
    public $direccion;
    public $capacidad;
    public $ciudad;
    public $telefono;
    public $encargado_id;
    public $selectedAlbergueId = null;
    public $usuarios;

    public function mount()
    {
        $this->albergues = Albergue::all();
        $this->usuarios = User::role('Administrador')->get();
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->direccion = '';
        $this->capacidad = '';
        $this->ciudad = '';
        $this->telefono = '';
        $this->encargado_id = '';
        $this->selectedAlbergueId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'capacidad' => 'required|integer',
            'ciudad' => 'required',
            'telefono' => 'required',
            'encargado_id' => 'nullable|exists:users,id',
        ]);

        Albergue::create($validatedData);

        session()->flash('message', 'Albergue creado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $albergue = Albergue::findOrFail($id);
        $this->selectedAlbergueId = $albergue->id;
        $this->nombre = $albergue->nombre;
        $this->direccion = $albergue->direccion;
        $this->capacidad = $albergue->capacidad;
        $this->ciudad = $albergue->ciudad;
        $this->telefono = $albergue->telefono;
        $this->encargado_id = $albergue->encargado_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'capacidad' => 'required|integer',
            'ciudad' => 'required',
            'telefono' => 'required',
            'encargado_id' => 'nullable|exists:users,id',
        ]);

        $albergue = Albergue::findOrFail($this->selectedAlbergueId);
        $albergue->update($validatedData);

        session()->flash('message', 'Albergue actualizado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Albergue::findOrFail($id)->delete();
        session()->flash('message', 'Albergue eliminado correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.albergues');
    }
}

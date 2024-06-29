<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Insumo;
use App\Models\Albergue;

class Insumos extends Component
{
    public $insumos;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $fecha_ingreso;
    public $albergue_id;
    public $selectedInsumoId = null;
    public $albergues;

    public function mount()
    {
        $this->insumos = Insumo::all();
        $this->albergues = Albergue::all();
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->cantidad = '';
        $this->fecha_ingreso = '';
        $this->albergue_id = '';
        $this->selectedInsumoId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer',
            'fecha_ingreso' => 'required|date',
            'albergue_id' => 'required|exists:albergues,id',
        ]);

        Insumo::create($validatedData);

        session()->flash('message', 'Insumo creado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        $this->selectedInsumoId = $insumo->id;
        $this->nombre = $insumo->nombre;
        $this->descripcion = $insumo->descripcion;
        $this->cantidad = $insumo->cantidad;
        $this->fecha_ingreso = $insumo->fecha_ingreso;
        $this->albergue_id = $insumo->albergue_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer',
            'fecha_ingreso' => 'required|date',
            'albergue_id' => 'required|exists:albergues,id',
        ]);

        $insumo = Insumo::findOrFail($this->selectedInsumoId);
        $insumo->update($validatedData);

        session()->flash('message', 'Insumo actualizado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Insumo::findOrFail($id)->delete();
        session()->flash('message', 'Insumo eliminado correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.insumos');
    }
}

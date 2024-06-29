<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Animal;
use App\Models\Albergue;

class Animales extends Component
{
    public $animales;
    public $nombre;
    public $sexo;
    public $tamano;
    public $foto;
    public $edad;
    public $comentario;
    public $estado_esterilizacion;
    public $estado_chip;
    public $estado_salud;
    public $estadoanimal;
    public $fecha_registro;
    public $especie;
    public $albergue_id;
    public $selectedAnimalId = null;
    public $albergues;

    public function mount()
    {
        $this->animales = Animal::all();
        $this->albergues = Albergue::all();
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->sexo = '';
        $this->tamano = '';
        $this->foto = '';
        $this->edad = '';
        $this->comentario = '';
        $this->estado_esterilizacion = '';
        $this->estado_chip = '';
        $this->estado_salud = '';
        $this->estadoanimal = '';
        $this->fecha_registro = '';
        $this->especie = '';
        $this->albergue_id = '';
        $this->selectedAnimalId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'tamano' => 'required',
            'foto' => 'required',
            'edad' => 'required',
            'comentario' => 'nullable',
            'estado_esterilizacion' => 'required|boolean',
            'estado_chip' => 'required|boolean',
            'estado_salud' => 'required',
            'estadoanimal' => 'required',
            'fecha_registro' => 'required|date',
            'especie' => 'required',
            'albergue_id' => 'required|exists:albergues,id',
        ]);

        Animal::create($validatedData);

        session()->flash('message', 'Animal creado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $this->selectedAnimalId = $animal->id;
        $this->nombre = $animal->nombre;
        $this->sexo = $animal->sexo;
        $this->tamano = $animal->tamano;
        $this->foto = $animal->foto;
        $this->edad = $animal->edad;
        $this->comentario = $animal->comentario;
        $this->estado_esterilizacion = $animal->estado_esterilizacion;
        $this->estado_chip = $animal->estado_chip;
        $this->estado_salud = $animal->estado_salud;
        $this->estadoanimal = $animal->estadoanimal;
        $this->fecha_registro = $animal->fecha_registro;
        $this->especie = $animal->especie;
        $this->albergue_id = $animal->albergue_id;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'tamano' => 'required',
            'foto' => 'required',
            'edad' => 'required',
            'comentario' => 'nullable',
            'estado_esterilizacion' => 'required|boolean',
            'estado_chip' => 'required|boolean',
            'estado_salud' => 'required',
            'estadoanimal' => 'required',
            'fecha_registro' => 'required|date',
            'especie' => 'required',
            'albergue_id' => 'required|exists:albergues,id',
        ]);

        $animal = Animal::findOrFail($this->selectedAnimalId);
        $animal->update($validatedData);

        session()->flash('message', 'Animal actualizado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        Animal::findOrFail($id)->delete();
        session()->flash('message', 'Animal eliminado correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.animales');
    }
}

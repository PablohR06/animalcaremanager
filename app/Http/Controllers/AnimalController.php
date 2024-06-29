<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Albergue;

class AnimalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador|Voluntario')->only(['index', 'show']);
        $this->middleware('role:SuperAdministrador|Administrador')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', compact('animales'));
    }

    public function create()
    {
        $albergues = Albergue::all();
        return view('animales.create', compact('albergues'));
    }

    public function store(Request $request)
    {
        $animal = Animal::create($request->all());
        return redirect()->route('animales.index')->with('info', 'Animal creado correctamente');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animales.show', compact('animal'));
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $albergues = Albergue::all();
        return view('animales.edit', compact('animal', 'albergues'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        return redirect()->route('animales.index')->with('info', 'Animal actualizado correctamente');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animales.index')->with('info', 'Animal eliminado correctamente');
    }
}

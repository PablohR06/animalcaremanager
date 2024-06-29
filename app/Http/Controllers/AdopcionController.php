<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopcion;
use App\Models\Animal;
use App\Models\User;

class AdopcionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador')->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $adopciones = Adopcion::all();
        return view('adopciones.index', compact('adopciones'));
    }

    public function create()
    {
        $animales = Animal::all();
        $usuarios = User::all();
        return view('adopciones.create', compact('animales', 'usuarios'));
    }

    public function store(Request $request)
    {
        $adopcion = Adopcion::create($request->all());
        return redirect()->route('adopciones.index')->with('info', 'Adopción registrada correctamente');
    }

    public function show($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        return view('adopciones.show', compact('adopcion'));
    }

    public function edit($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $animales = Animal::all();
        $usuarios = User::all();
        return view('adopciones.edit', compact('adopcion', 'animales', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->update($request->all());
        return redirect()->route('adopciones.index')->with('info', 'Adopción actualizada correctamente');
    }

    public function destroy($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->delete();
        return redirect()->route('adopciones.index')->with('info', 'Adopción eliminada correctamente');
    }
}

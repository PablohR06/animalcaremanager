<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donacion;
use App\Models\User;
use App\Models\Albergue;

class DonacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador|Persona')->only(['index', 'show', 'create', 'store']);
        $this->middleware('role:SuperAdministrador|Administrador')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $donaciones = Donacion::all();
        return view('donaciones.index', compact('donaciones'));
    }

    public function create()
    {
        $albergues = Albergue::all();
        $usuarios = User::all();
        return view('donaciones.create', compact('albergues', 'usuarios'));
    }

    public function store(Request $request)
    {
        $donacion = Donacion::create($request->all());
        return redirect()->route('donaciones.index')->with('info', 'Donación registrada correctamente');
    }

    public function show($id)
    {
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.show', compact('donacion'));
    }

    public function edit($id)
    {
        $donacion = Donacion::findOrFail($id);
        $albergues = Albergue::all();
        $usuarios = User::all();
        return view('donaciones.edit', compact('donacion', 'albergues', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $donacion = Donacion::findOrFail($id);
        $donacion->update($request->all());
        return redirect()->route('donaciones.index')->with('info', 'Donación actualizada correctamente');
    }

    public function destroy($id)
    {
        $donacion = Donacion::findOrFail($id);
        $donacion->delete();
        return redirect()->route('donaciones.index')->with('info', 'Donación eliminada correctamente');
    }
}

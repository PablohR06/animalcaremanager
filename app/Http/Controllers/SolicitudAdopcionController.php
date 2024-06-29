<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAdopcion;
use App\Models\Animal;
use App\Models\User;

class SolicitudAdopcionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador|Persona')->only(['index', 'show', 'create', 'store']);
        $this->middleware('role:SuperAdministrador|Administrador')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $solicitudes = SolicitudAdopcion::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        $animales = Animal::all();
        $usuarios = User::all();
        return view('solicitudes.create', compact('animales', 'usuarios'));
    }

    public function store(Request $request)
    {
        $solicitud = SolicitudAdopcion::create($request->all());
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud registrada correctamente');
    }

    public function show($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $animales = Animal::all();
        $usuarios = User::all();
        return view('solicitudes.edit', compact('solicitud', 'animales', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->update($request->all());
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud actualizada correctamente');
    }

    public function destroy($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->delete();
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud eliminada correctamente');
    }
}

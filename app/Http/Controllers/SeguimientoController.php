<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;
use App\Models\Animal;
use App\Models\Adopcion;

class SeguimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador|Voluntario')->only(['index', 'show']);
        $this->middleware('role:SuperAdministrador|Administrador')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $seguimientos = Seguimiento::all();
        return view('seguimientos.index', compact('seguimientos'));
    }

    public function create()
    {
        $adopciones = Adopcion::all();
        return view('seguimientos.create', compact('adopciones'));
    }

    public function store(Request $request)
    {
        $seguimiento = Seguimiento::create($request->all());
        return redirect()->route('seguimientos.index')->with('info', 'Seguimiento registrado correctamente');
    }

    public function show($id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        return view('seguimientos.show', compact('seguimiento'));
    }

    public function edit($id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        $adopciones = Adopcion::all();
        return view('seguimientos.edit', compact('seguimiento', 'adopciones'));
    }

    public function update(Request $request, $id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        $seguimiento->update($request->all());
        return redirect()->route('seguimientos.index')->with('info', 'Seguimiento actualizado correctamente');
    }

    public function destroy($id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        $seguimiento->delete();
        return redirect()->route('seguimientos.index')->with('info', 'Seguimiento eliminado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Albergue;

class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador|Voluntario')->only(['index', 'show']);
        $this->middleware('role:SuperAdministrador|Administrador')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $insumos = Insumo::all();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        $albergues = Albergue::all();
        return view('insumos.create', compact('albergues'));
    }

    public function store(Request $request)
    {
        $insumo = Insumo::create($request->all());
        return redirect()->route('insumos.index')->with('info', 'Insumo registrado correctamente');
    }

    public function show($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.show', compact('insumo'));
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        $albergues = Albergue::all();
        return view('insumos.edit', compact('insumo', 'albergues'));
    }

    public function update(Request $request, $id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->update($request->all());
        return redirect()->route('insumos.index')->with('info', 'Insumo actualizado correctamente');
    }

    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();
        return redirect()->route('insumos.index')->with('info', 'Insumo eliminado correctamente');
    }
}

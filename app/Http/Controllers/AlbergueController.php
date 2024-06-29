<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albergue;

class AlbergueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador|Administrador')->only(['index', 'show']);
        $this->middleware('role:SuperAdministrador')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $albergues = Albergue::all();
        return view('albergues.index', compact('albergues'));
    }

    public function create()
    {
        return view('albergues.create');
    }

    public function store(Request $request)
    {
        $albergue = Albergue::create($request->all());
        return redirect()->route('albergues.index')->with('info', 'Albergue creado correctamente');
    }

    public function show($id)
    {
        $albergue = Albergue::findOrFail($id);
        return view('albergues.show', compact('albergue'));
    }

    public function edit($id)
    {
        $albergue = Albergue::findOrFail($id);
        return view('albergues.edit', compact('albergue'));
    }

    public function update(Request $request, $id)
    {
        $albergue = Albergue::findOrFail($id);
        $albergue->update($request->all());
        return redirect()->route('albergues.index')->with('info', 'Albergue actualizado correctamente');
    }

    public function destroy($id)
    {
        $albergue = Albergue::findOrFail($id);
        $albergue->delete();
        return redirect()->route('albergues.index')->with('info', 'Albergue eliminado correctamente');
    }
}

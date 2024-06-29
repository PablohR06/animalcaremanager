<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SuperAdministrador')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('role:SuperAdministrador')->only(['blacklist', 'addToBlacklist', 'removeFromBlacklist']);
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function create()
    {
        return view('usuarios.create', [
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $usuario = User::create($data);
        $usuario->assignRole($request->input('roles'));
        $usuario->syncPermissions($request->input('permissions'));

        return redirect()->route('usuarios.index')->with('info', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', [
            'usuario' => $usuario,
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $usuario->update($data);
        $usuario->syncRoles($request->input('roles'));
        $usuario->syncPermissions($request->input('permissions'));

        return redirect()->route('usuarios.index')->with('info', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('info', 'Usuario eliminado correctamente');
    }

    public function blacklist()
    {
        $usuarios = User::where('blacklisted', true)->get();
        return view('usuarios.blacklist', compact('usuarios'));
    }

    public function addToBlacklist($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->blacklisted = true;
        $usuario->save();

        return redirect()->route('usuarios.blacklist')->with('info', 'Usuario añadido a la lista negra');
    }

    public function removeFromBlacklist($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->blacklisted = false;
        $usuario->save();

        return redirect()->route('usuarios.blacklist')->with('info', 'Usuario eliminado de la lista negra');
    }
}

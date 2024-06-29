<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Component
{
    public $usuarios;
    public $roles;
    public $permissions;
    public $name;
    public $apellido;
    public $telefono;
    public $direccion;
    public $codigo_postal;
    public $email;
    public $nombre_usuario;
    public $password;
    public $selectedRoles = [];
    public $selectedPermissions = [];
    public $selectedUserId = null;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->apellido = '';
        $this->telefono = '';
        $this->direccion = '';
        $this->codigo_postal = '';
        $this->email = '';
        $this->nombre_usuario = '';
        $this->password = '';
        $this->selectedRoles = [];
        $this->selectedPermissions = [];
        $this->selectedUserId = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'email' => 'required|email|unique:users,email',
            'nombre_usuario' => 'required|unique:users,nombre_usuario',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $this->name,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'codigo_postal' => $this->codigo_postal,
            'email' => $this->email,
            'nombre_usuario' => $this->nombre_usuario,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->selectedRoles);
        $user->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Usuario creado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->selectedUserId = $user->id;
        $this->name = $user->name;
        $this->apellido = $user->apellido;
        $this->telefono = $user->telefono;
        $this->direccion = $user->direccion;
        $this->codigo_postal = $user->codigo_postal;
        $this->email = $user->email;
        $this->nombre_usuario = $user->nombre_usuario;
        $this->selectedRoles = $user->roles->pluck('name')->toArray();
        $this->selectedPermissions = $user->permissions->pluck('name')->toArray();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selectedUserId,
            'nombre_usuario' => 'required|unique:users,nombre_usuario,' . $this->selectedUserId,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($this->selectedUserId);
        $user->update([
            'name' => $this->name,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'codigo_postal' => $this->codigo_postal,
            'email' => $this->email,
            'nombre_usuario' => $this->nombre_usuario,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        $user->syncRoles($this->selectedRoles);
        $user->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Usuario actualizado correctamente.');

        $this->resetInputFields();

        $this->mount();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.usuarios');
    }
}

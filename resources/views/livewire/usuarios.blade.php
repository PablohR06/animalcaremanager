<div>
    <h1>Usuarios</h1>
    <form wire:submit.prevent="{{ $selectedUserId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" wire:model="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" wire:model="apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" wire:model="telefono" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" wire:model="direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" wire:model="codigo_postal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" wire:model="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre_usuario">Nombre de Usuario</label>
            <input type="text" wire:model="nombre_usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" wire:model="password" class="form-control" {{ $selectedUserId ? '' : 'required' }}>
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <select wire:model="selectedRoles" class="form-control" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="permissions">Permisos</label>
            <select wire:model="selectedPermissions" class="form-control" multiple>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedUserId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedUserId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->roles->pluck('name')->join(', ') }}</td>
                    <td>
                        <button wire:click="edit({{ $usuario->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $usuario->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>

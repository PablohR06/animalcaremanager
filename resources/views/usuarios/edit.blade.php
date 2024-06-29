@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ $usuario->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" value="{{ $usuario->codigo_postal }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <div class="form-group">
            <label for="nombre_usuario">Nombre de Usuario</label>
            <input type="text" name="nombre_usuario" class="form-control" value="{{ $usuario->nombre_usuario }}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles[]" class="form-control" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ in_array($role->name, $usuario->roles->pluck('name')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="permissions">Permisos</label>
            <select name="permissions[]" class="form-control" multiple>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}" {{ in_array($permission->name, $usuario->permissions->pluck('name')->toArray()) ? 'selected' : '' }}>{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select name="albergue_id" class="form-control">
                <option value="">Seleccionar albergue</option>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}" {{ $usuario->albergue_id == $albergue->id ? 'selected' : '' }}>{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

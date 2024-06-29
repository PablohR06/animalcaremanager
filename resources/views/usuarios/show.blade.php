@extends('layouts.app')

@section('content')
    <h1>Detalles del Usuario</h1>
    <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
    <p><strong>Apellido:</strong> {{ $usuario->apellido }}</p>
    <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
    <p><strong>Código Postal:</strong> {{ $usuario->codigo_postal }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>
    <p><strong>Nombre de Usuario:</strong> {{ $usuario->nombre_usuario }}</p>
    <p><strong>Roles:</strong> {{ $usuario->roles->pluck('name')->join(', ') }}</p>
    <p><strong>Permisos:</strong> {{ $usuario->permissions->pluck('name')->join(', ') }}</p>
    <p><strong>Albergue:</strong> {{ $usuario->albergue ? $usuario->albergue->nombre : 'N/A' }}</p>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
@endsection

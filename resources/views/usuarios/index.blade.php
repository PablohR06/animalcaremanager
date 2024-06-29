@extends('layouts.app')

@section('content')
    <h1>Usuarios</h1>
    @can('create', App\Models\User::class)
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
    @endcan

    <table class="table">
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
                        @can('view', $usuario)
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('update', $usuario)
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('delete', $usuario)
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

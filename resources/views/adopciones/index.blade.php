@extends('layouts.app')

@section('content')
    <h1>Adopciones</h1>
    @can('adoptions.create')
        <a href="{{ route('adopciones.create') }}" class="btn btn-primary">Crear Adopción</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Animal</th>
                <th>Usuario</th>
                <th>Fecha de Adopción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->animal->nombre }}</td>
                    <td>{{ $adopcion->usuario->name }}</td>
                    <td>{{ $adopcion->fecha_adopcion }}</td>
                    <td>{{ $adopcion->estado_animal }}</td>
                    <td>
                        @can('adoptions.show')
                            <a href="{{ route('adopciones.show', $adopcion->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('adoptions.edit')
                            <a href="{{ route('adopciones.edit', $adopcion->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('adoptions.destroy')
                            <form action="{{ route('adopciones.destroy', $adopcion->id) }}" method="POST" style="display: inline-block;">
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

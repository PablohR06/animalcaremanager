@extends('layouts.app')

@section('content')
    <h1>Solicitudes de Adopción</h1>
    @can('solicitudes.create')
        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Crear Solicitud</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Animal</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->usuario->name }}</td>
                    <td>{{ $solicitud->animal->nombre }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>
                        @can('solicitudes.show')
                            <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('solicitudes.edit')
                            <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('solicitudes.destroy')
                            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display: inline-block;">
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

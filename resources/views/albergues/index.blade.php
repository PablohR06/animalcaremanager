@extends('layouts.app')

@section('content')
    <h1>Albergues</h1>
    @can('albergues.create')
        <a href="{{ route('albergues.create') }}" class="btn btn-primary">Crear Albergue</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Capacidad</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Encargado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albergues as $albergue)
                <tr>
                    <td>{{ $albergue->nombre }}</td>
                    <td>{{ $albergue->direccion }}</td>
                    <td>{{ $albergue->capacidad }}</td>
                    <td>{{ $albergue->ciudad }}</td>
                    <td>{{ $albergue->telefono }}</td>
                    <td>{{ $albergue->encargado->name ?? 'No asignado' }}</td>
                    <td>
                        @can('albergues.show')
                            <a href="{{ route('albergues.show', $albergue->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('albergues.edit')
                            <a href="{{ route('albergues.edit', $albergue->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('albergues.destroy')
                            <form action="{{ route('albergues.destroy', $albergue->id) }}" method="POST" style="display: inline-block;">
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

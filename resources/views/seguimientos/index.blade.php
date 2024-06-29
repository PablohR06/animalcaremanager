@extends('layouts.app')

@section('content')
    <h1>Seguimientos</h1>
    @can('seguimientos.create')
        <a href="{{ route('seguimientos.create') }}" class="btn btn-primary">Crear Seguimiento</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Animal</th>
                <th>Adopción</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $seguimiento)
                <tr>
                    <td>{{ $seguimiento->animal->nombre }}</td>
                    <td>{{ $seguimiento->adopcion->id }}</td>
                    <td>{{ $seguimiento->estado_seguimiento }}</td>
                    <td>{{ $seguimiento->fecha }}</td>
                    <td>
                        @can('seguimientos.show')
                            <a href="{{ route('seguimientos.show', $seguimiento->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('seguimientos.edit')
                            <a href="{{ route('seguimientos.edit', $seguimiento->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('seguimientos.destroy')
                            <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST" style="display: inline-block;">
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

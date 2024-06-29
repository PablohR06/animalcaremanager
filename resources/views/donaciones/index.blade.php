@extends('layouts.app')

@section('content')
    <h1>Donaciones</h1>
    @can('donations.create')
        <a href="{{ route('donaciones.create') }}" class="btn btn-primary">Crear Donación</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Albergue</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donaciones as $donacion)
                <tr>
                    <td>{{ $donacion->usuario->name }}</td>
                    <td>{{ $donacion->albergue->nombre }}</td>
                    <td>{{ $donacion->monto }}</td>
                    <td>{{ $donacion->fecha }}</td>
                    <td>
                        @can('donations.show')
                            <a href="{{ route('donaciones.show', $donacion->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('donations.edit')
                            <a href="{{ route('donaciones.edit', $donacion->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('donations.destroy')
                            <form action="{{ route('donaciones.destroy', $donacion->id) }}" method="POST" style="display: inline-block;">
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

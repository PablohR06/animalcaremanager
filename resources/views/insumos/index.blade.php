@extends('layouts.app')

@section('content')
    <h1>Insumos</h1>
    @can('insumos.create')
        <a href="{{ route('insumos.create') }}" class="btn btn-primary">Crear Insumo</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Fecha de Ingreso</th>
                <th>Albergue</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->descripcion }}</td>
                    <td>{{ $insumo->cantidad }}</td>
                    <td>{{ $insumo->fecha_ingreso }}</td>
                    <td>{{ $insumo->albergue->nombre }}</td>
                    <td>
                        @can('insumos.show')
                            <a href="{{ route('insumos.show', $insumo->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('insumos.edit')
                            <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('insumos.destroy')
                            <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display: inline-block;">
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

@extends('layouts.app')

@section('content')
    <h1>Animales</h1>
    @can('animals.create')
        <a href="{{ route('animals.create') }}" class="btn btn-primary">Crear Animal</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->nombre }}</td>
                    <td>{{ $animal->especie }}</td>
                    <td>{{ $animal->raza }}</td>
                    <td>{{ $animal->edad }}</td>
                    <td>{{ $animal->genero }}</td>
                    <td>
                        @can('animals.show')
                            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info">Ver</a>
                        @endcan
                        @can('animals.edit')
                            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Editar</a>
                        @endcan
                        @can('animals.destroy')
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: inline-block;">
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

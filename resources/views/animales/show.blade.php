@extends('layouts.app')

@section('content')
    <h1>Detalles del Animal</h1>
    <p><strong>Nombre:</strong> {{ $animal->nombre }}</p>
    <p><strong>Especie:</strong> {{ $animal->especie }}</p>
    <p><strong>Raza:</strong> {{ $animal->raza }}</p>
    <p><strong>Edad:</strong> {{ $animal->edad }}</p>
    <p><strong>Género:</strong> {{ $animal->genero }}</p>
    <a href="{{ route('animals.index') }}" class="btn btn-secondary">Volver</a>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Detalles de la Adopción</h1>
    <p><strong>Animal:</strong> {{ $adopcion->animal->nombre }}</p>
    <p><strong>Usuario:</strong> {{ $adopcion->usuario->name }}</p>
    <p><strong>Fecha de Adopción:</strong> {{ $adopcion->fecha_adopcion }}</p>
    <p><strong>Estado:</strong> {{ $adopcion->estado_animal }}</p>
    <p><strong>Comentario:</strong> {{ $adopcion->comentario }}</p>
    <a href="{{ route('adopciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection

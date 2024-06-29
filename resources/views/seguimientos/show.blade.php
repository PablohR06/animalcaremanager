@extends('layouts.app')

@section('content')
    <h1>Detalles del Seguimiento</h1>
    <p><strong>Animal:</strong> {{ $seguimiento->animal->nombre }}</p>
    <p><strong>Adopción:</strong> {{ $seguimiento->adopcion->id }}</p>
    <p><strong>Estado:</strong> {{ $seguimiento->estado_seguimiento }}</p>
    <p><strong>Fecha:</strong> {{ $seguimiento->fecha }}</p>
    <p><strong>Observaciones:</strong> {{ $seguimiento->observaciones }}</p>
    <a href="{{ route('seguimientos.index') }}" class="btn btn-secondary">Volver</a>
@endsection

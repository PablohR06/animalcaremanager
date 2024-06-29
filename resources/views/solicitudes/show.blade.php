@extends('layouts.app')

@section('content')
    <h1>Detalles de la Solicitud de Adopción</h1>
    <p><strong>Usuario:</strong> {{ $solicitud->usuario->name }}</p>
    <p><strong>Animal:</strong> {{ $solicitud->animal->nombre }}</p>
    <p><strong>Estado:</strong> {{ $solicitud->estado }}</p>
    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Volver</a>
@endsection

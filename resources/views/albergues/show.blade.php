@extends('layouts.app')

@section('content')
    <h1>Detalles del Albergue</h1>
    <p><strong>Nombre:</strong> {{ $albergue->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $albergue->direccion }}</p>
    <p><strong>Capacidad:</strong> {{ $albergue->capacidad }}</p>
    <p><strong>Ciudad:</strong> {{ $albergue->ciudad }}</p>
    <p><strong>Teléfono:</strong> {{ $albergue->telefono }}</p>
    <p><strong>Encargado:</strong> {{ $albergue->encargado->name ?? 'No asignado' }}</p>
    <a href="{{ route('albergues.index') }}" class="btn btn-secondary">Volver</a>
@endsection

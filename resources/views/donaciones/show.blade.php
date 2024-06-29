@extends('layouts.app')

@section('content')
    <h1>Detalles de la Donación</h1>
    <p><strong>Usuario:</strong> {{ $donacion->usuario->name }}</p>
    <p><strong>Albergue:</strong> {{ $donacion->albergue->nombre }}</p>
    <p><strong>Monto:</strong> {{ $donacion->monto }}</p>
    <p><strong>Fecha:</strong> {{ $donacion->fecha }}</p>
    <a href="{{ route('donaciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection

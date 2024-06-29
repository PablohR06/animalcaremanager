@extends('layouts.app')

@section('content')
    <h1>Detalles del Insumo</h1>
    <p><strong>Nombre:</strong> {{ $insumo->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $insumo->descripcion }}</p>
    <p><strong>Cantidad:</strong> {{ $insumo->cantidad }}</p>
    <p><strong>Fecha de Ingreso:</strong> {{ $insumo->fecha_ingreso }}</p>
    <p><strong>Albergue:</strong> {{ $insumo->albergue->nombre }}</p>
    <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Volver</a>
@endsection

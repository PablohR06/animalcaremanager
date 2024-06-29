@extends('layouts.app')

@section('content')
    <h1>Editar Solicitud de Adopción</h1>
    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $solicitud->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" class="form-control" required>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}" {{ $solicitud->animal_id == $animal->id ? 'selected' : '' }}>{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="Pendiente" {{ $solicitud->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Aprobada" {{ $solicitud->estado == 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                <option value="Rechazada" {{ $solicitud->estado == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

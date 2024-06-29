@extends('layouts.app')

@section('content')
    <h1>Editar Seguimiento</h1>
    <form action="{{ route('seguimientos.update', $seguimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" class="form-control" required>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}" {{ $seguimiento->animal_id == $animal->id ? 'selected' : '' }}>{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="adopcion_id">Adopción</label>
            <select name="adopcion_id" class="form-control" required>
                @foreach($adopciones as $adopcion)
                    <option value="{{ $adopcion->id }}" {{ $seguimiento->adopcion_id == $adopcion->id ? 'selected' : '' }}>{{ $adopcion->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado_seguimiento">Estado</label>
            <select name="estado_seguimiento" class="form-control" required>
                <option value="En progreso" {{ $seguimiento->estado_seguimiento == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Completado" {{ $seguimiento->estado_seguimiento == 'Completado' ? 'selected' : '' }}>Completado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $seguimiento->fecha }}" required>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $seguimiento->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

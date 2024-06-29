@extends('layouts.app')

@section('content')
    <h1>Crear Seguimiento</h1>
    <form action="{{ route('seguimientos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" class="form-control" required>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="adopcion_id">Adopción</label>
            <select name="adopcion_id" class="form-control" required>
                @foreach($adopciones as $adopcion)
                    <option value="{{ $adopcion->id }}">{{ $adopcion->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado_seguimiento">Estado</label>
            <select name="estado_seguimiento" class="form-control" required>
                <option value="En progreso">En progreso</option>
                <option value="Completado">Completado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

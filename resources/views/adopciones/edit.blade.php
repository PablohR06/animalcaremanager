@extends('layouts.app')

@section('content')
    <h1>Editar Adopción</h1>
    <form action="{{ route('adopciones.update', $adopcion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" class="form-control" required>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}" {{ $adopcion->animal_id == $animal->id ? 'selected' : '' }}>{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $adopcion->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_adopcion">Fecha de Adopción</label>
            <input type="date" name="fecha_adopcion" class="form-control" value="{{ $adopcion->fecha_adopcion }}" required>
        </div>
        <div class="form-group">
            <label for="estado_animal">Estado del Animal</label>
            <select name="estado_animal" class="form-control" required>
                <option value="Adopción" {{ $adopcion->estado_animal == 'Adopción' ? 'selected' : '' }}>Adopción</option>
                <option value="Adoptado" {{ $adopcion->estado_animal == 'Adoptado' ? 'selected' : '' }}>Adoptado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" class="form-control">{{ $adopcion->comentario }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

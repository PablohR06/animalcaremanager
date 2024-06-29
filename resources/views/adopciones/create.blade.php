@extends('layouts.app')

@section('content')
    <h1>Crear Adopción</h1>
    <form action="{{ route('adopciones.store') }}" method="POST">
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
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_adopcion">Fecha de Adopción</label>
            <input type="date" name="fecha_adopcion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="estado_animal">Estado del Animal</label>
            <select name="estado_animal" class="form-control" required>
                <option value="Adopción">Adopción</option>
                <option value="Adoptado">Adoptado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Editar Animal</h1>
    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $animal->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" name="especie" class="form-control" value="{{ $animal->especie }}" required>
        </div>
        <div class="form-group">
            <label for="raza">Raza</label>
            <input type="text" name="raza" class="form-control" value="{{ $animal->raza }}" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ $animal->edad }}" required>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control" required>
                <option value="Macho" {{ $animal->genero == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Hembra" {{ $animal->genero == 'Hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

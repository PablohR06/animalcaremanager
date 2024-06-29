@extends('layouts.app')

@section('content')
    <h1>Crear Animal</h1>
    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" name="especie" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="raza">Raza</label>
            <input type="text" name="raza" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

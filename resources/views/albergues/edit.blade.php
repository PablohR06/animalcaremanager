@extends('layouts.app')

@section('content')
    <h1>Editar Albergue</h1>
    <form action="{{ route('albergues.update', $albergue->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $albergue->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $albergue->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" value="{{ $albergue->capacidad }}" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ $albergue->ciudad }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $albergue->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="encargado_id">Encargado</label>
            <select name="encargado_id" class="form-control">
                <option value="">Seleccionar encargado</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $albergue->encargado_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Crear Insumo</h1>
    <form action="{{ route('insumos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select name="albergue_id" class="form-control" required>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}">{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

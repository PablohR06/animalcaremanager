@extends('layouts.app')

@section('content')
    <h1>Editar Insumo</h1>
    <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $insumo->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $insumo->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" value="{{ $insumo->cantidad }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" value="{{ $insumo->fecha_ingreso }}" required>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select name="albergue_id" class="form-control" required>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}" {{ $insumo->albergue_id == $albergue->id ? 'selected' : '' }}>{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

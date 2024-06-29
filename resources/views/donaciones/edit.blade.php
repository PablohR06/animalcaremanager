@extends('layouts.app')

@section('content')
    <h1>Editar Donación</h1>
    <form action="{{ route('donaciones.update', $donacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $donacion->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select name="albergue_id" class="form-control" required>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}" {{ $donacion->albergue_id == $albergue->id ? 'selected' : '' }}>{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" class="form-control" value="{{ $donacion->monto }}" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $donacion->fecha }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

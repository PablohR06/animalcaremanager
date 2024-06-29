@extends('layouts.app')

@section('content')
    <h1>Crear Donación</h1>
    <form action="{{ route('donaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select name="albergue_id" class="form-control" required>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}">{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

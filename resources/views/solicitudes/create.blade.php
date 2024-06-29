@extends('layouts.app')

@section('content')
    <h1>Crear Solicitud de Adopción</h1>
    <form action="{{ route('solicitudes.store') }}" method="POST">
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
            <label for="animal_id">Animal</label>
            <select name="animal_id" class="form-control" required>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Aprobada">Aprobada</option>
                <option value="Rechazada">Rechazada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

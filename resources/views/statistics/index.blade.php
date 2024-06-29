@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estadísticas</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Usuarios</div>
                <div class="card-body">{{ $data['total_users'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Albergues</div>
                <div class="card-body">{{ $data['total_albergues'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Animales</div>
                <div class="card-body">{{ $data['total_animals'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Adopciones</div>
                <div class="card-body">{{ $data['total_adoptions'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Insumos</div>
                <div class="card-body">{{ $data['total_insumos'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total de Donaciones</div>
                <div class="card-body">{{ $data['total_donations'] }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

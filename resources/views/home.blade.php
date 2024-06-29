@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 justify-between">
    <div class="flex mt-4">
        <div class="w-1/5 p-10">
            <div class="shadow-md rounded-lg p-4 mb-4">
                <h2 class="font-bold mb-2 text-center bg-green-500 text-white p-2 rounded">Información general</h2>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">La Asociación</a></li>
                    <li><a href="#">Nuestro albergue</a></li>
                    <li><a href="#">Profesionales colaboradores</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="shadow-md rounded-lg p-4 mb-4">
                <h2 class="font-bold mb-2 text-center bg-green-500 text-white p-2 rounded">Animales</h2>
                <ul>
                    <li><a href="#">Perros en adopción</a></li>
                    <li><a href="#">Gatos en adopción</a></li>
                    <li><a href="#">Casos urgentes</a></li>
                    <li><a href="#">Animales adoptados</a></li>
                </ul>
            </div>
            <div class="shadow-md rounded-xl p-3">
                <h2 class="font-bold mb-2 text-center bg-green-500 text-white p-3 rounded">Buscador de animales</h2>
                <form>
                    <input type="text" placeholder="Especie" class="mb-2 p-2 w-full border">
                    <select class="mb-2 p-2 w-full border">
                        <option>Perro</option>
                        <option>Gato</option>
                    </select>
                    <select class="mb-2 p-2 w-full border">
                        <option>En adopción</option>
                        <option>Adoptado</option>
                    </select>
                    <button class="bg-blue-500 text-white p-2 w-full">Buscar</button>
                </form>
            </div>
        </div>
        <div class="w-3/5 mx-4">
            <h2 class="font-bold mb-4 p-5">Listado de animales</h2>
            <div>
                <h2>Listado de Animales</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Sexo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animales as $animal)
                        <tr>
                            <td><img src="{{ $animal->foto }}" alt="{{ $animal->nombre }}" width="50"></td>
                            <td>{{ $animal->nombre }}</td>
                            <td>{{ $animal->especie }}</td>
                            <td>{{ $animal->sexo }}</td>
                            <td>{{ $animal->estado_salud }}</td>
                            <td>
                                @auth
                                    @if (Auth::user()->hasRole(['Administrador', 'SuperAdministrador']) && Auth::user()->albergue_id == $animal->albergue_id)
                                        <a href="#" class="bg-yellow-500 text-white p-1 rounded">Editar</a>
                                        <a href="#" class="bg-red-500 text-white p-1 rounded">Eliminar</a>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-1/5 p-10">
            <div class="shadow-md rounded-lg p-4 mb-4">
                <h2 class="font-bold mb-2 text-center bg-green-500 text-white p-2 rounded">Ayúdanos</h2>
                <ul>
                    <li><a href="#">Adopta o acoge</a></li>
                    <li><a href="#">Hazte socio o padrino</a></li>
                    <li><a href="#">Hazte voluntario</a></li>
                    <li><a href="#">Difunde</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

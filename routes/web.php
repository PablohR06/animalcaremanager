<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbergueController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\StatisticsController;

// Rutas de autenticación generadas por Laravel Jetstream
Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas para Usuarios
Route::middleware(['auth', 'role:SuperAdministrador'])->group(function () {
    Route::resource('usuarios', UserController::class);
    Route::get('usuarios/blacklist', [UserController::class, 'blacklist'])->name('usuarios.blacklist');
    Route::post('usuarios/{id}/blacklist', [UserController::class, 'addToBlacklist'])->name('usuarios.addToBlacklist');
    Route::post('usuarios/{id}/removeBlacklist', [UserController::class, 'removeFromBlacklist'])->name('usuarios.removeFromBlacklist');
});

// Rutas para Albergues
Route::middleware(['auth', 'role:SuperAdministrador|Administrador'])->group(function () {
    Route::resource('albergues', AlbergueController::class);
});

// Rutas para Animales
Route::middleware(['auth', 'role:SuperAdministrador|Administrador|Voluntario'])->group(function () {
    Route::resource('animales', AnimalController::class);
});

// Rutas para Insumos
Route::middleware(['auth', 'role:SuperAdministrador|Administrador|Voluntario'])->group(function () {
    Route::resource('insumos', InsumoController::class);
});

// Rutas para Donaciones
Route::middleware(['auth', 'role:SuperAdministrador|Administrador|Persona'])->group(function () {
    Route::resource('donaciones', DonacionController::class);
});

// Rutas para Adopciones
Route::middleware(['auth', 'role:SuperAdministrador|Administrador'])->group(function () {
    Route::resource('adopciones', AdopcionController::class);
});

// Rutas para Seguimientos
Route::middleware(['auth', 'role:SuperAdministrador|Administrador|Voluntario'])->group(function () {
    Route::resource('seguimientos', SeguimientoController::class);
});

// Ruta para Estadísticas
Route::middleware(['auth'])->get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');


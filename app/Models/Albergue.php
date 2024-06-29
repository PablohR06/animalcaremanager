<?php

// app/Models/Albergue.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albergue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'direccion', 'capacidad', 'telefono', 'ciudad', 'encargado_id'
    ];

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado_id');
    }

    public function animales()
    {
        return $this->hasMany(Animal::class);
    }

    public function insumos()
    {
        return $this->hasMany(Insumo::class);
    }

    public function donaciones()
    {
        return $this->hasMany(Donacion::class);
    }
}


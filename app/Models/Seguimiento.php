<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado_seguimiento',
        'observaciones',
        'fecha',
        'adopcion_id',
        'animal_id',
        'usuario_id',
    ];

    public function adopcion()
    {
        return $this->belongsTo(Adopcion::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

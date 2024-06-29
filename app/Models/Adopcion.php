<?php

// app/Models/Adopcion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;
    protected $table = 'adopciones'; // Especifica el nombre de la tabla
    protected $fillable = [
        'fecha_adopcion',
        'estado_animal',
        'comentario',
        'animal_id',
        'usuario_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }
}

<?php

// app/Models/Animal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'sexo', 'tamano', 'foto', 'edad', 'comentario', 'estado_esterilizacion', 'estado_chip', 'estado_salud', 'estadoanimal', 'fecha_registro', 'especie', 'albergue_id'
    ];

    public function getFormattedEdadAttribute()
    {
        $years = intdiv($this->edad, 12);
        $months = $this->edad % 12;

        return "{$years} años {$months} meses";
    }

    public function albergue()
    {
        return $this->belongsTo(Albergue::class);
    }


}

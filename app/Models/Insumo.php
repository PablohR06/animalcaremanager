<?php

// app/Models/Insumo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'cantidad', 'fecha_ingreso', 'albergue_id'
    ];

    public function albergue()
    {
        return $this->belongsTo(Albergue::class);
    }
}

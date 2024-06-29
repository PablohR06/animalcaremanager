<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones'; // Especifica el nombre de la tabla

    protected $fillable = [
        'monto', 'fecha', 'albergue_id', 'usuario_id'
    ];

    public function albergue()
    {
        return $this->belongsTo(Albergue::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

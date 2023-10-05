<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoInmobiliario extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_de_elementos',
        'nombre',
        'ancho',
        'alto',
        'area_total',
        'id_inmobiliario',
    ];

    // Ejemplo de relación con el modelo Inmobiliario
    public function inmobiliario()
    {
        return $this->belongsTo(Inmobiliario::class, 'id_inmobiliario');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'placa',
        'tipo_de_vehiculo',
        'lateral_izquierdo',
        'lateral_derecho',
        'posterior',
        'area_total',
        'movil_id',
    ];

    public function solicitude(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Solicitude::class);
    }

}

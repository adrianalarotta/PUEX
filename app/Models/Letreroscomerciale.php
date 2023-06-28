<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letreroscomerciale extends Model
{
    use HasFactory;

    protected $fillable = [
        'Ancho',
        'Alto',
        'Area_total',
        'comercial_id',
    ];

    public function comercial()
    {
        return $this->belongsTo(Comerciales::class);
    }
}

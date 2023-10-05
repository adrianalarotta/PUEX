<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementotipocolombina extends Model
{
    use HasFactory;

    protected $fillable = [
        'Ancho',
        'Alto',
        'Area_total',
        'tipocolombina_id',
    ];

    public function Tipocolombina()
    {
        return $this->belongsTo(Tipocolombina::class);
    }
}

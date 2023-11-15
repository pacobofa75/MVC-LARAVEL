<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{
    
    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
        'ciudad'
    ];

    public function partidos()
    {
        return $this->belongsToMany('App\Models\Partido', 'partidos_equipos', 'equipo_id', 'partido_id');
    }
    use HasFactory;
}
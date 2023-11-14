<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
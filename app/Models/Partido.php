<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';

    protected $fillable = [
        'nombre',
        'fecha_partido',
        'estado',
        'equipo_local_id',
        'equipo_visitante_id'
    ];

    public function equipoLocal()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_visitante_id');
    }
}
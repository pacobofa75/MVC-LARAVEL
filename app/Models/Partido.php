<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partido extends Model
{

    protected $table = 'partidos';

    protected $fillable = [
        'equipo_local',
        'equipo_visitante',
        'nombre',
        'fecha_partido',
        'ganador',
    ];

    public function equipoLocal()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_visitante_id');
    }
    use HasFactory;
}
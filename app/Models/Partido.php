<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partido extends Model
{

    protected $table = 'partidos';

    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'fecha',
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
    public function ganadorEquipo()
{
    return $this->belongsTo(Equipo::class, 'ganador');
}
    use HasFactory;
}
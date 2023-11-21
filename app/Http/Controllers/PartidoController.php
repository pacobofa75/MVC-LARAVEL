<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Equipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    
    public function index() {
        
        //$partidos = Partido::with('equipo_local_id', 'equipo_visitante_id')->get();

        $partidos = Partido::paginate(10);

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request) {
        $partido = new Partido();
        $partido->fecha = $request->input('fecha');
        $partido->equipo_local_id = $request->input('equipo_local_id');
        $partido->equipo_visitante_id = $request->input('equipo_visitante_id');
    
        // Asignar aleatoriamente el ganador entre equipo_local_id y equipo_visitante_id
        $ganadorId = rand(0, 1) == 0 ? $partido->equipo_local_id : $partido->equipo_visitante_id;
        $partido->ganador = $ganadorId;
    
        $partido->save();
    
        return redirect()->route('partidos.show');
    }

    public function show(){
        $partidos = Partido::orderBy('id', 'desc')->paginate(10);

        return view('partidos.show',compact('partidos'))->with('partidos', $partidos);
    }

    public function edit(string $id)
    {
        $partido = Partido::find($id);
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido){   

        $partido->fecha = $request->input('fecha');
        $partido->equipo_local_id = $request->input('equipo_local_id');
        $partido->equipo_visitante_id = $request->input('equipo_visitante_id');
        
        // Asignar aleatoriamente el ganador entre equipo_local_id y equipo_visitante_id
        $ganadorId = rand(0, 1) == 0 ? $partido->equipo_local_id : $partido->equipo_visitante_id;
        $partido->ganador = $ganadorId;
    
        $partido->save();
        return redirect()->route('partidos.show');
    }
    
    public function delete(string $id)
    {
        $partido = Partido::find($id);
        $partido->delete();
        return redirect()->route('partidos.show');
    }
    public function clasificacion()
    {
        $clasificacion = DB::table('MVCLaravel.partidos')  
            ->join('MVCLaravel.equipos', 'partidos.ganador', '=', 'equipos.id')
            ->select('equipos.nombre', DB::raw('COUNT(*) as victorias'))
            ->whereNotNull('partidos.ganador')
            ->groupBy('equipos.nombre', 'partidos.ganador')
            ->orderByDesc('victorias')
            ->get();

        return view('partidos.clasificacion', ['clasificacion' => $clasificacion]);
    }
}

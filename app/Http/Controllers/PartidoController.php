<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    
    public function index() {
        $partidos = Partido::paginate(10);

        return view('partidos.index', compact('partidos'));
    }

    public function create(){
        return view('partidos.create');
    }

    public function store(Request $request) {

        $partido = new Partido();
        $partido->nombre = $request->input('nombre');
        $partido->fecha_partido = $request->input('fecha_partido');
        $partido->equipo_local_id = $request->input('equipo_local_id');
        $partido->equipo_visitante_id = $request->input('equipo_visitante_id');
        $partido->ganador = $request->input('ganador');
    
        $partido->save();
    
        return redirect()->route('partidos.index');
    }

    public function show(){
        $partidos = Partido::orderBy('id', 'desc')->paginate(10);

        return view('partidos.show', ['partidos' => $partidos]);
    }

    public function edit(Partido $partido) {
        return view('partidos.edit', compact('partido'));
    }

    public function update(Request $request, Partido $partido){   

        $partido->nombre = $request->input('nombre');
        $partido->fecha_partido = $request->input('fecha_partido');
        $partido->equipo_local_id = $request->input('equipo_local_id');
        $partido->equipo_visitante_id = $request->input('equipo_visitante_id');
        $partido->ganador = $request->input('ganador');
    
        $partido->save();
        return redirect()->route('partidos.index');
    }
    
    public function delete(Partido $partido) {
        $partido->delete();
        return redirect()->route('partidos.index');
    }
}

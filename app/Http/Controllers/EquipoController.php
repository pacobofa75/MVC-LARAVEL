<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipoController extends Controller{
    
    public function index(){
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    public function create(){
        return view('equipos.create');
    }

    public function store(Request $request){
        $equipo = new Equipo();
        $equipo->nombre = $request->input('nombre');
        $equipo->ciudad = $request->input('ciudad');

        $equipo->save();

        return view('equipos.index');
    }
    public function show(){
        $equipos = Equipo::paginate(10);

        return view('equipos.show', compact('equipos'))->with('equipos', $equipos);
    }

    public function edit(Equipo $equipo){

        return view('Equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo){   
        $equipo->nombre = $request->nombre;
        $equipo->ciudad = $request->ciudad;
    
        $equipo->save();
        return redirect()->route('equipos.index');
    }
    
    public function delete(string $id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('/equipos');
    }
}

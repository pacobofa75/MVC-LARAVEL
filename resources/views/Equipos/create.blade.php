@extends('layouts.plantilla')

@section('content')
<div>
    <form action="{{ route('equipos.store') }}" method="POST">
            
    @csrf

    <input type="hidden" name="action" value="create">
    <div class="text-center flex max-w-md mx-auto mt-8 mb-4">
        <label for="nombre" class="text-black text-lg font-bold">Nombre del equipo:</label>
        <input type="text" name="nombre" required class="w-full rounded-md shadow-sm">
    </div>
    <div class="text-center flex max-w-md mx-auto mt-8 mb-4">
        <label for="ciudad" class="text-black text-lg font-bold">Ciudad:</label>
        <input type="text" name="ciudad" class="w-full rounded-md shadow-sm">
    </div>
            
    <div class="text-center">
        <button type="submit" class="bg-red-500 hover:bg-red-300 text-white text-lg font-bold py-4 px-6 rounded mb-4 mr-2">Agregar Equipo</button>
    </div>
    </form>
</div>
    
@endsection


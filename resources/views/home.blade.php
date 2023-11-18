@extends('layouts.plantilla')

@section('content')
<div>
    <div class="text-center flex flex-col max-w-md mx-auto mt-8">
        <button class="bg-red-500 hover:bg-red-300 text-white text-3xl font-bold py-4 px-6 rounded mb-4" onclick="window.location.href='equipos'">Gestión de equipos</button>
        <button class="bg-red-500 hover:bg-red-300 text-white text-3xl font-bold py-4 px-6 rounded mb-4" onclick="window.location.href='partidos'">Gestión de partidos</button>
    </div>
</div>
@endsection
@extends('layouts.plantilla')

@section('content')

    <div class="text-center flex max-w-md mx-auto mt-8">
        <a href="{{route('partidos.create')}}" class="bg-red-500 hover:bg-red-300 text-white text-2xl font-bold py-4 px-6 rounded mb-4 mr-2">Crear Partido</a>
        <a href="{{route('partidos.show')}}" class="bg-red-500 hover:bg-red-300 text-white text-2xl font-bold py-4 px-6 rounded mb-4 ml-2">Ver partidos</a>
    </div>

@endsection
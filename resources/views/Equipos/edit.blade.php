@extends('layouts.plantilla')

@section('content')
<div class="flex justify-center mt-4">
    <form action="{{route('equipos.update', $equipo)}}" method="POST" class="w-full max-w-lg">
        @csrf

        @method('put')
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="nombre" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Nombre del equipo:
                </label>
            </div>
            <div class="md:w-2/3">
                <input type="text" name="nombre" value="{{$equipo->nombre}}" required class="bg-gray-200 appearance-none border-2 border-gray-200
                 rounded w-full py-2 px-4 text-gray-700">
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="ciudad" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Ciudad:
                </label>
            </div>
            <div class="md:w-2/3">
                <input type="text" name="ciudad" value="{{$equipo->ciudad}}" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700">
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button type="submit" class="bg-red-500 hover:bg-red-300 text-white text-lg font-bold py-4 px-6 rounded mb-4 mr-2">
                    Modificar equipo
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

</body>
</html>
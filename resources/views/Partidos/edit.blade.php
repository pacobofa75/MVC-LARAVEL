@extends('layouts.plantilla')

@section('content')
<div class="flex justify-center mt-4">
    <form action="{{route('partidos.update', $partido )}}" method="POST" class="w-full max-w-lg">
        @csrf

        @method('put')

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="date" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Fecha:
                </label>
            </div>
            <div class="md:w-2/3">
                <input type="date" name="fecha" value="{{$partido->fecha}}" required class="bg-gray-200 appearance-none border-2 border-gray-200
                rounded w-full py-2 px-4 text-gray-700">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="equipo_local_id" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Equipo local:
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="equipo_local_id" id="equipo_local_id" required class="bg-gray-200 appearance-none border-2 border-gray-200
                rounded w-full py-2 px-4 text-gray-700">
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}" @if($equipo->id == $partido->equipo_local_id) selected @endif>{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">    
            <div class="md:w-1/3">
                <label for="equipo_visitante_id" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Equipo visitante:
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="equipo_visitante_id" id="equipo_visitante_id" required class="bg-gray-200 appearance-none border-2 border-gray-200
                rounded w-full py-2 px-4 text-gray-700">
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}" @if($equipo->id == $partido->equipo_visitante_id) selected @endif>{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div id="teamError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <strong class="font-bold">¡Atención!</strong>
            <span class="block sm:inline">No se puede escoger el mismo equipo como visitante!</span>
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

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var local = document.querySelector('#equipo_local_id').value;
            var visitante = document.querySelector('#equipo_visitante_id').value;
            if (local === visitante) {
                event.preventDefault();
                document.querySelector('#teamError').style.display = 'block';
            }
        });
        
        document.querySelector('#equipo_local_id').addEventListener('change', function() {
            document.querySelector('#teamError').style.display = 'none';
        });
        
        document.querySelector('#equipo_visitante_id').addEventListener('change', function() {
            document.querySelector('#teamError').style.display = 'none';
        });
    </script>
@endsection
</body>
</html>
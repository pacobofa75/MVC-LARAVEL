@extends('layouts.plantilla')

@section('content')
<div class="flex justify-center mt-4">
    <form action="{{ route('partidos.store') }}" method="POST" class="w-full max-w-lg">
        @csrf
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="fecha_partido" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Fecha:
                </label>       
            </div>
            <div class="md:w-2/3">
                <input type="date" name="fecha_partido" id="fecha_partido" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring 
                focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            
            <div class="mt-4">
                <label for="equipo_local_id" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Equipo local:
                </label>
                <select name="equipo_local_id" id="equipo_local_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
                 focus:ring-indigo-200 focus:ring-opacity-50" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="equipo_visitante_id" class="block font-bold">Equipo visitante:</label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @foreach ($equipos as $equipo)    
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
                </select>
                
            </div>
            <span id="teamError" style="display: none; color: red;">No puedes escoger el mismo equipo como visitante!.</span>
            <div class="mt-4">
                <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Crear partido</button>
                <a href="{{route('partidos.index')}}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Volver al menú de partidos</a>
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
        
</body>
</html>

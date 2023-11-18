@extends('layouts.plantilla')

@section('content')
<div class="flex justify-center mt-4">
    <form action="{{ route('partidos.store') }}" method="POST" class="w-full max-w-lg">
        @csrf
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="fecha" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Fecha:
                </label>       
            </div>
            <div class="md:w-2/3">
                <input type="date" name="fecha" id="fecha" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full 
                py-2 px-4 text-gray-700">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            
            <div class="md:w-1/3">
                <label for="equipo_local_id" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                   Equipo local:
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="equipo_local_id" id="equipo_local_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full 
                py-2 px-4 text-gray-700">
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
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
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full 
                py-2 px-4 text-gray-700">
                @foreach ($equipos as $equipo)    
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
                </select>

            </div>
        </div>
            <div id="teamError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">¡Atención!</strong>
                <span class="block sm:inline">No se puede escoger el mismo equipo como visitante!</span>
            </div>
       
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label for="ganador" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Ganador:
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="ganador" id="ganador" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700" style="display: none;">
                       <!-- Opciones para el campo ganador -->
                </select>
            </div>
        </div>

        <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                <button type="submit" class="bg-red-500 hover:bg-red-300 text-white text-lg font-bold py-4 px-6 rounded mb-4 mr-2">
                    Crear partido
                </button>
            </div>
        </div>
        
    </div>
    <script>
        // Obtener elementos del DOM
        const equipoLocal = document.getElementById('equipo_local_id');
        const equipoVisitante = document.getElementById('equipo_visitante_id');
        const ganadorSelect = document.getElementById('ganador');
        const teamError = document.getElementById('teamError');
        const fechaInput = document.getElementById('fecha');
    
        // Evento que se dispara cuando se selecciona un equipo local
        equipoLocal.addEventListener('change', function () {
            actualizarOpcionesGanador();
        });
    
        // Evento que se dispara cuando se selecciona un equipo visitante
        equipoVisitante.addEventListener('change', function () {
            actualizarOpcionesGanador();
        });
    
        // Evento que se dispara cuando se cambia la fecha
        fechaInput.addEventListener('change', function () {
            teamError.style.display = 'none';
        });
    
        // Función para actualizar las opciones del campo ganador
        function actualizarOpcionesGanador() {
            const localId = equipoLocal.value;
            const visitanteId = equipoVisitante.value;
    
            // Limpiar opciones existentes
            ganadorSelect.innerHTML = '';
    
            // Verificar que se hayan seleccionado equipos diferentes
            if (localId !== visitanteId) {
                // Mostrar el campo ganador
                ganadorSelect.style.display = 'block';
                teamError.style.display = 'none';
    
                // Elegir aleatoriamente entre equipo local y equipo visitante
                const ganadorAleatorio = Math.random() < 0.5 ? localId : visitanteId;
    
                // Agregar la opción aleatoria al campo ganador
                const ganadorOption = document.createElement('option');
                ganadorOption.value = ganadorAleatorio;
    
                // Especificar si es el equipo local o visitante en el texto de la opción
                ganadorOption.textContent = (ganadorAleatorio === localId) ? 'Equipo Local' : 'Equipo Visitante';
    
                ganadorSelect.appendChild(ganadorOption);
            } else {
                // Ocultar el campo ganador si se selecciona el mismo equipo
                ganadorSelect.style.display = 'none';
                teamError.style.display = 'block';
            }
        }
    
        // Manejar el envío del formulario
        document.querySelector('form').addEventListener('submit', function (event) {
            const localId = equipoLocal.value;
            const visitanteId = equipoVisitante.value;
    
            // Verificar que la fecha esté seleccionada
            if (!fechaInput.value) {
                event.preventDefault();
                teamError.textContent = '¡Atención! Debes seleccionar una fecha.';
                teamError.style.display = 'block';
                return;
            }
    
            // Evitar el envío del formulario si se selecciona el mismo equipo
            if (localId === visitanteId) {
                event.preventDefault();
                teamError.textContent = '¡Atención! No puedes escoger el mismo equipo como visitante.';
                teamError.style.display = 'block';
            }
        });
    </script>
</form>
</body>
</html>
@endsection
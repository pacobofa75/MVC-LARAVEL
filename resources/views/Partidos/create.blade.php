<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear partido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold mb-4">Crea un nuevo partido</h1>

        <form action="{{ route('partidos.store') }}" method="POST">
            @csrf


            <div class="mt-4">
                <label for="fecha_partido" class="block font-bold">Fecha del partido:</label>
                <input type="date" name="fecha_partido" id="fecha_partido" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring 
                focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>

            <div class="mt-4">
                <label for="equipo_local_id" class="block font-bold">Equipo local:</label>
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

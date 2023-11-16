<!DOCTYPE html>
<html>
<head>
    <title>Editar Partido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" >
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 mt-8">
        <img src="images/new-task-icon.png" alt="Logo" class="mb-4 mx-auto">

        <form action="{{route('partidos.update', $partido)}}" method="POST" class="mb-4 mx-auto w-full max-w-sm">
            
            @csrf
            @php
                $equipos = App\Models\Equipo::all();
            @endphp

            @method('put')

            <input type="hidden" name="action" value="create">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del partido:</label>
                <input type="text" name="nombre" value="{{$partido->nombre}}" required class="border rounded py-2 px-3 focus:outline-none focus:border-blue-400 w-full">
            </div>
            <div class="mt-4">
                <label for="fecha_partido" class="block font-bold">Fecha del partido:</label>
                <input type="date" name="fecha_partido" value="{{$partido->fecha_partido}}" required class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>

            <div class="mt-4">
                <label for="equipo_local_id" class="block font-bold">Equipo local:</label>
                <select name="equipo_local_id" id="equipo_local_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}" @if($equipo->id == $partido->equipo_local_id) selected @endif>{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-4">
                <label for="equipo_visitante_id" class="block font-bold">Equipo visitante:</label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}" @if($equipo->id == $partido->equipo_visitante_id) selected @endif>{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <span id="teamError" style="display: none; color: red;">No puedes escoger el mismo equipo como visitante!.</span>
            
            
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">Modificar partido</button>
            <a href="{{route('partidos.show')}}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Volver al menú</a>
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
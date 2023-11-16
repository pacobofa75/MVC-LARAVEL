<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar partidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .btn-eliminar {
            float: right;
            margin-right: 10px;
        }

        .btn-editar {
            float: right;
            margin-right: 10px;
        }
        .div-recuadro {
          width: 100%;
          max-width: 1200px;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full div-recuadro">
        <h1 class="text-3xl font-bold mb-4">Esta es la lista de partidos</h1>

                <table class="table-auto w-full mt-10">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Fecha del partido</th>
                            <th class="px-4 py-2">Equipo local</th>
                            <th class="px-4 py-2">Equipo visitante</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($partidos as $partido)
                            <tr>
                                <td class="px-4 py-2">{{ $partido->fecha_partido }}</td>
                                <td class="px-4 py-2">{{ $partido->equipoLocal->nombre }}</td>
                                <td class="px-4 py-2">{{ $partido->equipoVisitante->nombre }}</td>
                                <td>
                                    <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-editar bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600 mb-3">Editar</a>
                                    <form action="{{ route('partidos.delete', $partido->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-eliminar bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600 mb-3" onclick="return confirmarEliminar()">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center mt-8">
                    <a href="{{route('partidos.index')}}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Volver al menú de partidos</a>
                </div>
    </div>

</body>
<script>
function confirmarEliminar() {
  return confirm("¿Estás seguro de que quieres eliminar este partido?");
}
</script>


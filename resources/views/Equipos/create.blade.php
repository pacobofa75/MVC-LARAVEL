<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold mb-4">Crea un nuevo equipo</h1>

        <form action="{{ route('equipos.store') }}" method="POST">
            
            @csrf

            <input type="hidden" name="action" value="create">
            <div class="mb-4">
                <label for="nombre" class="block font-bold">Nombre del equipo:</label>
                <input type="text" name="nombre" required class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring 
                focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="ciudad" class="block font-bold">Ciudad:</label>
                <input type="text" name="ciudad" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 
                focus:ring-opacity-50">
            </div>
            
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">Agregar Equipo</button>
            <a href="{{route('equipos.index')}}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Volver al menú de equipos</a>
        </form>
    </div>
</body>
</html>
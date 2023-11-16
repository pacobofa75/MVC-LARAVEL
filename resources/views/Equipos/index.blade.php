<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <img src="images/Laravel MVC Equipos.png" alt="Logo" class="mx-auto w-full">

        <div class="flex justify-between">
            <a href="{{route('equipos.create')}}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">Crear Equipo</a>
            <a href="{{route('equipos.show')}}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Ver Equipos</a>
        </div>
        <div class="flex justify-center mt-8">
            <a href="/" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Volver al menú principal</a>
        </div>
    </div>
    
</body>
</html>

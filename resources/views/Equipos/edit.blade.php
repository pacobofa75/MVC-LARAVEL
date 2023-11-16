<!DOCTYPE html>
<html>
<head>
    <title>Editar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" >
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 mt-8">
        <img src="images/new-task-icon.png" alt="Logo" class="mb-4 mx-auto">

        <form action="{{route('equipos.update', $equipo)}}" method="POST" class="mb-4 mx-auto w-full max-w-sm">
            
            @csrf

            @method('put')

            <input type="hidden" name="action" value="create">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del equipo:</label>
                <input type="text" name="nombre" value="{{$equipo->nombre}}" required class="border rounded py-2 px-3 focus:outline-none focus:border-blue-400 w-full">
            </div>
            <div class="mb-4">
                <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad:</label>
                <input type="text" name="ciudad" value="{{$equipo->ciudad}}" class="border rounded py-2 px-3 focus:outline-none focus:border-blue-400 w-full">
            </div>
            
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">Modificar Equipo</button>
            <a href="{{route('equipos.show')}}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Volver al menú</a>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <header class="bg-red-300 p-4">
        <img src="images/Laravel MVCs.png" alt="Logo" class="mx-auto" style="height: 180px;">

    <nav class="p-2">
      <div class="container mx-auto">
        <ul class="flex justify-center space-x-4">
          <li>
            <a class="text-white text-2xl font-bold hover:text-gray-600" href='/'>Inicio</a>
          </li>
          <li>
            <a href="{{route('equipos.index')}}" class="text-gray-200 text-2xl font-bold hover:text-gray-600">equipos</a>
          </li>
          <li>
            <a href="{{route('partidos.index')}}" class="text-gray-200 text-2xl font-bold hover:text-gray-600">partidos</a>
          </li>
        </ul>
      </div>
    </nav>
    </header>
    

    @yield('content')
    
</body>
</html>


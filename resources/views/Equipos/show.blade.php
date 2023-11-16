@extends('layouts.plantilla')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-4">Esta es la lista de equipos</h1>

    <table class="table-auto w-full mt-10">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Ciudad</th>
            </tr>
        </thead>
        <tbody>
            @php
                $equipos = App\Models\Equipo::all();
            @endphp
            @foreach ($equipos as $equipo)
                <tr>
                    <td class="px-4 py-2">{{ $equipo->nombre }}</td>
                    <td class="px-4 py-2">{{ $equipo->ciudad }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-editar bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600 mb-3">Editar</a>
                        <form action="{{ route('equipos.delete', $equipo->id)}}" method="POST">
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
        <a href="{{route('equipos.index')}}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Volver al menú de equipos</a>
    </div>
</div>
@endsection

<script>
function confirmarEliminar() {
  return confirm("¿Estás seguro de que quieres eliminar este equipo?");
}
</script>


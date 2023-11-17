@extends('layouts.plantilla')

@section('content')



<h1 class="text-3xl font-bold mb-4 mt-8 text-center">Esta es la lista de equipos</h1>
<div class="text-center flex w-1/2 mx-auto mt-8">
    <table class="table-auto w-full mt-8">
        <thead>
            <tr>
                <th class="px-2 py-2">Nombre</th>
                <th class="px-2 py-2">Ciudad</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($equipos as $equipo)
                <tr>
                    <td class="px-2">{{ $equipo->nombre }}</td>
                    <td class="px-2">{{ $equipo->ciudad }}</td>
                    <td class="h-full">
                        <form action="{{ route('equipos.delete', $equipo->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <div class=" flex justify-center">
                            <button type="button" onclick="window.location='{{ route('equipos.edit', $equipo->id) }}'" class="bg-gray-300 hover:bg-red-300
                                 text-gray-800 font-bold mt-6 w-1/2 h-full py-2 px-4 rounded-l">
                                Editar
                            </button>
                            <button type="submit" class="bg-gray-300 hover:bg-red-300 text-gray-800 font-bold mt-6 h-full w-1/2 py-2 px-4 rounded-r" 
                            onclick="return confirmarEliminar()">Eliminar
                            </button>
                            </form>
                        </div> 
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6">No hay equipos.</td>
                    </tr>
            @endforelse
        </tbody>
    </table>

</div>
{{ $equipos->links() }}
<div class="flex justify-center mt-8">
    <a href="{{route('equipos.index')}}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 focus:outline-none
     focus:bg-gray-600">Volver al menú de equipos</a>
</div>
@endsection

<script>
function confirmarEliminar() {
  return confirm("¿Estás seguro de que quieres eliminar este equipo?");
}
</script>


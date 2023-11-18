@extends('layouts.plantilla')

@section('content')

<h1 class="text-3xl font-bold mb-4 mt-8 text-center">Esta es la lista de partidos</h1>
<div class="text-center flex w-1/2 mx-auto mt-8">
    <table class="table-auto w-full mt-8">
        <thead>
            <tr>
                <th class="px-2 py-2">Fecha del partido</th>
                <th class="px-2 py-2">Equipo local</th>
                <th class="px-2 py-2">Equipo visitante</th>
                <th class="px-2 py-2">Ganador</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($partidos as $partido)
                <tr>
                    <td class="px-4 py-2">{{ $partido->fecha }}</td>
                    <td class="px-4 py-2">{{ $partido->equipoLocal->nombre }}</td>
                    <td class="px-4 py-2">{{ $partido->equipoVisitante->nombre }}</td>
                    <td class="px-4 py-2">{{ $partido->ganadorEquipo->nombre }}</td>
                    <td>
                        <form action="{{ route('partidos.delete', $partido->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <div class=" flex justify-center">
                            <button type="button" onclick="window.location='{{ route('partidos.edit', $partido->id) }}'" class="bg-gray-300 hover:bg-red-300
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
                        <td colspan="6">No hay partidos.</td>
                    </tr>
            @endforelse
        </tbody>
    
    </table>
</div>
<div class="flex justify-center mb-4">
    {{ $partidos->links() }}
</div>

@endsection

<script>
function confirmarEliminar() {
  return confirm("¿Estás seguro de que quieres eliminar este partido?");
}
</script>


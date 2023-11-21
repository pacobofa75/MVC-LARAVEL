@extends('layouts.plantilla')

@section('content')
<h1 class="text-3xl font-bold mb-4 mt-8 text-center">Esta es la clasificación de partidos</h1>
<div class="flex justify-center mt-4">

    <div>
        <table class="table-auto w-full mt-8">
            <thead>
                <tr>
                    <th class="px-2 py-2">Equipo</th>
                    <th class="px-2 py-2">Victorias</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clasificacion as $equipo)
                    <tr>
                        <td class="px-4 py-2">{{ $equipo->nombre }}</td>
                        <td class="px-4 py-2">{{ $equipo->victorias }}</td>
                        @empty
                        <tr>
                            <td colspan="6">No hay partidos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
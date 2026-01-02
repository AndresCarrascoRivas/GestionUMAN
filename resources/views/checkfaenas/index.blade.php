<x-app-layout>

@section('title', 'Listado de Check Faenas')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Listado de Check Faenas</h1>

    {{-- Botón para crear nuevo registro --}}
    <div class="mb-4">
        <a href="{{ route('checkfaenas.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nuevo Check
        </a>
    </div>

    {{-- Tabla de registros --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Técnico</th>
                    <th class="border px-4 py-2">Faena</th>
                    <th class="border px-4 py-2">Equipo Minero</th>
                    <th class="border px-4 py-2">Fecha Ingreso</th>
                    <th class="border px-4 py-2">Caja Uman</th>
                    <th class="border px-4 py-2">HMI</th>
                    <th class="border px-4 py-2">Antena RF</th>
                    <th class="border px-4 py-2">Antena GPS</th>
                    <th class="border px-4 py-2">Conexión Eléctrica</th>
                    <th class="border px-4 py-2">Sensores Internos</th>
                    <th class="border px-4 py-2">Observación</th>
                </tr>
            </thead>
            <tbody>
                @forelse($checkFaenas as $check)
                    <tr>
                        <td class="border px-4 py-2">{{ $check->id }}</td>
                        <td class="border px-4 py-2">{{ $check->tecnico->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $check->faena->nombre ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $check->equipoMinero->nombre ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $check->fecha_ingreso->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $check->caja_uman ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->hmi ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->antena_rf ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->antena_gps ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->conexion_electrica ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->sensores_internos ? '✔️' : '❌' }}</td>
                        <td class="border px-4 py-2">{{ $check->observacion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center py-4">No hay registros disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</x-app-layout>
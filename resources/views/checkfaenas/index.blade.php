<x-app-layout>

@section('title', 'Listado de Check Faenas')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Listado de Check Faenas</h1>

    {{-- Botón para crear nuevo registro --}}
    <div class="mb-4">
        <a href="{{ route('checkfaenas.create') }}" 
           class="btn btn-primary">
           ➕ Nuevo Check
        </a>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('checkfaenas.index') }}">
            <div class="row">
                {{-- Columna 1: Técnico --}}
                <div class="col-md-3">
                    <label for="tecnico_id" class="form-label fw-bold">Filtrar Técnico:</label>
                    <select name="tecnico_id" id="tecnico_id" class="form-select"
                            onchange="this.form.submit()">
                        <option value="">-- Todos --</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}" 
                                {{ request('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                                {{ $tecnico->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Columna 2: Faena --}}
                <div class="col-md-3">
                    <label for="faena_id" class="form-label fw-bold">Filtrar Faena:</label>
                    <select name="faena_id" id="faena_id" class="form-select"
                            onchange="this.form.submit()">
                        <option value="">-- Todas --</option>
                        @foreach($faenas as $faena)
                            <option value="{{ $faena->id }}" 
                                {{ request('faena_id') == $faena->id ? 'selected' : '' }}>
                                {{ $faena->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Columna 3: Equipo Minero--}}
                <div class="col-md-3">
                    <label for="equipo_minero_id" class="form-label fw-bold">Filtrar Equipo minero:</label>
                    <select name="equipo_minero_id" id="equipo_minero_id" class="form-select"
                            onchange="this.form.submit()">
                        <option value="">-- Todas --</option>
                        @foreach($equiposMinero as $equipoMinero)
                            <option value="{{ $equipoMinero->id }}" 
                                {{ request('equipoMinero_id') == $equipoMinero->id ? 'selected' : '' }}>
                                {{ $equipoMinero->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    {{-- Tabla de registros --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Tecnico</th>
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
                        <td class="border px-4 py-2">{{ $check->faena->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $check->equipoMinero->name ?? 'N/A' }}</td>
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
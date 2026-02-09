<x-app-layout>

    @section('title', 'Listado de Ordenes de Laboratorio')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">📦 Ordenes de Faena registradas</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('ordenfaena.create') }}" class="btn btn-primary">
                ➕ Nueva Orden
            </a>
            <a href="{{ route('ordenfaena.exportar') }}" class="btn btn-success">
                Descargar Excel
            </a>
        </div>

        <div class="mb-3">
            <form method="GET" action="{{ route('ordenfaena.index') }}">
                <div class="row">

                    {{-- Columna 1: Faena --}}
                    <div class="col-md-3">
                        <label for="faena_id" 
                        class="form-label fw-bold">Filtrar Faena:</label>
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

                    {{-- Columna 2: Equipo Minero --}}
                    <div class="col-md-3">
                        <label for="equipo_minero_id" class="form-label fw-bold">Filtrar Equipo Minero:</label>
                        <select name="equipo_minero_id" id="equipo_minero_id" 
                                class="form-select select2" onchange="this.form.submit()">
                            <option value="">-- Todos --</option>
                            @foreach($equiposMinero as $equipoMinero)
                                <option value="{{ $equipoMinero->id }}" 
                                    {{ request('equipo_minero_id') == $equipoMinero->id ? 'selected' : '' }}>
                                    {{ $equipoMinero->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Equipo Minero</th>
                    <th>Faena</th>
                    <th>Estado</th>
		    <th>Falla</th>
		    <th>Fecha Trabajo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ordenesFaena as $orden)
                    <tr>
                        <td>
                            <a href="{{ route('ordenfaena.show', $orden->id) }}">
                             {{ $orden->id }}
                            </a>
                        </td>
                        <td>{{ $orden->equipoMinero->name ?? '—' }}</td>
                        <td>{{ ucfirst($orden->faena?->name ?? '—') }}</td>
                        <td>{{ ucfirst($orden->estado) }}</td>
                        <td>{{ ucfirst(optional($orden->falla)->name ?? '—') }}</td>
                        <td>{{ ucfirst($orden->fecha_trabajo) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay equipos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $ordenesFaena->links() }}
        </div>
    </div>

</x-app-layout>
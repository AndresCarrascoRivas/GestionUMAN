<x-app-layout>

    @section('title', 'Listado de Equipos')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">📦 Equipos UMAN registrados</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('equiposUman.create') }}" class="btn btn-primary">
                ➕ Nuevo Equipo
            </a>
            <a href="{{ route('equiposUman.export') }}" class="btn btn-success">
                📥 Descargar Excel
            </a>
        </div>

        <div class="mb-3">
            <form method="GET" action="{{ route('equiposUman.index') }}">
                <div class="row">
                    {{-- Filtro por Serial --}}
                    <div class="col-md-3">
                        <label for="serial" class="form-label fw-bold">Filtrar Serial:</label>
                        <input type="text" name="serial" id="serial" 
                            class="form-control"
                            value="{{ request('serial') }}"
                            placeholder="Ingrese serial..."
                            onchange="this.form.submit()">
                    </div>

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
                </div>
            </form>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Serial</th>
                    <th>Técnico</th>
                    <th>Estado</th>
                    <th>Modelo UMAN</th>
                    <th>Versión SD</th>
                    <th>PCB UMAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $equipo)
                    <tr>
                        <td>
                            <a href="{{ route('equiposUman.show', $equipo) }}">
                                {{ $equipo->serial }}
                            </a>
                        </td>
                        <td>{{ $equipo->tecnico->name ?? 'Sin técnico' }}</td>
                        <td>{{ ucfirst($equipo->estado) }}</td>
                        <td>{{ $equipo->modelo_uman ?? '-' }}</td>
                        <td>{{ $equipo->versionSd->version ?? '-' }}</td>
                        <td>{{ $equipo->pcbUman->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay equipos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $equipos->links() }}
        </div>
    </div>

</x-app-layout>
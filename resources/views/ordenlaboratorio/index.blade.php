<x-app-layout>
    @section('title', 'Listado de Órdenes de Laboratorio')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-xl font-bold">📦 Órdenes de Laboratorio UMAN registradas</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('ordenlaboratorio.create') }}" class="btn btn-primary">
                ➕ Nueva Orden
            </a>
            <a href="{{ route('ordenes.exportar') }}" class="btn btn-success">
                📥 Descargar Excel
            </a>
        </div>

        <div class="mb-3">
            <form method="GET" action="{{ route('ordenlaboratorio.index') }}">
                <div class="row">
                    {{-- Filtro por Serial --}}
                    <div class="col-md-3">
                        <label for="equipo_uman_serial" class="form-label fw-bold">Filtrar Serial:</label>
                        <input type="text" name="equipo_uman_serial" id="equipo_uman_serial" 
                            class="form-control"
                            value="{{ request('equipo_uman_serial') }}"
                            placeholder="Ingrese serial..."
                            onchange="this.form.submit()">
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
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Serial UMAN</th>
                        <th>Faena</th>
                        <th>Estado</th>
                        <th>Falla</th>
                        <th>Fecha Ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ordenes as $orden)
                        <tr>
                            <td>
                                <a href="{{ route('ordenlaboratorio.show', $orden->id) }}">
                                    {{ $orden->id }}
                                </a>
                            </td>
                            <td>{{ $orden->equipoUMAN->serial ?? '—' }}</td>
                            <td>{{ ucfirst(optional($orden->faena)->name ?? '—') }}</td>
                            <td>{{ ucfirst($orden->estado) }}</td>
                            <td>{{ ucfirst(optional($orden->falla)->name ?? '—') }}</td>
                            <td>{{ $orden->fecha_ingreso ? \Carbon\Carbon::parse($orden->fecha_ingreso)->format('d-m-Y') : '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay órdenes registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $ordenes->links() }}
        </div>
    </div>
</x-app-layout>
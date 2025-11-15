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

        <div class="mb-3 text-end">
            <a href="{{ route('ordenfaena.create') }}" class="btn btn-primary">
                ➕ Nuevo Equipo
            </a>
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
                        <td>{{ ucfirst($orden->falla) }}</td>
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

    <a href="{{ route('ordenfaena.exportar') }}" class="btn btn-success">
        Descargar Excel
    </a>

</x-app-layout>
<x-app-layout>

    <a href="/">HOME</a>

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

        <div class="mb-3 text-end">
            <a href="{{ route('equiposUman.create') }}" class="btn btn-primary">
                ➕ Nuevo Equipo
            </a>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Serial</th>
                    <th>Técnico</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->serial }}</td>
                        <td>
                            {{ $equipo->tecnico?->name ?? '—' }}
                        </td>
                        <td>{{ ucfirst($equipo->estado) }}</td>
                        <td>
                            <a href="{{ route('equiposUman.edit', $equipo->serial) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                        </td>
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
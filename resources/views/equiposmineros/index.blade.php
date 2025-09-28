<x-app-layout>

    <a href="/">HOME</a>

    @section('title', 'Listado de Equipos Mineros')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">🏗️ Equipos mineros registrados</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('equiposmineros.create') }}" class="btn btn-primary">
                ➕ Nuevo equipo minero
            </a>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Faena</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equiposmineros as $equipominero)
                    <tr>
                        <td>{{ $equipominero->id }}</td>
                        <td>{{ $equipominero->name }}</td>
                        <td>{{ $equipominero->faena?->name ?? 'Sin asignar' }}</td>
                        <td>
                            <a href="{{ route('equiposmineros.edit', $equipominero->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                            <form action="{{ route('equiposmineros.destroy', $equipominero->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar Este equipo?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay equipos mineros registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $equiposmineros->links() }}
        </div>
    </div>

</x-app-layout>
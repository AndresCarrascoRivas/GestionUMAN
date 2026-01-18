<x-app-layout>

    @section('title', 'Listado de Faenas')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">🏗️ Faenas registradas</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('faenas.create') }}" class="btn btn-primary">
                ➕ Nueva Faena
            </a>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faenas as $faena)
                    <tr>
                        <td>{{ $faena->nombre ?? $faena->name }}</td>
                        <td>
                            <a href="{{ route('faenas.edit', $faena->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                            <form action="{{ route('faenas.destroy', $faena->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta faena?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No hay faenas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $faenas->links() }}
        </div>
    </div>

</x-app-layout>
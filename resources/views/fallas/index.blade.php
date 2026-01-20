<x-app-layout>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fallas registradas</h2>

    <div class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('fallas.create') }}" class="btn btn-primary">
                ➕ Nueva Falla
            </a>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fallas as $falla)
                    <tr>
                        <td>{{ $falla->name }}</td>
                        <td>{{ $falla->descripcion ?? '—' }}</td>
                        <td>
                            {{-- ✅ Botón Ver --}}
                            <a href="{{ route('fallas.show', $falla) }}" class="btn btn-sm btn-info text-white">
                                👁️ Ver
                            </a>

                            {{-- ✅ Botón Editar --}}
                            <a href="{{ route('fallas.edit', $falla) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            {{-- ✅ Botón Eliminar --}}
                            <form action="{{ route('fallas.destroy', $falla) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar esta falla?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No hay fallas registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $fallas->links() }}
        </div>
    </div>

</x-app-layout>
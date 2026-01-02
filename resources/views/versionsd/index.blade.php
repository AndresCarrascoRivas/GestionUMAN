<x-app-layout>

    @section('title', 'Versiones SD registradas')

    @section('content')
    <div class="container mt-4">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            💾 Versiones SD registradas
        </h2>

        {{-- ✅ Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ✅ Botón para crear nueva versión SD --}}
        <div class="mb-3 text-end">
            <a href="{{ route('versionsd.create') }}" class="btn btn-primary">
                ➕ Nueva Versión SD
            </a>
        </div>

        {{-- ✅ Tabla de versiones SD --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>versión</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($versions as $version)
                    <tr>
                        <td>{{ $version->id }}</td>
                        <td>{{ $version->version }}</td>
                        <td>{{ $version->descripcion ?? '—' }}</td>
                        <td>
                            {{-- ✅ Botón Ver --}}
                            <a href="{{ route('versionsd.show', $version) }}" class="btn btn-sm btn-info text-white">
                                👁️ Ver
                            </a>

                            {{-- ✅ Botón Editar --}}
                            <a href="{{ route('versionsd.edit', $version) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            {{-- ✅ Botón Eliminar --}}
                            <form action="{{ route('versionsd.destroy', $version) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar esta Versión SD?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No hay versiones SD registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- ✅ Paginación --}}
        <div class="mt-3">
            {{ $versions->links() }}
        </div>
    </div>

</x-app-layout>
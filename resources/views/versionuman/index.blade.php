<x-app-layout>

    @section('title', 'Listado de Versiones UMAN')

    @section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Versiones UMAN registradas</h2>

    <div class="container mt-4">

        {{-- ✅ Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ✅ Botón para crear nueva versión --}}
        <div class="mb-3 text-end">
            <a href="{{ route('versionuman.create') }}" class="btn btn-primary">
                ➕ Nueva Versión UMAN
            </a>
        </div>

        {{-- ✅ Tabla de versiones --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>URL</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($versiones as $version)
                    <tr>
                        <td>{{ $version->name }}</td>
                        <td>{{ $version->descripcion ?? '—' }}</td>
                        <td>
                            @if($version->url)
                                <a href="{{ $version->url }}" target="_blank" class="btn btn-sm btn-success">
                                    ⬇️ Descargar
                                </a>
                            @else
                                <span class="text-muted">Sin URL</span>
                            @endif
                        </td>
                        <td>
                            {{-- ✅ Botón Ver --}}
                            <a href="{{ route('versionuman.show', $version) }}" class="btn btn-sm btn-info text-white">
                                👁️ Ver
                            </a>

                            {{-- ✅ Botón Editar --}}
                            <a href="{{ route('versionuman.edit', $version) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            {{-- ✅ Botón Eliminar --}}
                            <form action="{{ route('versionuman.destroy', $version) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar esta versión UMAN?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No hay versiones UMAN registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- ✅ Paginación --}}
        <div class="mt-3">
            {{ $versiones->links() }}
        </div>
    </div>

</x-app-layout>
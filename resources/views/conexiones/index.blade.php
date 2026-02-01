<x-app-layout>

    @section('title', 'Listado de Conexiones')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">🌐 Conexiones registradas</h2>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Botón nueva conexión --}}
        <div class="mb-3 text-end">
            <a href="{{ route('conexiones.create') }}" class="btn btn-primary">
                ➕ Nueva conexión
            </a>
        </div>

        {{-- Filtro por faena --}}
        <div class="mb-3">
            <form method="GET" action="{{ route('conexiones.index') }}">
                <div class="row">
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

        {{-- Tabla de conexiones --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Faena</th>
                    <th>IP</th>
                    <th>Operador</th>
                    <th>APN</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($conexiones as $conexion)
                    <tr>
                        <!-- ID con link al show -->
                        <td>
                            <a href="{{ route('conexiones.show', $conexion->id) }}"
                               class="fw-bold text-primary text-decoration-none">
                                {{ $conexion->id }}
                            </a>
                        </td>

                        <td>{{ ucfirst($conexion->tipo) }}</td>
                        <td>{{ $conexion->faena?->name ?? 'Sin asignar' }}</td>
                        <td>{{ $conexion->ip ?? '-' }}</td>
                        <td>{{ $conexion->operador ?? '-' }}</td>
                        <td>{{ $conexion->apn ?? '-' }}</td>

                        <td>
                            <a href="{{ route('conexiones.edit', $conexion->id) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            <form action="{{ route('conexiones.destroy', $conexion->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta conexión?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay conexiones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Paginación --}}
        <div class="mt-3">
            {{ $conexiones->links() }}
        </div>
    </div>

</x-app-layout>
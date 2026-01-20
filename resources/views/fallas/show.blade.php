<x-app-layout>

    @section('title', 'Detalle de la Falla')

    <div class="container mt-4">

        <h2 class="mb-4">🔍 Detalle de la Falla</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $falla->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $falla->name }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $falla->descripcion ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Creado</th>
                            <td>{{ $falla->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado</th>
                            <td>{{ $falla->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('fallas.edit', $falla) }}" class="btn btn-warning">✏️ Editar</a>

                    <form action="{{ route('fallas.destroy', $falla->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar esta falla?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('fallas.index') }}" class="btn btn-secondary">← Volver al listado</a>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>
<x-app-layout>

    @section('title', 'Detalle Versión UMAN')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4">🔍 Detalle de la Versión UMAN</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $versionuman->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $versionuman->name }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $versionuman->descripcion ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Creado</th>
                            <td>{{ $versionuman->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado</th>
                            <td>{{ $versionuman->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('versionuman.edit', $versionuman) }}" class="btn btn-warning">✏️ Editar</a>

                    <form action="{{ route('versionuman.destroy', $versionuman->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar esta Versión UMAN?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('versionuman.index') }}" class="btn btn-secondary">← Volver al listado</a>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>
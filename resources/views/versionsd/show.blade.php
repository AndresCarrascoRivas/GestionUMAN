<x-app-layout>

    @section('title', 'Detalle Versión SD')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4">🔍 Detalle de la Versión SD</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $versionsd->id }}</td>
                        </tr>
                        <tr>
                            <th>Version</th>
                            <td>{{ $versionsd->version }}</td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td>
                                @if($versionsd->url)
                                    <a href="{{ $versionsd->url }}" target="_blank" class="btn btn-success btn-sm">
                                        ⬇️ Descargar archivo
                                    </a>
                                @else
                                    <span class="text-muted">Sin URL</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $versionsd->descripcion ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Creado</th>
                            <td>{{ $versionsd->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado</th>
                            <td>{{ $versionsd->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('versionsd.edit', $versionsd) }}" class="btn btn-warning">✏️ Editar</a>

                    <form action="{{ route('versionsd.destroy', $versionsd->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar esta Versión SD?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('versionsd.index') }}" class="btn btn-secondary">← Volver al listado</a>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>
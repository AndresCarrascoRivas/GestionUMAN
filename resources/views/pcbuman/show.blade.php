<x-app-layout>

    @section('title', 'Detalle PCB UMAN')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4">🔍 Detalle del PCB UMAN</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $pcbuman->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $pcbuman->name }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $pcbuman->descripcion ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Creado</th>
                            <td>{{ $pcbuman->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado</th>
                            <td>{{ $pcbuman->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('pcbuman.edit', $pcbuman) }}" class="btn btn-warning">✏️ Editar</a>

                    <form action="{{ route('pcbuman.destroy', $pcbuman->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar este PCB UMAN?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('pcbuman.index') }}" class="btn btn-secondary">← Volver al listado</a>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
<x-app-layout>


    <h2 class="font-semibold text-xl text-gray-800 leading-tight">PCB UMAN registrados</h2>


    <div class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('pcbuman.create') }}" class="btn btn-primary">
                ➕ Nuevo PCB UMAN
            </a>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Version</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pcbs as $pcb)
                    <tr>
                        <td>{{ $pcb->name }}</td>
                        <td>{{ $pcb->descripcion ?? '—' }}</td>
                        <td>

                            {{-- ✅ Botón Ver --}}
                            <a href="{{ route('pcbuman.show', $pcb) }}" class="btn btn-sm btn-info text-white">
                                👁️ Ver
                            </a>

                            {{-- ✅ Botón Editar --}}
                            <a href="{{ route('pcbuman.edit', $pcb) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            {{-- ✅ Botón Eliminar --}}
                            <form action="{{ route('pcbuman.destroy', $pcb) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este PCB UMAN?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No hay PCB UMAN registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $pcbs->links() }}
        </div>
    </div>

</x-app-layout>
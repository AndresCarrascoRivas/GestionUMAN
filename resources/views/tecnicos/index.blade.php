<x-app-layout>

    <a href="/">HOME</a>

    @section('title', 'Listado de Técnicos')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">👨‍🔧 Técnicos registrados</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('tecnicos.create') }}" class="btn btn-primary">
            ➕ Nuevo Técnico
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Faena</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->name }}</td>
                    <td>
                        {{ $tecnico->faena?->name ?? '—' }} {{-- ✅ Muestra nombre de faena o guion --}}
                    </td>
                    <td>
                        <a href="{{ route('tecnicos.edit', $tecnico->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                        <form action="{{ route('tecnicos.destroy', $tecnico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este técnico?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay técnicos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $tecnicos->links() }}
    </div>
</div>

</x-app-layout>
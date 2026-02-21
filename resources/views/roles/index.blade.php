<x-app-layout>
    <h1 class="mb-4">Gestión de Roles</h1>

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Nuevo Rol</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar rol?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $roles->links() }}
</x-app-layout>
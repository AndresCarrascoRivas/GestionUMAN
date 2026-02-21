<x-app-layout>
    <h1 class="mb-4">Editar Rol</h1>

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre del Rol</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>
</x-app-layout>
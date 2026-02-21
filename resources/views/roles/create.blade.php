<x-app-layout>
    <h1 class="mb-4">Crear Rol</h1>

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nombre del Rol</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
</x-app-layout>
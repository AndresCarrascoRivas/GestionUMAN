<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar orden de laboratorio</h1>

        <form action="{{ route('ordenlaboratorio.update', $ordenlaboratorio->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            @include('ordenlaboratorio._form')

            <div class="d-flex justify-content-start gap-2 mt-4">
                <a href="{{ route('ordenlaboratorio.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
    </div>
</x-app-layout>
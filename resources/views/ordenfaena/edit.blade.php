<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar Orden de Faena</h1>

        <form action="{{ route('ordenfaena.update', $ordenfaena->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            @method('PUT')

            @include('ordenfaena._form')

            <div class="d-flex justify-content-start gap-2 mt-4">
                <a href="{{ route('ordenfaena.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>

        </form>
    </div>
</x-app-layout>
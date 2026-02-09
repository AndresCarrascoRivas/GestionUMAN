<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar equipos mineros</h1>

        <form action="{{ route('equiposmineros.update', $equiposminero) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            @include('equiposmineros._form')
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</x-app-layout>
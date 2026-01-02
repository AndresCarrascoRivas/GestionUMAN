<x-app-layout>

    @section('title', 'Editar Versión SD')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4">✏️ Editar Versión SD</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('versionsd.update', $versionsd) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- ✅ Formulario parcial reutilizable --}}
                    @include('versionsd._form')

                    <div class="text-end">
                        <a href="{{ route('versionsd.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-app-layout>
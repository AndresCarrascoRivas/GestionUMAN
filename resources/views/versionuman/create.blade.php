<x-app-layout>

    @section('title', 'Nueva Versión UMAN')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4"> Crear nueva Versión UMAN</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('versionuman.store') }}" method="POST">
                    @csrf

                    {{-- ✅ Formulario parcial para reutilización --}}
                    @include('versionuman._form')

                    <div class="text-end">
                        <a href="{{ route('versionuman.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-app-layout>
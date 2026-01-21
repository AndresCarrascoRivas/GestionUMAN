<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar un equipo</h1>

        <form action="{{ route('equiposUman.store') }}" method="POST" class="row g-3" novalidate>
            @csrf

            @include('equiposUman._form')

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    Ingresar Equipo UMAN
                </button>
            </div>
        </form>
    </div>

    <!-- Script para mostrar campo UPS -->
    <script>
        const versionUmanSelect = document.getElementById('uman_version');
        const upsField = document.getElementById('upsField');

        function toggleUpsField() {
            upsField.style.display = versionUmanSelect.value === 'UMAN BLUE' ? 'block' : 'none';
        }

        versionUmanSelect.addEventListener('change', toggleUpsField);
        window.addEventListener('DOMContentLoaded', toggleUpsField);
    </script>
</x-app-layout>
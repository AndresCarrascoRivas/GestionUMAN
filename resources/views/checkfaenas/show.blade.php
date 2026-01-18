<x-app-layout>
    <div class="container">

        <h1 class="mb-4">Detalle Check de Faena #{{ $checkfaena->id }}</h1>

        {{-- Datos principales --}}
        <div class="mb-3">
            <strong>Técnico:</strong> {{ $checkfaena->tecnico->name ?? '—' }}
        </div>
        <div class="mb-3">
            <strong>Faena:</strong> {{ $checkfaena->faena->name ?? '—' }}
        </div>
        <div class="mb-3">
            <strong>Equipo Minero:</strong> {{ $checkfaena->equipoMinero->name ?? '—' }}
        </div>
        <div class="mb-3">
            <strong>Fecha de Ingreso:</strong> {{ $checkfaena->fecha_ingreso?->format('d/m/Y') ?? '—' }}
        </div>

        {{-- Checks booleanos --}}
        <h4 class="mt-4">Checks realizados</h4>

        <div class="row">
            <div class="col-md-6 col-lg-5">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        Caja Uman: {{ $checkfaena->caja_uman ? '✅ OK' : '❌ No' }}
                    </li>
                    <li class="list-group-item">
                        HMI: {{ $checkfaena->hmi ? '✅ OK' : '❌ No' }}
                    </li>
                    <li class="list-group-item">
                        Antena RF: {{ $checkfaena->antena_rf ? '✅ OK' : '❌ No' }}
                    </li>
                    <li class="list-group-item">
                        Antena GPS: {{ $checkfaena->antena_gps ? '✅ OK' : '❌ No' }}
                    </li>
                    <li class="list-group-item">
                        Conexión Eléctrica: {{ $checkfaena->conexion_electrica ? '✅ OK' : '❌ No' }}
                    </li>
                    <li class="list-group-item">
                        Sensores Internos: {{ $checkfaena->sensores_internos ? '✅ OK' : '❌ No' }}
                    </li>
                </ul>
            </div>
        </div>

        {{-- Observación --}}
        <div class="mb-3">
            <strong>Observación:</strong>
            <p>{{ $checkfaena->observacion ?? '—' }}</p>
        </div>

        {{-- Botones --}}
        <div class="mt-4">
            <a href="{{ route('checkfaenas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-app-layout>
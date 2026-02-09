<x-app-layout>

    <div class="container py-4">

        <a href="{{ route('equiposUman.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
            ← Volver a equipos
        </a>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detalles del equipo UMAN</h5>
            </div>

            <div class="card-body">
                <h4 class="mb-2">
                    <span class="text-muted">Serial:</span> {{ $equipoUman->serial }}
                </h4>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>Técnico asignado:</strong>
                        {{ $equipoUman->tecnico?->name ?? '—' }}
                    </div>
                    <div class="col-md-2">
                        <strong>Estado:</strong> {{ ucfirst($equipoUman->estado) }}
                    </div>
                    <div class="col-md-3">
                        <strong>Faena:</strong>
                        {{ $equipoUman->faena?->name ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Modelo UMAN:</strong> {{ $equipoUman->modelo_uman ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión UMAN:</strong> {{ $equipoUman->versionUman?->name ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión SD:</strong> {{ $equipoUman->versionSd?->version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>PCB UMAN:</strong> {{ $equipoUman->pcbUman?->name ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión Raspberry:</strong> {{ $equipoUman->rpi_version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión UPS:</strong> {{ $equipoUman->ups_version ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>PCB Antena:</strong> {{ $equipoUman->pcb_antenna ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Radiometrix:</strong> {{ $equipoUman->radiometrix ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>BAM:</strong> {{ $equipoUman->bam ? 'Sí' : 'No' }}
                    </div>
                </div>

                @if($equipoUman->bam)
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Marca BAM:</strong> {{ $equipoUman->marca_bam ?? '—' }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Chip:</strong> {{ $equipoUman->chip ?? '—' }}
                        </div>
                        <div class="col-md-6">
                            <strong>IMEI Chip:</strong> {{ $equipoUman->imei_chip ?? '—' }}
                        </div>
                    </div>
                @endif

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Fecha de Fabricación:</strong>
                        {{ $equipoUman->fecha_fabricacion ? \Carbon\Carbon::parse($equipoUman->fecha_fabricacion)->format('d/m/Y') : '—' }}
                    </div>
                </div>

                <hr>

                <p class="text-muted mb-0">
                    Última actualización: {{ $equipoUman->updated_at?->format('d/m/Y H:i') ?? '—' }}
                </p>

                <hr>

            <h5 class="mt-4">Órdenes de Laboratorio</h5>

            @if($equipoUman->ordenesLaboratorio->isEmpty())
                <p class="text-muted">Este equipo no tiene órdenes de laboratorio asociadas.</p>
            @else
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Falla</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipoUman->ordenesLaboratorio as $orden)
                            <tr>
                                <td>
                                    <a href="{{ route('ordenlaboratorio.show', $orden->id) }}">
                                        {{ $orden->id }}
                                    </a>
                                </td>
                                <td>{{ optional($orden->faena)->name ?? '—' }}</td>
                                <td>{{ ucfirst($orden->estado) }}</td>
                                <td>{{ $orden->created_at?->format('d/m/Y') ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
            </div>
        </div>
    </div>
</x-app-layout>
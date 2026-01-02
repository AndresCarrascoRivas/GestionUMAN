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
                <h4 class="mb-3">
                    <span class="text-muted">Serial:</span> {{ $equiposUman->serial }}
                </h4>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Técnico asignado:</strong>
                        {{ $equiposUman->tecnico?->name ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong> {{ ucfirst($equiposUman->estado) }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Modelo UMAN:</strong> {{ $equiposUman->modelo_uman ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión UMAN:</strong> {{ $equiposUman->versionUman?->name ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión SD:</strong> {{ $equiposUman->versionSd?->version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>PCB UMAN:</strong> {{ $equiposUman->pcbUman?->name ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión Raspberry:</strong> {{ $equiposUman->rpi_version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión UPS:</strong> {{ $equiposUman->ups_version ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>PCB Antena:</strong> {{ $equiposUman->pcb_antenna ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Radiometrix:</strong> {{ $equiposUman->radiometrix ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>BAM:</strong> {{ $equiposUman->bam ? 'Sí' : 'No' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Marca BAM:</strong> {{ $equiposUman->marca_bam ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Chip:</strong> {{ $equiposUman->chip ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>IMEI Chip:</strong> {{ $equiposUman->imei_chip ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Fecha de Fabricación:</strong>
                        {{ $equiposUman->fecha_fabricacion ? \Carbon\Carbon::parse($equiposUman->fecha_fabricacion)->format('d/m/Y') : '—' }}
                    </div>
                </div>

                <hr>

                <p class="text-muted mb-0">
                    Última actualización: {{ $equiposUman->updated_at?->format('d/m/Y H:i') ?? '—' }}
                </p>

                <hr>

            <h5 class="mt-4">Órdenes de Laboratorio</h5>

            @if($equiposUman->ordenesLaboratorio->isEmpty())
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
                        @foreach($equiposUman->ordenesLaboratorio as $orden)
                            <tr>
                                <td>
                                    <a href="{{ route('ordenlaboratorio.show', $orden->id) }}">
                                        {{ $orden->id }}
                                    </a>
                                </td>
                                <td>{{ $orden->falla ?? '—' }}</td>
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
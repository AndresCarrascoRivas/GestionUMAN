<x-app-layout>
    @section('title', 'Detalle de Orden de Laboratorio')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-xl font-bold">🔍 Detalle de Orden de Laboratorio #{{ $ordenlaboratorio->id }}</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <dl class="row">
                    @php
                        $info = [
                            'UMAN Serial' => $ordenlaboratorio->equipoUMAN->serial ?? $ordenlaboratorio->uman_serial,
                            'Técnico' => optional($ordenlaboratorio->tecnico)->name,
                            'Faena' => optional($ordenlaboratorio->faena)->name,
                            'Equipo Minero' => optional($ordenlaboratorio->equipoMinero)->name,
                            'Estado' => ucfirst($ordenlaboratorio->estado),
                            'PCB UMAN Serial' => $ordenlaboratorio->pcb_uman_serial,
                            'UPS Serial' => $ordenlaboratorio->ups_serial,
                            'Raspberry Pi Version' => $ordenlaboratorio->rpi_version,
                            'Firmware Version' => $ordenlaboratorio->firmware_version,
                            'Falla' => $ordenlaboratorio->falla,
                            'Descripción de la Falla' => $ordenlaboratorio->descripcion_falla,
                            'Detalle de Reparación' => $ordenlaboratorio->detalle_reparacion,
                            'Fecha de Ingreso' => $ordenlaboratorio->fecha_ingreso ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_ingreso)->format('d-m-Y') : '—',
                            'Fecha de Reparación' => $ordenlaboratorio->fecha_reparacion ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_reparacion)->format('d-m-Y') : '—',
                            'Horas de Reparación' => $ordenlaboratorio->horas_reparacion,
                            'Creado el' => $ordenlaboratorio->created_at->format('d-m-Y H:i'),
                            'Última actualización' => $ordenlaboratorio->updated_at->format('d-m-Y H:i'),
                        ];
                    @endphp

                    @foreach ($info as $label => $value)
                        <dt class="col-sm-4">{{ $label }}</dt>
                        <dd class="col-sm-8">{{ $value ?? '—' }}</dd>
                    @endforeach
                </dl>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('ordenlaboratorio.index') }}" class="btn btn-secondary">
                        ← Volver al listado
                    </a>
                    <a href="{{ route('ordenlaboratorio.edit', $ordenlaboratorio->id) }}" class="btn btn-primary btn-sm">
                        ✏️ Editar Orden
                    </a>
                    <a href="{{ route('ordenlaboratorio.pdf', $ordenlaboratorio->id) }}" class="btn btn-outline-danger btn-sm">
                        🧾 Descargar PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
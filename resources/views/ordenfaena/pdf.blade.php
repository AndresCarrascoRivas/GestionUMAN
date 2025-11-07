<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden Faena #{{ $ordenfaena->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        dt { font-weight: bold; }
        dd { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2> Detalle de Orden #{{ $ordenfaena->id }}</h2>
    <dl>
        <dt class="col-sm-4">UMAN Serial</dt>
                <dd class="col-sm-8">{{ $ordenfaena->uman_serial }}</dd>

                    <dt class="col-sm-4">¿Cambio de UMAN?</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->cambio_uman ? 'Sí' : 'No' }}</dd>

                    @if($ordenfaena->cambio_uman)
                        <dt class="col-sm-4">Serial Nueva UMAN</dt>
                        <dd class="col-sm-8">{{ $ordenfaena->serial_nueva_uman ?? '—' }}</dd>
                    @endif

                    <dt class="col-sm-4">Técnico</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->tecnico->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Faena</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->faena->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Fecha de Trabajo</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->fecha_trabajo }}</dd>

                    <dt class="col-sm-4">Equipo Minero</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->equipoMinero->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">{{ ucfirst($ordenfaena->estado) }}</dd>

                    <dt class="col-sm-4">Falla</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->falla ?? '—' }}</dd>

                    <dt class="col-sm-4">Descripción de la Falla</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->descripcion_falla ?? '—' }}</dd>

                    <dt class="col-sm-4">Imagen Adjunta</dt>
                    <dd class="col-sm-8">
                        @if($ordenfaena->imagen)
                            <a href="{{ asset('storage/' . $ordenfaena->imagen) }}" target="_blank">📷 Ver imagen</a>
                        @else
                            —
                        @endif
                    </dd>

                    <dt class="col-sm-4">Creado el</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->created_at }}</dd>

                    <dt class="col-sm-4">Última actualización</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->updated_at }}</dd>
            </dl>
    </dl>
</body>
</html>
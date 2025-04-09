<x-app-layout>

    <a href="{{route('ordenes.index')}}">Volver a ordenes</a>

    <h1>Numero de orden: {{ $order->id }}</h1>
    <p>
    <h1>Serial UB: {{ $order->serialUb }}</h1>
    <p>
        <b>Serial TMS:</b> {{ $order->serialTms }}
    </p>
    <p>
        <b>Serial UPS:</b> {{ $order->serialUps }}
    </p>
    <p>
        <b>Version RPI:</b> {{ $order->versionRpi }}
    </p>
    <p>
        <b>Version Firmware:</b> {{ $order->versionFirmware }}
    </p>
    <p>
        <b>Tecnico:</b> {{ $order->tecnico }}
    </p>
    <p>
        <b>Faena:</b> {{ $order->faena }}
    </p>
    <p>
        <b>Falla:</b> {{ $order->falla }}
    </p>
    <p>
        <b>Descripcion Falla:</b> {{ $order->descripcionFalla }}
    </p>
    <p>
        <b>Horas de trabajo:</b> {{ $order->hReparacion}}
    </p>

    <p>
        <b>Fecha de Ingreso:</b> {{ $order->fechaIngreso}}
    </p>
    <p>
        <b>Fecha de creacion:</b> {{ $order->created_at}}
    </p>
    <p>
        <b>Ultima actualizacion:</b> {{ $order->updated_at}}
    </p>
    <p>
        <b>Fecha de Reparacion:</b> {{ $order->fechaReparacion}}
    </p>

    <a href="{{route('ordenes.edit', $order)}}">
        Editar orden
    </a>

</x-app-layout>
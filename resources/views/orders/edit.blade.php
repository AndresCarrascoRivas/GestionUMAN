<x-app-layout>
    <h1>Formulario para editar una nueva orden</h1>

    <form action="{{route('ordenes.update', $order)}}" method="POST">

        @csrf

        @method('PUT')

        <label>
            Serial UB:
            <input type="number" name="serialUb" value="{{$order->serialUb}}">
        </label>

        <br>
        <br>

        <label>
            Serial TMS:
            <input type="number" name="serialTms" value="{{$order->serialTms}}">
        </label>

        <br>
        <br>

        <label>
            Serial UPS:
            <input type="number" name="serialUps" value="{{$order->serialUps}}">
        </label>

        <br>
        <br>

        <label>
            Version RPI:
            <input type="text" name="versionRpi" value="{{$order->versionRpi}}">
        </label>

        <br>
        <br>

        <label>
            Version Firmware:
            <input type="text" name="versionFirmware" value="{{$order->versionFirmware}}">
        </label>

        <br>
        <br>


        <label>
            Técnico:
            <input type="number" name="tecnico" value="{{$order->tecnico}}">
        </label>

        <br>
        <br>

        <label>
            Faena:
            <input type="number" name="faena" value="{{$order->faena}}">
        </label>

        <br>
        <br>

        <label>
            Falla:
            <input type="text" name="falla" value="{{$order->falla}}">
        </label>

        <br>
        <br>

        <label>
            Descripcion Falla:
            <textarea name="descripcionFalla">{{$order->descripcionFalla}} </textarea>
        </label>

        <br>
        <br>

        <label>
            Horas de Reparacion:
            <input type="text" name="hReparacion" value="{{$order->hReparacion}}">
        </label>

        <br>
        <br>

        <label for="fechaIngreso">
            Fecha de ingreso:
        </label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" value="{{$order->fechaIngreso}}">

        <br>
        <br>

        <label for="fechaReparacion">
            Fecha de Reparacion:
        </label>
        <input type="date" id="fechaReparacion" name="fechaReparacion" value="{{$order->fechaReparacion}}">

        <br>
        <br>

        <button type="submit">
            Actualizar Orden
        </button>

    </form>
</x-app-layout>
<x-app-layout>
    <h1>Formulario para crear una nueva orden</h1>

    <form action="{{route('ordenes.store')}}" method="POST">

        @csrf

        <label>
            Serial UB:
            <input type="number" name="serialUb"  min="1000">
        </label>

        <br>
        <br>

        <label>
            Serial TMS:
            <input type="number" name="serialTms">
        </label>

        <br>
        <br>

        <label>
            Serial UPS:
            <input type="number" name="serialUps">
        </label>

        <br>
        <br>

        <label>
            Version RPI:
            <input type="text" name="versionRpi">
        </label>

        <br>
        <br>

        <label>
            Version Firmware:
            <input type="text" name="versionFirmware">
        </label>

        <br>
        <br>

        <label>
            Técnico:
            <input type="number" name="tecnico">
        </label>

        <br>
        <br>

        <label>
            Faena:
            <input type="number" name="faena">
        </label>

        <br>
        <br>

        <label>
            Falla:
            <input type="text" name="falla">
        </label>

        <br>
        <br>

        <label>
            Descripcion Falla:
            <textarea name="descripcionFalla"></textarea>
        </label>

        <br>
        <br>

        <label>
            Horas de Reparacion:
            <input type="text" name="hReparacion">
        </label>

        <br>
        <br>

        <label for="fechaIngreso">
            Fecha de ingreso:
        </label>
        <input type="date" id="fechaIngreso" name="fechaIngreso">

        <br>
        <br>

{{--         <label for="fechaReparacion">
            Fecha de Reparacion:
        </label>
        <input type="date" id="fechaReparacion" name="fechaReparacion">

        <br>
        <br> --}}

        <button type="submit">
            Crear Orden
        </button>

    </form>
</x-app-layout>
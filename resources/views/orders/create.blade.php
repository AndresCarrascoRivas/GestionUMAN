<x-app-layout>
    <h1>Formulario para crear una nueva orden</h1>

    <form action="{{route('ordenes.store')}}" method="POST">

        @csrf

        <label>
            Serial UB:
            <input type="number" name="serialUb" min="1000" value="{{old('serialUb')}}">
        </label>

        @error('serialUb')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label>
            Serial TMS:
            <input type="number" name="serialTms" value="{{old('serialTms')}}">
        </label>

        <br>
        <br>

        <label>
            Serial UPS:
            <input type="number" name="serialUps" value="{{old('serialUps')}}">
        </label>

        <br>
        <br>

        <label>
            Version RPI:
            <input type="text" name="versionRpi" value="{{old('versionRpi')}}">
        </label>

        <br>
        <br>

        <label>
            Version Firmware:
            <input type="text" name="versionFirmware" value="{{old('versionFirmware')}}">
        </label>

        <br>
        <br>

        <label>
            Técnico:
            <input type="number" name="tecnico" value="{{old('tecnico')}}">
        </label>

        @error('tecnico')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label>
            Faena:
            <input type="number" name="faena" value="{{old('faena')}}">
        </label>

        @error('faena')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label>
            Falla:
            <input type="text" name="falla" value="{{old('falla')}}">
        </label>

        <br>
        <br>

        <label>
            Descripcion Falla:
            <textarea name="descripcionFalla">{{old('descripcionFalla')}}</textarea>
        </label>

        <br>
        <br>

        <label>
            Horas de Reparacion:
            <input type="text" name="hReparacion" value="{{old('hReparacion')}}">
        </label>

        <br>
        <br>

        <label for="fechaIngreso">
            Fecha de ingreso:
        </label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" value="{{old('fechaIngreso')}}">

        @error('fechaIngreso')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <button type="submit">
            Crear Orden
        </button>

    </form>
</x-app-layout>
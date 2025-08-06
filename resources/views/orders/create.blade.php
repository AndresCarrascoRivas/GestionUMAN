<x-app-layout>
    <h1>Formulario para crear una nueva orden</h1>

    <form action="{{route('ordenes.store')}}" method="POST">

        @csrf

        <div>
        <label class="block font-semibold">Serial UB:</label>
        <select id="serialUb" name="serialUb" class="w-64 px-2 py-1 border rounded select2 @error('serialUb') border-red-500 @enderror">
            <option value="">-- Selecciona un equipo UB --</option>
            @foreach ($equiposUb as $equipo)
                <option value="{{ $equipo->serialUb }}" {{ old('serialUb') == $equipo->serialUb ? 'selected' : '' }}>
                    {{ $equipo->serialUb }}
                </option>
            @endforeach
        </select>
        @error('serialUb')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        </div>

        <script>
            $(document).ready(function() {
                $('#serialUb').select2({
                    placeholder: "Busca o selecciona un equipo UB",
                    allowClear: true,
                    width: 'style'
                });
            });
        </script>


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
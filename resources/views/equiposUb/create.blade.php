<x-app-layout>
    <h1>Formulario para ingresar un equipo</h1>

    <form action="{{route('equiposUb.store')}}" method="POST">

        @csrf

        <label>
            Serial UB:
            <input type="text" name="serialUb"  value="{{old('serialUb')}}">
        </label>

        @error('serialUb')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
                <option value="operativo" selected>Operativo</option>
                <option value="inactivo">Inactivo</option>
                <option value="dañado">Dañado</option>
            </select>
        </div>

        <br>
        <br>

        <div class="mb-3">
            <label for="versionUman" class="form-label">Versión UMAN</label>
            <select name="versionUman" id="versionUman" class="form-select">
                <option value="UMAN BLUE" {{ old('versionUman') == 'UMAN BLUE' ? 'selected' : '' }}>UMAN BLUE</option>
                <option value="UMAN CM4" {{ old('versionUman') == 'UMAN CM4' ? 'selected' : '' }}>UMAN CM4</option>
            </select>
        </div>

        <br>
        <br>

        <label>
            Version Raspberry:
            <input type="text" name="versionraspberry"  value="{{old('versionraspberry')}}">
        </label>

        @error('versionraspberry')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <div class="mb-3" id="upsField" style="display: none;">
            <label for="versioUps" class="form-label">Versión UPS</label>
            <input type="text" name="versioUps" id="versioUps" class="form-control" value="{{ old('versioUps') }}">
            @error('versioUps')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <script>
            const versionUmanSelect = document.getElementById('versionUman');
            const upsField = document.getElementById('upsField');

            function toggleUpsField() {
                upsField.style.display = versionUmanSelect.value === 'UMAN BLUE' ? 'block' : 'none';
            }

            versionUmanSelect.addEventListener('change', toggleUpsField);
            window.addEventListener('DOMContentLoaded', toggleUpsField);
        </script>

        <br>
        <br>

        <label>
            Pcb Uman:
            <input type="text" name="PcbUman"  value="{{old('PcbUman')}}">
        </label>

        @error('PcbUman')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label>
            Pcb Antena:
            <input type="text" name="PcbAntena"  value="{{old('PcbAntena')}}">
        </label>

        @error('PcbAntena')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label>
            Radiometrix:
            <input type="text" name="Radiometrix"  value="{{old('Radiometrix')}}">
        </label>

        @error('Radiometrix')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>

        <label for="fechaFabricacion">
            Fecha de Fabricacion:
        </label>
        <input type="date" id="fechaFabricacion" name="fechaFabricacion" value="{{old('fechaFabricacion')}}">

        @error('fechaFabricacion')
            <p>{{$message}}</p>
        @enderror

        <br>
        <br>
        
        <button type="submit">
            Ingresar Equipo UMAN
        </button>

    </form>
</x-app-layout>
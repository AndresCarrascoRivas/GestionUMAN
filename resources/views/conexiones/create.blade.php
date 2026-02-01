<x-app-layout>

    @section('title', 'Nueva Conexión')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">➕ Registrar nueva conexión</h2>

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hay problemas con los datos ingresados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('conexiones.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="faena_id" class="form-label fw-bold">Faena</label>
                    <select name="faena_id" id="faena_id" class="form-select" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($faenas as $faena)
                            <option value="{{ $faena->id }}" {{ old('faena_id') == $faena->id ? 'selected' : '' }}>
                                {{ $faena->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label fw-bold">Tipo de conexión</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="">-- Seleccione --</option>
                        <option value="wifi" {{ old('tipo') == 'wifi' ? 'selected' : '' }}>WiFi</option>
                        <option value="ethernet" {{ old('tipo') == 'ethernet' ? 'selected' : '' }}>Ethernet</option>
                        <option value="bam" {{ old('tipo') == 'bam' ? 'selected' : '' }}>BAM (3G/4G)</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="ip" class="form-label fw-bold">IP</label>
                    <input type="text" name="ip" id="ip" class="form-control" value="{{ old('ip') }}">
                </div>
                <div class="col-md-4">
                    <label for="gateway" class="form-label fw-bold">Gateway</label>
                    <input type="text" name="gateway" id="gateway" class="form-control" value="{{ old('gateway') }}">
                </div>
                <div class="col-md-4">
                    <label for="netmask" class="form-label fw-bold">Netmask</label>
                    <input type="text" name="netmask" id="netmask" class="form-control" value="{{ old('netmask') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="operador" class="form-label fw-bold">Operador</label>
                    <input type="text" name="operador" id="operador" class="form-control" value="{{ old('operador') }}">
                </div>
                <div class="col-md-6">
                    <label for="apn" class="form-label fw-bold">APN</label>
                    <input type="text" name="apn" id="apn" class="form-control" value="{{ old('apn') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="apn_user" class="form-label fw-bold">APN Usuario</label>
                    <input type="text" name="apn_user" id="apn_user" class="form-control" value="{{ old('apn_user') }}">
                </div>
                <div class="col-md-6">
                    <label for="apn_pass" class="form-label fw-bold">APN Password</label>
                    <input type="text" name="apn_pass" id="apn_pass" class="form-control" value="{{ old('apn_pass') }}">
                </div>
            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('conexiones.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                <button type="submit" class="btn btn-success">💾 Guardar</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoSelect = document.getElementById('tipo');

            // Grupos de campos
            const grupoRed = ['ip', 'gateway', 'netmask'];
            const grupoCelular = ['operador', 'apn', 'apn_user', 'apn_pass'];

            function toggleCampos() {
                const tipo = tipoSelect.value;

                if (tipo === 'wifi' || tipo === 'ethernet') {
                    // Mostrar red, ocultar celular
                    grupoRed.forEach(id => document.getElementById(id).closest('.col-md-4, .col-md-6').style.display = '');
                    grupoCelular.forEach(id => document.getElementById(id).closest('.col-md-6').style.display = 'none');
                } else if (tipo === 'bam') {
                    // Mostrar celular, ocultar red
                    grupoRed.forEach(id => document.getElementById(id).closest('.col-md-4, .col-md-6').style.display = 'none');
                    grupoCelular.forEach(id => document.getElementById(id).closest('.col-md-6').style.display = '');
                } else {
                    // Si no hay selección, mostrar todo
                    grupoRed.forEach(id => document.getElementById(id).closest('.col-md-4, .col-md-6').style.display = '');
                    grupoCelular.forEach(id => document.getElementById(id).closest('.col-md-6').style.display = '');
                }
            }

            // Ejecutar al cargar y al cambiar
            toggleCampos();
            tipoSelect.addEventListener('change', toggleCampos);
        });
    </script>

</x-app-layout>
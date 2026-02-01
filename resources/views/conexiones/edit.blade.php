<x-app-layout>

    @section('title', 'Editar Conexión')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">✏️ Editar conexión #{{ $conexion->id }}</h2>

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

        <form action="{{ route('conexiones.update', $conexion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="faena_id" class="form-label fw-bold">Faena</label>
                    <select name="faena_id" id="faena_id" class="form-select" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($faenas as $faena)
                            <option value="{{ $faena->id }}" 
                                {{ old('faena_id', $conexion->faena_id) == $faena->id ? 'selected' : '' }}>
                                {{ $faena->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label fw-bold">Tipo de conexión</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="wifi" {{ old('tipo', $conexion->tipo) == 'wifi' ? 'selected' : '' }}>WiFi</option>
                        <option value="ethernet" {{ old('tipo', $conexion->tipo) == 'ethernet' ? 'selected' : '' }}>Ethernet</option>
                        <option value="bam" {{ old('tipo', $conexion->tipo) == 'bam' ? 'selected' : '' }}>BAM (3G/4G)</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="ip" class="form-label fw-bold">IP</label>
                    <input type="text" name="ip" id="ip" class="form-control" value="{{ old('ip', $conexion->ip) }}">
                </div>
                <div class="col-md-4">
                    <label for="gateway" class="form-label fw-bold">Gateway</label>
                    <input type="text" name="gateway" id="gateway" class="form-control" value="{{ old('gateway', $conexion->gateway) }}">
                </div>
                <div class="col-md-4">
                    <label for="netmask" class="form-label fw-bold">Netmask</label>
                    <input type="text" name="netmask" id="netmask" class="form-control" value="{{ old('netmask', $conexion->netmask) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="operador" class="form-label fw-bold">Operador</label>
                    <input type="text" name="operador" id="operador" class="form-control" value="{{ old('operador', $conexion->operador) }}">
                </div>
                <div class="col-md-6">
                    <label for="apn" class="form-label fw-bold">APN</label>
                    <input type="text" name="apn" id="apn" class="form-control" value="{{ old('apn', $conexion->apn) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="apn_user" class="form-label fw-bold">APN Usuario</label>
                    <input type="text" name="apn_user" id="apn_user" class="form-control" value="{{ old('apn_user', $conexion->apn_user) }}">
                </div>
                <div class="col-md-6">
                    <label for="apn_pass" class="form-label fw-bold">APN Password</label>
                    <input type="text" name="apn_pass" id="apn_pass" class="form-control" value="{{ old('apn_pass', $conexion->apn_pass) }}">
                </div>
            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('conexiones.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                <button type="submit" class="btn btn-success">💾 Actualizar</button>
            </div>
        </form>
    </div>

</x-app-layout>
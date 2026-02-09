{{-- Versión --}}
<div class="mb-3">
    <label for="version" class="form-label">Versión</label>
    <input type="text" 
           name="version" 
           id="version" 
           class="form-control @error('version') is-invalid @enderror"
           value="{{ old('version', $versionsd->version ?? '') }}" 
           required>
    @error('version')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Descripción --}}
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" 
              id="descripcion" 
              rows="3" 
              class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $versionsd->descripcion ?? '') }}</textarea>
    @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- URL --}}
<div class="mb-3">
    <label for="url" class="form-label">URL de descarga</label>
    <input type="url" 
           name="url" 
           id="url" 
           class="form-control @error('url') is-invalid @enderror"
           value="{{ old('url', $versionsd->url ?? '') }}">
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">
        Ingresa el enlace directo al archivo de la imagen SD (ejemplo: https://servidor.com/sd_v1.img).
    </small>
</div>

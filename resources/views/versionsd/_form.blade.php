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

{{-- Nombre --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" 
           name="name" 
           id="name" 
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $versionuman->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Descripción --}}
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" 
              id="descripcion" 
              rows="3" 
              class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $versionuman->descripcion ?? '') }}</textarea>
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
           value="{{ old('url', $versionuman->url ?? '') }}">
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">
        Ingresa el enlace directo al archivo de la versión (ejemplo: https://servidor.com/uman_v1.zip).
    </small>
</div>

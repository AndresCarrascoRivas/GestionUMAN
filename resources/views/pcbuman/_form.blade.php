<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $pcbuman->name ?? '') }}"
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea 
        name="descripcion" 
        id="descripcion" 
        class="form-control @error('descripcion') is-invalid @enderror"
        rows="3"
    >{{ old('descripcion', $pcbuman->descripcion ?? '') }}</textarea>

    @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

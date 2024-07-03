<div class="form-container">
    <h1 class="text-center">{{ $modo }} propietario</h1>
    <div class="form-group">
        <label for="cedula">Cédula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" value="{{ isset($propietario->cedula) ? $propietario->cedula : '' }}" required pattern="\d+" title="Solo números">
    </div>
    <div class="form-group">
        <label for="primer_nombre">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="{{ isset($propietario->primer_nombre) ? $propietario->primer_nombre : '' }}" required maxlength="25" pattern="[A-Za-z\s]+" title="Solo letras, máximo 25 caracteres">
    </div>
    <div class="form-group">
        <label for="segundo_nombre">Segundo Nombre</label>
        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="{{ isset($propietario->segundo_nombre) ? $propietario->segundo_nombre : '' }}" maxlength="25" pattern="[A-Za-z\s]+" title="Solo letras, máximo 25 caracteres">
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ isset($propietario->apellidos) ? $propietario->apellidos : '' }}" required maxlength="50" pattern="[A-Za-z\s]+" title="Solo letras, máximo 50 caracteres">
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ isset($propietario->direccion) ? $propietario->direccion : '' }}" required maxlength="100">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ isset($propietario->telefono) ? $propietario->telefono : '' }}" required pattern="\d+" title="Solo números">
    </div>
    <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ isset($propietario->ciudad) ? $propietario->ciudad : '' }}" required maxlength="50" pattern="[A-Za-z\s]+" title="Solo letras, máximo 50 caracteres">
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="{{ $modo }}">
        <a href="{{ url('/propietarios/') }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>

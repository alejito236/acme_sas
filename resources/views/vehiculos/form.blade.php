<div class="form-container">
    <h1 class="text-center">{{ $modo }} vehículo</h1>
    <div class="form-group">
        <label for="placa">Placa</label>
        <input type="text" class="form-control" id="placa" name="placa" value="{{ isset($vehiculo->placa) ? $vehiculo->placa : '' }}" required pattern="[A-Za-z]{3}-\d{3}" title="Formato: 3 letras seguidas de un guión y 3 números">
    </div>
    <div class="form-group">
        <label for="color">Color</label>
        <input type="text" class="form-control" id="color" name="color" value="{{ isset($vehiculo->color) ? $vehiculo->color : '' }}" required maxlength="25" pattern="[A-Za-z\s]+" title="Solo letras, máximo 25 caracteres">
    </div>
    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($vehiculo->marca) ? $vehiculo->marca : '' }}" required maxlength="25" pattern="[A-Za-z\s]+" title="Solo letras, máximo 25 caracteres">
    </div>
    <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" id="tipo" name="tipo" required>
            <option value="particular" {{ isset($vehiculo->tipo) && $vehiculo->tipo == 'particular' ? 'selected' : '' }}>Particular</option>
            <option value="publico" {{ isset($vehiculo->tipo) && $vehiculo->tipo == 'publico' ? 'selected' : '' }}>Público</option>
        </select>
    </div>
    <div class="form-group">
        <label for="conductor_id">Conductor</label>
        <select class="form-control" id="conductor_id" name="conductor_id" required>
            @foreach ($conductores as $conductor)
                <option value="{{ $conductor->id }}" {{ isset($vehiculo->conductor_id) && $vehiculo->conductor_id == $conductor->id ? 'selected' : '' }}>
                    {{ $conductor->primer_nombre }} {{ $conductor->apellidos }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="propietario_id">Propietario</label>
        <select class="form-control" id="propietario_id" name="propietario_id" required>
            @foreach ($propietarios as $propietario)
                <option value="{{ $propietario->id }}" {{ isset($vehiculo->propietario_id) && $vehiculo->propietario_id == $propietario->id ? 'selected' : '' }}>
                    {{ $propietario->primer_nombre }} {{ $propietario->apellidos }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="{{ $modo }}">
        <a href="{{ url('/vehiculos/') }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>

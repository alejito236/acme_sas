@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('/conductores/create') }}" class="btn btn-primary">
            Registrar un nuevo conductor
        </a>

        <form method="GET" action="{{ url('/conductores') }}" class="form-inline" id="filterForm">
            <div class="form-group mb-2">
                <input class="form-control form-control-sm mr-2" type="search" placeholder="Buscar" aria-label="Buscar" name="search" value="{{ $search }}">
            </div>
            <div class="form-group mb-2">
                <select class="form-control form-control-sm custom-select-small mr-2" name="paginate" id="paginateSelect">
                    <option value="10" {{ $paginate == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ $paginate == 15 ? 'selected' : '' }}>15</option>
                    <option value="20" {{ $paginate == 20 ? 'selected' : '' }}>20</option>
                </select>
            </div>
            <button class="btn btn-outline-success btn-sm mb-2" type="submit">Buscar</button>
        </form>
    </div>

    <table class="table table-light mt-3">
        <thead class="thead-light">
            <tr>
                <th>Cédula</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conductores as $conductor)
            <tr>
                <td>{{ $conductor->cedula }}</td>
                <td>{{ $conductor->primer_nombre }}</td>
                <td>{{ $conductor->segundo_nombre }}</td>
                <td>{{ $conductor->apellidos }}</td>
                <td>{{ $conductor->direccion }}</td>
                <td>{{ $conductor->telefono }}</td>
                <td>{{ $conductor->ciudad }}</td>
                <td>
                    <a href="{{ url('/conductores/'.$conductor->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ url('/conductores/'.$conductor->id) }}" method="post" style="display:inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn  btn-secondary btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $conductores->appends(['search' => $search, 'paginate' => $paginate])->links() }}
</div>

<!-- Custom CSS -->
<style>
    .custom-select-small {  
        font-size: 12px;
        padding: 0.25rem 0.5rem;
        height: auto;
    }
</style>

<!-- JavaScript to submit form on select change -->
<script>
    document.getElementById('paginateSelect').addEventListener('change', function() {
        document.getElementById('filterForm').submit();
    });
</script>
@endsection

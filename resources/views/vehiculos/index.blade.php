@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('/vehiculos/create') }}" class="btn btn-primary">
            Registrar un nuevo vehículo
        </a>

        <form method="GET" action="{{ url('/vehiculos') }}" class="form-inline" id="filterForm">
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
            <button class="btn btn-outline-primary btn-sm mb-2" type="submit">Buscar</button>
        </form>
    </div>

    <table class="table table-light mt-3">
        <thead class="thead-light">
            <tr>
                <th>Placa</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Conductores ID</th>
                <th>Propietarios ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->placa }}</td>
                <td>{{ $vehiculo->color }}</td>
                <td>{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->tipo }}</td>
                <td>{{ $vehiculo->conductores_id }}</td>
                <td>{{ $vehiculo->propietarios_id }}</td>
                <td>
                    <a href="{{ url('/vehiculos/'.$vehiculo->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ url('/vehiculos/'.$vehiculo->id) }}" method="post" style="display:inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-secondary btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vehiculos->appends(['search' => $search, 'paginate' => $paginate])->links() }}
</div>


<style>
    .custom-select-small {
        font-size: 12px;
        padding: 0.25rem 0.5rem;
        height: auto;
    }

    .pagination a, .pagination span {
        font-size: 14px;
        padding: 5px 10px; 
        margin: 0 2px; 
        text-decoration: none; 
        color: #007bff; 
    }

    .pagination a:hover, .pagination span:hover {
        background-color: #f0f4f8; 
        border-radius: 5px; 
    }

    .pagination .active span {
        background-color: #007bff; 
        color: #fff; 
        border-radius: 5px; 
    }
</style>


<script>
    document.getElementById('paginateSelect').addEventListener('change', function() {
        document.getElementById('filterForm').submit();
    });
</script>
@endsection

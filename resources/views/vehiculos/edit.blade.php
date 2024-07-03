@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <form action="{{ url('/vehiculos/'.$vehiculo->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('vehiculos.form', ['modo' => 'Editar'])
        </form>
    </div>
</div>

<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background: #f8f9fa;
    }
</style>
@endsection

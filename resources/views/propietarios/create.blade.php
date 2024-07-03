@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="form-container">
        <form action="{{ url('/propietarios') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('propietarios.form', ['modo' => 'Crear'])
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

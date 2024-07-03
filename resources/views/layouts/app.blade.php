<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ACME S.A.S') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo:100,200,400|Source+Sans+Pro:300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #fff;
            color: #000;
        }
        .main-content {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .sidebar .nav-link {
            margin: 10px 0;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 20px;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        .header div {
            color: #000;
            font-family: 'Exo', sans-serif;
            font-size: 24px;
            font-weight: 200;
        }
        .header div span {
            color: #5379fa !important;
        }
        .header-right {
            display: flex;
            align-items: center;
        }
        .header-right .btn-logout {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>ACME<span>S.A.S</span></div>
        <div class="header-right">
            @if(Auth::check())
                <span>{{ Auth::user()->email }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ml-2">
                    @csrf
                    <button type="submit" class="btn  btn-danger btn-logout">Cerrar sesión</button>
                </form>
            @endif
        </div>
    </div>
    <div class="main-content">
        <div class="sidebar">
            <nav class="nav flex-column">
                <a class="nav-link btn btn-light" href="{{ url('/conductores') }}">Conductores</a>
                <a class="nav-link btn btn-light" href="{{ url('/vehiculos') }}">Vehículos</a>
                <a class="nav-link btn btn-light" href="{{ url('/propietarios') }}">Propietarios</a>
            </nav>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

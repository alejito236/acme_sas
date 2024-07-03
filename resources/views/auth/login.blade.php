<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ACME S.A.S') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo:100,200,400|Source+Sans+Pro:300,400,700" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f0f4f8, #d9e2ec); /* Gradiente de fondo claro */
            color: #333; /* Texto oscuro para mejor legibilidad */
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .body {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: none; /* Eliminado para usar el gradiente del body */
            z-index: 0;
        }

        .grad {
            display: none; /* Eliminado */
        }

        .header {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .header div {
            color: #333; /* Texto oscuro para mejor legibilidad */
            font-family: 'Exo', sans-serif;
            font-size: 35px;
            font-weight: 200;
        }

        .header div span {
            color: #5379fa !important;
        }

        .login {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: auto;
            width: 300px; /* Ajustado el ancho del formulario */
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* Fondo translúcido claro */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            z-index: 2;
        }

        .login input[type=text], .login input[type=email], .login input[type=password] {
            width: 100%; /* Ajustado al 100% del ancho del contenedor */
            height: 30px; /* Ajustado la altura de los inputs */
            background: transparent;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            font-family: 'Exo', sans-serif;
            font-size: 14px; /* Ajustado el tamaño de fuente */
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=submit] {
            width: 100%; /* Ajustado al 100% del ancho del contenedor */
            height: 35px;
            background: #5379fa;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 14px; /* Ajustado el tamaño de fuente */
            font-weight: 400;
            padding: 6px;
            margin-top: 10px;
        }

        .login input[type=submit]:hover {
            background: #3a5bbf;
        }

        .login input[type=submit]:active {
            background: #2e47a1;
        }

        .login input[type=text]:focus, .login input[type=email]:focus, .login input[type=password]:focus {
            outline: none;
            border: 1px solid #5379fa;
        }

        .login input[type=submit]:focus {
            outline: none;
        }

        .register-link {
            display: block;
            margin-top: 10px;
            color: #333;
            text-align: center;
            font-family: 'Exo', sans-serif;
            font-size: 14px;
        }

        .register-link a {
            color: #5379fa;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        ::-webkit-input-placeholder {
            color: #999;
        }

        ::-moz-input-placeholder {
            color: #999;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>ACME<span>S.A.S</span></div>
    </div>
    <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" placeholder="Correo" name="email" value="{{ old('email') }}" required autofocus><br>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" placeholder="Clave" name="password" required><br>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" value="Iniciar sesión">
        </form>
        <div class="register-link">
            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
        </div>
    </div>
</body>
</html>

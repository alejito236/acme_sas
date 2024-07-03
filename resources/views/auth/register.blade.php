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
            width: 400px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* Fondo translúcido claro */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            z-index: 2;
        }

        .login input[type=text], .login input[type=email], .login input[type=password] {
            width: 100%;
            height: 40px;
            background: transparent;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .login input[type=submit] {
            width: 100%;
            height: 40px;
            background: #5379fa;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 10px;
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

        .invalid-feedback {
            color: #e3342f;
            font-size: 12px;
            margin-top: 5px;
            display: block;
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
        <div><a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">ACME<span>S.A.S</span></a></div>
    </div>
    <div class="login">
        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            <input id="nombre" type="text" placeholder="Nombre" class="@error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios.">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="email" type="email" placeholder="Correo" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password" placeholder="Clave" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password-confirm" type="password" placeholder="Confirmar clave" name="password_confirmation" required autocomplete="new-password">
            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>

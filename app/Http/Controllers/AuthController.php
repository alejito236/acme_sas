<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['message' => 'Login successful', 'user' => $user], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function checkConnection()
    {
        try {
            DB::connection()->getPdo();
            return response()->json(['message' => 'Conexión exitosa a la base de datos'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se pudo conectar a la base de datos'], 500);
        }
    }
}

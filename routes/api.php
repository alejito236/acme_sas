<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\PropietariosController;
use App\Http\Controllers\ConductoresController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('vehiculos', VehiculosController::class);
Route::apiResource('propietarios', PropietariosController::class);
Route::apiResource('conductores', ConductoresController::class);

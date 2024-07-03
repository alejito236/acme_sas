<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\PropietariosController;
use App\Http\Controllers\ConductoresController;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/vehiculos', function () {
//     return view('vehiculos.index');
// });

// Route::get('/vehiculos/create', [VehiculosController::class,'create'] );

Route::resource('vehiculos',VehiculosController::class )-> middleware('auth');

Auth::routes(['reset'=>false,]);

Route::get('/home', [VehiculosController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/',[VehiculosController::class, 'index'])-> name('home');
});

Route::resource('propietarios', PropietariosController::class)->middleware('auth');

Route::resource('conductores', ConductoresController::class)->middleware('auth');
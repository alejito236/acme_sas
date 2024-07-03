<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehiculosExport;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Conductor;
use App\Models\Propietario;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $paginate = $request->get('paginate', 10); 

        $vehiculos = Vehiculo::where('placa', 'like', "%$search%")
            ->orWhere('color', 'like', "%$search%")
            ->orWhere('marca', 'like', "%$search%")
            ->orWhere('tipo', 'like', "%$search%")
            ->orWhere('conductores_id', 'like', "%$search%")
            ->orWhere('propietarios_id', 'like', "%$search%")
            ->paginate($paginate);

        $datos['vehiculos'] = $vehiculos;
        $datos['search'] = $search;
        $datos['paginate'] = $paginate;

        return view('vehiculos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conductores = Conductor::all();
        $propietarios = Propietario::all();
        return view('vehiculos.create',compact('conductores', 'propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|regex:/^[A-Za-z]{3}-\d{3}$/',
            'color' => 'required|max:25|regex:/^[A-Za-z\s]+$/',
            'marca' => 'required|max:25|regex:/^[A-Za-z\s]+$/',
            'tipo' => 'required|in:particular,publico',
            'conductor_id' => 'required|exists:conductores,id',
            'propietario_id' => 'required|exists:propietarios,id'
        ]);
    
        $datosvehiculo = $request->except('_token');
        Vehiculo::create($datosvehiculo);
    
        return redirect('vehiculos')->with('mensaje', 'Vehículo guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $conductores = Conductor::all();
        $propietarios = Propietario::all();
        return view('vehiculos.edit', compact('vehiculo', 'conductores', 'propietarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosvehiculo = request()->except(['_token','_method']);
        Vehiculo::where('id', '=', $id)->update($datosvehiculo);
        
        return redirect('vehiculos')->with('mensaje', 'Vehículo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehiculo::destroy($id);
        return redirect('vehiculos')->with('mensaje','Vehiculo eliminado con exito');
    }
    
}

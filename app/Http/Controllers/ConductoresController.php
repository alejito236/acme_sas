<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $paginate = $request->get('paginate', 10); 

        $conductores = Conductor::where('cedula', 'like', "%$search%")
            ->orWhere('primer_nombre', 'like', "%$search%")
            ->orWhere('segundo_nombre', 'like', "%$search%")
            ->orWhere('apellidos', 'like', "%$search%")
            ->orWhere('direccion', 'like', "%$search%")
            ->orWhere('telefono', 'like', "%$search%")
            ->orWhere('ciudad', 'like', "%$search%")
            ->paginate($paginate);

        $datos['conductores'] = $conductores;
        $datos['search'] = $search;
        $datos['paginate'] = $paginate;

        return view('conductores.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conductores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosConductor = request()->except('_token');
        Conductor::insert($datosConductor);
        return redirect('conductores')->with('mensaje', 'Conductor guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Esta función puede quedarse vacía si no la necesitas
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conductor = Conductor::findOrFail($id);
        return view('conductores.edit', compact('conductor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosConductor = request()->except(['_token','_method']);
        Conductor::where('id', '=', $id)->update($datosConductor);
        
        return redirect('conductores')->with('mensaje', 'Conductor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Conductor::destroy($id);
        return redirect('conductores')->with('mensaje','Conductor eliminado con éxito');
    }
}

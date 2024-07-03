<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $paginate = $request->get('paginate', 10); 

        $propietarios = Propietario::where('cedula', 'like', "%$search%")
            ->orWhere('primer_nombre', 'like', "%$search%")
            ->orWhere('segundo_nombre', 'like', "%$search%")
            ->orWhere('apellidos', 'like', "%$search%")
            ->orWhere('direccion', 'like', "%$search%")
            ->orWhere('telefono', 'like', "%$search%")
            ->orWhere('ciudad', 'like', "%$search%")
            ->paginate($paginate);

        $datos['propietarios'] = $propietarios;
        $datos['search'] = $search;
        $datos['paginate'] = $paginate;

        return view('propietarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosPropietario = request()->except('_token');
        Propietario::insert($datosPropietario);
        return redirect('propietarios')->with('mensaje', 'Propietario guardado con éxito');
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
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosPropietario = request()->except(['_token','_method']);
        Propietario::where('id', '=', $id)->update($datosPropietario);
        
        return redirect('propietarios')->with('mensaje', 'Propietario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Propietario::destroy($id);
        return redirect('propietarios')->with('mensaje','Propietario eliminado con éxito');
    }
}

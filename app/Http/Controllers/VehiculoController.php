<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

/**
 * Class VehiculoController
 * @package App\Http\Controllers
 */
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::paginate();

        return view('vehiculo.index', compact('vehiculos'))
            ->with('i', (request()->input('page', 1) - 1) * $vehiculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = new Vehiculo();
        $clientes = Cliente::pluck('nombre', 'id');
        $vehiculos = Vehiculo::pluck('placa');
        return view('vehiculo.create', compact('vehiculo','clientes','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vehiculo::$rules);

        $vehiculo = Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo agragado con exito!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        $clientes = Cliente::pluck('nombre', 'id');
        $vehiculos = Vehiculo::pluck('placa');

        return view('vehiculo.edit', compact('vehiculo', 'clientes','vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        request()->validate(Vehiculo::$rules);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo modificado con exito!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id)->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo eliminado con exito!');
    }
}

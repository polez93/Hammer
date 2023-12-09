<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Recibo;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ReciboController
 * @package App\Http\Controllers
 */
class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = Carbon::now()->toDateString();
        $recibos = Recibo::where('fecha', $hoy)->paginate();

        return view('recibo.index', compact('recibos'))
            ->with('i', (request()->input('page', 1) - 1) * $recibos->perPage());
    }

    public function create()
    {
        $recibo = new Recibo();
        $placas = Vehiculo::where('id_cliente', 5)->pluck('placa','id');
        $productos = Producto::pluck('nombre','id');
        return view('recibo.create', compact('recibo','placas','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Recibo::$rules);

        $recibo = Recibo::create($request->all());

        return redirect()->route('recibos.create')
            ->with('success', 'Recibo de material Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Recibo::find($id);

        return view('recibo.show', compact('recibo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recibo = Recibo::find($id);

        return view('recibo.edit', compact('recibo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recibo $recibo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recibo $recibo)
    {
        request()->validate(Recibo::$rules);

        $recibo->update($request->all());

        return redirect()->route('recibos.index')
            ->with('success', 'Recibo modificado con exito!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recibo = Recibo::find($id)->delete();

        return redirect()->route('recibos.index')
            ->with('success', 'Recibo eliminado con exito!');
    }
}

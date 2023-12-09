<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Vehiculo;

use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMailable;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::where('esto_pedido','C')->paginate();
        

        return view('venta.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
    }

        /**
     * Display a listing of the resource.
     *a listing showed in the module BASCULA
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBascula()
    {
        $ventas = Venta::where('esto_pedido', 'P')->paginate();

        return view('venta.index', compact('ventas'))
        ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());;
    }

   

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta();
        return view('venta.create', compact('venta'));
    }

    /**
     * Show the form for creating a new resource.
     *checkin in the module Bascula
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $venta = new Venta();
        $query = $request->input('query');
        $placa = $query;
        $vehiculo = Vehiculo::where('placa', $query)->first();
        $clientes = Cliente::where('id', $vehiculo->id_cliente)->first();
        $productos = Producto::All();
           
        return view('venta.create', compact('venta','vehiculo','clientes','productos'));
    }

    public function autocomplete(Request $request)
    {   
        $ventasP = Venta::where('esto_pedido', 'P')->get();
        $placasP = $ventasP->pluck('vehiculo.placa');
        $term = $request->input('term');
        if($term <> ''){
            $results = Vehiculo::where('placa', 'LIKE', '%' . $term . '%')
            ->whereNot('id_cliente',5)
            ->whereNot('placa',$placasP)
            ->take(3)
            ->get(); // Pluck devuelve un array con las primeras 5 placas
        }else{
            $results = [];
        }

        

        return response()->json($results);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $venta = Venta::create($request->all());
        return redirect()->route('bascula')
        ->with('success', 'Venta Registrada!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
   
        $data = [
            'venta' => $venta,
                ];
        $html = view('venta.show', $data)->render();

        $filename = 'venta_' . $venta->cliente->nombre.$venta->fecha_salida.'.pdf';

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        Mail::to('lopez.edu@yandex.ru')->send(new FacturaMailable($venta, $pdf));
        // $this->descargarFactura($pdf,$venta->id);
        // return redirect()->route('bascula')
        // ->with('success', 'venta realizada con exito.');
        return $pdf->download('venta_'.$filename.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);

        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);

        $venta->update([
        'cliente_id' => $request->input('cliente_id'),
		'producto_id' => $request->input('producto_id'),
		'vehiculo_id' => $request->input('vehiculo_id'),
		'user_id' => $request->input('user_id'),
		'peso_int' => $request->input('peso_int'),
		'hora_int' => $request->input('hora_int'),
		'fecha_int' => $request->input('fecha_int'),
		'tipo_ventas' => $request->input('tipo_ventas'),
		'esto_pedido' => $request->input('esto_pedido'),
		'estado' => $request->input('estado'),
        'peso_sal' => $request->input('peso_sal'),
        'peso_neto' => $request->input('peso_neto'),
        'total' => $request->input('total'),
        'fecha_salida' => $request->input('fecha_salida'),
        'hora_salida' => $request->input('hora_salida'),
        ]);
        $url = '/storage/empresa/minero.jpg';
        $data = [
            'venta' => $venta,
            'url' => $url,
                ];
        $html = view('venta.show', $data)->render();

        $filename = 'venta_' . $venta->cliente->nombre.$venta->fecha_salida.'.pdf';

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        Mail::to('lopez.edu@yandex.ru')->send(new FacturaMailable($venta, $pdf));
        // $this->descargarFactura($pdf,$venta->id);
        // return redirect()->route('bascula')
        // ->with('success', 'venta realizada con exito.');
        return $pdf->download('venta_'.$filename.'.pdf');
       
    }

    public function descargarFactura($pdf,$id)
    {
        return $pdf->download('venta_'.$id.'.pdf');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada con exito!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class mailHammerController extends Controller
{
    public function enviarCorreo($id)
    {
        $venta = Venta::find($id);
        $data = [
            'venta' => $venta,
                ];
        $html = view('venta.show', $data)->render();

        $filename = 'venta_' . $venta->cliente->nombre.$venta->fecha_salida.'.pdf';

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();   
     }
}

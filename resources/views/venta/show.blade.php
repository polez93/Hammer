<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<style>
    .text-primario {
        color: #4e2703;
        font-size: 18pt;
    }

    .text-1 {
        color: #2b1501;
        font-size: 12pt;
    }

    .text-2 {
        color: #ef7503;
        font-size: 14pt;
    }

    .text-center {
        text-align: center;
    }

    .text-total {
        color: #4e2703;
    }
   th, td {
    border: 1px solid;
    border-radius: 2%;
    box-shadow: 5px 5px 5px #2b1501;

    }
    table{
        width: 100%;
        border: 3px solid;
        border-radius: 5%;
        padding: 30px;
    }

</style>
    <section>
    
            <table>
                <thead>
                    <span class="text-primario">Factura de Venta No. {{$venta->id}}</span>  
                             
                </thead>
           
                <tbody>
                    <tr>
                        <td>
                            <h3 class="text-1">Cliente:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->cliente->nombre }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Producto:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->producto->nombre }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Placa:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->vehiculo->placa }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Hora Entrada:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->hora_int }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Fecha Entrada:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->fecha_int }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Peso Entrada:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->peso_int }} Toneladas</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Peso Salida:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->peso_sal }} Toneladas</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Peso Neto:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->peso_neto }} Toneladas</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class="text-1">Tipo venta:</h3>
                        </td>
                        <td><span class="text-2">{{ $venta->tipo_ventas }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Total:</h2>
                        </td>
                        <td>
                        <h2 class="text-center text-total">${{ $venta->total }} Cop</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
   
    </section>
</body>

</html>
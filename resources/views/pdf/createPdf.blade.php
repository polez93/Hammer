<!DOCTYPE html>
<html>
<head>
    <title>PDF para factura No. {{ $venta->id }}</title>
</head>
<body>
    <h1>Información del Cliente</h1>
    <p>Nombre: {{ $venta->cliente->nombre }}</p>
    <p>Producto: {{ $venta->producto->nombre }}</p>
    <p>Peso Neto: {{ $venta->peso_neto }} Toneladas</p>
    <p>costo: {{ $venta->total }}</p>

    <!-- Agrega más contenido según sea necesario -->
</body>
</html>
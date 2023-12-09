<div class="box box-info padding-1">
    <div class="box-body d-flex">
        <div class="form-group formulario">
            <h3 class="iconos">Datos del Cliente</h3>
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <select type="text" id="cliente" name="cliente_id" class="form-control">
                    <option value="{{$venta->cliente_id}}" selected>{{$venta->cliente->nombre}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <select name="vehiculo_id" id="placa" class="form-control">
                    <option value="{{$venta->vehiculo_id}}" selected>{{$venta->vehiculo->placa}}</option>
                </select>
            </div>
        </div>

        <div class="form-group formulario">
            <h3 class="iconos">Datos del Producto</h3>
            <div class="form-group">
                <label for="producto">Producto</label>
                <select name="producto_id" id="producto" class="form-control">
                    <option value="{{$venta->producto_id}}" selected>{{$venta->producto->nombre}}</option>
                </select>

                <div class="form-group display-none">
                    <label for="horaInt">Hora Entrada</label>
                    <input type="text" id="horaInt" name="hora_int" class="form-control" value="{{$venta->hora_int}}" readonly>
                </div>
                <div class="form-group display-none">
                    <label for="fechaInt">Fecha Entrada</label>
                    <input type="text" id="fechaInt" name="fecha_int" class="form-control" value="{{$venta->fecha_int}}" readonly>
                </div>
                <div class="form-group">
                    <label for="pesoIn">Peso entrada</label>
                    <input type="number" id="pesoIn" name="peso_int" class="form-control" value="{{$venta->peso_int}}" readonly>
                </div>
                <div class="form-group">
                    <label for="validationTooltip01">Peso Salida</label>
                    <input type="number" id="validationTooltip01" name="peso_sal" class="form-control" step="0.01" required>
                    <div class="valid-tooltip">
                        aceptado
                    </div>
                </div>
                <div class="form-group">
                    <label for="pesoNeto">Peso Neto</label>
                    <input type="number" id="pesoNeto" name="peso_neto" class="form-control" step="0.01" pattern="\d+(\.\d{1,2})?" readonly>
                </div>

            </div>
        </div>

        <div class="form-group formulario">
            <h3 class="iconos">Detalles del pedido</h3>

            <div class="form-group display-none">
                <label for="tipoVentas">Tipo Ventas</label>
                <input type="text" id="tipoVentas" name="tipo_ventas" class="form-control" value="{{$venta->tipo_ventas}}" readonly>
            </div>

            <div class="form-group">
                <label for="estadoPedido">Estado del Pedido</label>
                <input type="text" id="estadoPedido" name="esto_pedido" class="form-control" value="C" readonly>
            </div>

            <div class="form-group">
                <label for="total">total</label>
                <input type="number" id="total" name="total" class="form-control" step="0.01" pattern="\d+(\.\d{1,2})?" readonly>
            </div>
            <div class="form-group">
                <label for="fechaSal">fecha salida</label>
                <input type="text" id="FechaSal" name="fecha_salida" value="{{now()->format('Y/m/d')}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="horaSal">Hora salida</label>
                <input type="time" id="horaSal" name="hora_salida" value="{{now()->format('H:i:s')}}" class="form-control" readonly>
            </div>
            <div class="form-group display-none">
                <label for="estadoA">Estado</label>
                <input type="text" id="estadoA" name="estado" value="{{$venta->estado}}" class="form-control" readonly>
            </div>
        </div>



        <div class="form-group display-none">
            <label for="usuario">Usuario</label>
            <select type="text" id="usuario" name="user_id" class="form-control">
                <option value="{{$venta->user_id}}" selected>usuario</option>
            </select>
        </div>


    </div>



</div>
<div class="box-footer d-flex justify-content-center">
    <button type="submit" class="btn btn-secondary" id="btn-facturar" onclick="mostrarBotones()" disabled>Facturar</button>
    <a class="btn btn-secondary ms-3" id="volver" href="{{Route('bascula')}}" style="display: none;">Ir a Bascula</a>
</div>
</div>
<script>
    function mostrarBotones(){
        document.querySelector("#btn-facturar").style.display = 'none';
        document.querySelector("#volver").style.display = 'block';
       
    }
   
</script>
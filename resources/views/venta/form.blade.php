<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3 m-2 shadow p-3 mb-5 formulario">
            <h3 class="iconos">Datos del Cliente</h3>
                <label for="placa" class="w-50">Placa</label>
                <select class="form-control w-50" name="vehiculo_id" id="placa" default>
                    <option value="{{ $vehiculo->id}}" selected>{{ $vehiculo->placa}}</option>
                </select>

                <label for="cliente" class="w-25">Cliente</label>
                <select class="form-control" name="cliente_id" id="cliente">
                    <option value="{{ $clientes->id }}" selected>{{ $clientes->nombre }}</option>
                </select>
                <label for="producto">Producto</label>
                <select name="producto_id" id="producto" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 m-2 shadow p-3 mb-5 formulario">
            <h3 class="iconos">Datos del Pedido</h3>
                <div class="row">
                    <label for="validationTooltip01">Peso de Entrada</label>
                    <input type="number" id="validationTooltip01" name="peso_int" class="form-control w-50" required placeholder="Peso Entrada" step="0.01">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="estado">Estado: <br></label>
                        <input  type="text" class="m-3" id="estado" name="esto_pedido" value="P" readonly style="border: none; background: none;">
                        <label for="tipoVenta">Tipo de Venta</label>
                        <select class="form-control w-50" name="tipo_ventas" id="tipoVenta" aria-placeholder="tipo de venta">
                            <option value="CONTADO">CONTADO</option>
                            <option value="CREDITO">CREDITO</option>
                        </select>
                        <div class="form-group">
                        {{ Form::label('Estado: ') }}
                        {{ Form::text('estado', 'A', ['readonly','class' =>'m-3','style' => 'border: none; background: none;' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="horaIn">Hora Entrada: <br></label>
                        <input class="form-control" type="text" class="m-3" id="horaIn" name="hora_int" value="{{ now()->format('H:i:s') }}" readonly style="border: none; background: none;">
                        <label for="fechaIn">Fecha Entrada: <br></label>
                        <input class="form-control" type="text" class="m-3" id="fechaIn" name="fecha_int" value="{{ now()->format('Y/m/d')  }}" readonly style="border: none; background: none;">
                    </div>
                </div>
                
                
                

            </div>
            <div class="col-2 m-2 shadow p-3 mb-5 bg-white rounded display-none">
                <label for="Operador">Operador</label>
                <select name="user_id" class="form-control" id="Operador">
                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                </select>
            </div>
        </div>



    </div>
    <div class="box-footer mt20 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
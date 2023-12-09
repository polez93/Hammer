<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group display-none">
            <label for="usuario">Usuario</label>
            <input type="text" name="user_id" value="{{Auth::user()->id}}" class="form-control">
        </div>
        <div class="form-group">
            {{ Form::label('id_vehiculo') }}
            {{ Form::select('id_vehiculo',$placas, $recibo->id_vehiculo, ['class' => 'form-control' . ($errors->has('id_vehiculo') ? ' is-invalid' : ''), 'placeholder' => 'Placa']) }}
            {!! $errors->first('id_vehiculo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_producto') }}
            {{ Form::select('id_producto',$productos, $recibo->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Productos']) }}
            {!! $errors->first('id_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('peso') }}
            {{ Form::number('peso', $recibo->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control" value="{{ now()->format('Y/m/d')  }}" readonly>
            
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="text" name="hora" id="hora" value="{{ now()->format('H:i')  }}" class="form-control" readonly>
        </div>
        <div class="form-group display-none">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" value="A" readonly>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-secondary">Enviar</button>
    </div>
</div>
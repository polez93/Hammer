<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $horario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ingreso') }}
            {{ Form::time('ingreso', $horario->ingreso, ['class' => 'form-control' . ($errors->has('ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Ingreso']) }}
            {!! $errors->first('ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salida') }}
            {{ Form::time('salida', $horario->salida, ['class' => 'form-control' . ($errors->has('salida') ? ' is-invalid' : ''), 'placeholder' => 'Salida']) }}
            {!! $errors->first('salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-secondary">Crear</button>
    </div>
</div>
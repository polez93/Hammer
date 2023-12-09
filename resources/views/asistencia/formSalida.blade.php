<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group display-none">
            <label for="horario_id">Horario</label>
            <input type="number" class="form-control" id="horario_id" name="horario_id" value="{{$asistencia->horario_id}}" required readonly>
        
            {!! $errors->first('horario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group display-none">
            <label for="empleado_id">Empleado</label>
            <input type="number" class="form-control" name="empleado_id" id="empleado_id" value="{{$asistencia->empleado_id}}" readonly>
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="hora_entrada">Hora Entrada</label>
            <input type="time" class="form-control" name="hora_entrada" id="hora_entrada" value="{{$asistencia->hora_entrada}}" readonly>

            {!! $errors->first('hora_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="hora_salida">Hora Salida</label>
            <input type="time" name="hora_salida" class="form-control" id="hora_salida" value="{{now()->format('H:i:s')}}" require readonly>
        
            {!! $errors->first('hora_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="novedad">Novedad</label>
            <input type="text" name="novedad" id="novedad" class="form-control" value="{{$asistencia->novedad}}" readonly>
           
            {!! $errors->first('novedad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">SALIR</button>
    </div>
</div>
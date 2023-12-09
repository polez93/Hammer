<div class="row box box-info padding-1 d-flex aling-content-center">
    <div class="box-body col-6">
        
        <div class="form-group" id="form-ingreso">
            <label for="horario-form">Horario</label>
            <input type="number" name="horario_id" id="horario-form" class="form-control" readonly required>
           
            {!! $errors->first('horario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="empleado">Identidicacion</label>
            <input type="text" id="empleado" name="empleado_id" class="form-control" readonly required>
            
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="h_entrada">Hora Entrada</label>
            <input type="time" id="h_entrada" name="hora_entrada" value="{{ now()->format('H:i:s') }}" class="form-control" readonly required>
            {!! $errors->first('hora_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="novedad">Novedad</label>
            <input type="text" id="novedad" class="form-control" name="novedad" readonly>
        
            {!! $errors->first('novedad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="col-1 box-footer" style="height: auto;">
        <button type="submit" class="btn btn-secondary">Registrar</button>
    </div>
</div>

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" required>
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="identificacion">Identificación</label>
            <input type="number" class="form-control" name="identificacion" id="identificacion" required>
            {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="mail">Correo</label>
            <input type="mail" class="form-control" name="correo" id="mail" require>
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <select id="puesto" name="puesto" class="form-control" required>
                <option value="Secretaria">Secretaria</option>
                <option value="Operador">Operador</option>
                <option value="Ingeniero">Ingeniero</option>
                <option value="Tecnico">Tecnico</option>
                <option value="Esp. Seguridad">Esp. Seguridad</option>
                
            </select>
            {!! $errors->first('puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
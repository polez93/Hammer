<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" maxlength="6" id="nueva-placa" onkeyup="validarPlaca(this.value,{{$vehiculos}})" onkeypress="return validarInput(event)">
            {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cliente') }}
            {{ Form::select('id_cliente',$clientes ,$vehiculo->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capacidad') }}
            {{ Form::number('capacidad', $vehiculo->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad']) }}
            {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group display-none">
            <label for="estado"></label>
            <select name="estado" class="form-control" id="estado" placeholder="Estado" required>
                <option value="A" selected>Activo</option>
                <option value="I">Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button id="btn-enviar" type="submit" class="btn btn-secondary m-3" disabled>{{ __('Enviar') }}</button>
    </div>
</div>
<script>
    function validarInput(event) {
            var charCode = event.charCode;

            // Permitir números (0-9) y letras mayúsculas (A-Z)
            if ((charCode >= 48 && charCode <= 57) || (charCode >= 65 && charCode <= 90)) {
                return true;
            } else {
                event.preventDefault();
                return false;
            }
        };
    function validarPlaca(placa,placas){
       
        
        if (placa.length ==6){
            let indice = placas.indexOf(placa);

            if (indice !== -1) {
                document.getElementById("alert-vehiculo").textContent = `La placa ${placa} ya se encuentra registrada`;
                document.getElementById("alert-vehiculo").style.display = 'block';
                btnEnviar.disabled = true;
                
            } else {
                
                const btnEnviar = document.querySelector("#btn-enviar");
                btnEnviar.disabled = false;
            }
        }
        if(placa.length <6){
            document.getElementById("alert-vehiculo").textContent = ``;
            document.getElementById("alert-vehiculo").style.display = 'none';
        }

    };



</script>
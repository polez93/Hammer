@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Salida') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.update', $venta->id) }}" class="needs-validation"  role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('venta.formCheckOut')

                        </form>
                      
                        <input type="text" class="display-none" value="{{$venta->vehiculo->capacidad}}" id="capacidad">
                        <input type="text" class="display-none" id="precio" value="{{$venta->producto->precio}}">
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    const input = document.querySelector("#validationTooltip01");

    input.addEventListener("input", validar);

    function validar(e) {
        const textTotal = document.querySelector("#total");
        textTotal.value = 0;
        const log = document.getElementById("pesoNeto");
        log.value = 0;
        let capacidad = document.querySelector("#capacidad").value;
        const texPesoNeto = document.querySelector("#pesoNeto"); 
       
        console.log(capacidad);
        let pesoEntrada = document.getElementById('pesoIn').value;
        let valorPesoSalida = e.srcElement.value;
        let pesoNeto =  parseFloat(valorPesoSalida - pesoEntrada).toFixed(2); 
        if (pesoNeto > capacidad) {
            alert("El peso Excede la capacidad del vehiculo")
            e.srcElement.value = 0;
            document.querySelector('#btn-facturar').disabled = true;
        }
        if (valorPesoSalida < pesoEntrada) {
            e.srcElement.classList.add("invalido");
        }
        if (pesoNeto > 0) {
            texPesoNeto.value = pesoNeto;
            const textTotal = document.querySelector("#total")
            let precio = document.querySelector("#precio").value;
            textTotal.value = pesoNeto * precio;
            document.querySelector('#btn-facturar').disabled = false;

        }else{
            document.querySelector('#btn-facturar').disabled = true;
        }


    }
</script>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asistencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    <a href="{{ route('asistencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                 INGRESO
                                </a>
                    </div>
                    <div class="card-body">
                <label for="input-id">Identificacion</label><span id="alerta"></span>
                        <input type="number" id="input-id" class="form-control w-50" onkeyup="validar()">
                        <form method="POST" action="{{ route('asistencias.store') }}" class="formulario" id="form-entrada" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asistencia.formIngreso')

                        </form>
                        <div id="cont-form-salida"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function validar(){
        let empleados = @json($empleados);
        let horarios = @json($horarios);
        console.log(horarios);
        const docId = document.querySelector("#input-id");
        let identificacion = docId.value;


        empleados.forEach(element => {
            if(identificacion==element.identificacion)
            {
                docId.classList.add('alert')
                docId.getElementById("alerta").classList.add('alert-success')
                docId.getElementById("alerta").textContent = "encontrado";
                const formEntrada = document.querySelector("#form-entrada");
                formEntrada.style.display = 'block';
                document.getElementById("empleado").value = element.id;              
                
                console.log('verdadero'+element.identificacion);
            }else{
                docId.classList.remove('alert')
                docId.classList.remove('alert-success')
                const formEntrada = document.querySelector("#form-entrada");
                formEntrada.style.display = 'none';
                console.log('falso'+element.identificacion+identificacion);
            }
        });
    }
</script>
@endsection
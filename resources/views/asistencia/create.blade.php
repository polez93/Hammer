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
                    <div class="card-header row">
                    <span class="card-title">INGRESO</span><br>
                        <div class="col-5" style="height: auto;">
                            <div class="input-group">
                            <span class="input-group-text" id="basic-addon2">Horario</span>
                            <select id="horario" class="form-control" aria-label="Username" aria-describedby="basic-addon2" placeholder="Horario" required>
                                @foreach($horarios as $horario)
                                    <option value="{{$horario->id}}" class="form-control" selected>{{$horario->nombre}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Identificación</span>
                                <input type="number" id="input-id" class="form-control" placeholder="Identificacion" aria-label="Username" aria-describedby="basic-addon1" onkeyup="validar()" required>
                            </div>
                        </div>
                       
                        
                    </div>
                    <div class="card-body">
                    <div>
                    
                    </div>
                        <form method="POST" action="{{ route('asistencias.store') }}" id="form-entrada" class="formulario" role="form" enctype="multipart/form-data" style="display: none;">
                            @csrf

                            @include('asistencia.formIngreso')
                        </form>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success formulario" id="form-usuario-in">
                            <div class="card" style="width: 18rem;">
                            <img src="{{$empleado->foto}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$empleado->nombre}}</h5>
                                    <p class="card-text">{{$empleado->puesto}}</p>
                                    <a href="#" class="btn btn-primary" onclick="cerrar()">OK</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success" id="alerta" style="padding: 10px; 
                                   position: fixed;top: 10px;
                                   right: 10px;
                                   display:none;"
                                   ></div>
    </section>
    <script>
    
        function validar(){
        let empleados = @json($empleados);
        let horarios = @json($horarios);
        let asistencias = @json($asistencias);
     
        const idsDentro = [];
       asistencias.forEach(element =>{
            idsDentro.push(element.empleado_id);
       })
        

        
        const docId = document.querySelector("#input-id");
        let identificacion = docId.value;
    
        let id = null;
        let flag = false;
        empleados.forEach(element => {
            
            if (element.identificacion == identificacion && !idsDentro.includes(element.id)){
                flag = true;
                id = element.id;
            }
        });

        const formEntrada = document.querySelector("#form-entrada");
            if(flag)
            {
                docId.classList.add('alert')
                docId.classList.add('alert-success')
                const alerta = document.getElementById("alerta");
                alerta.textContent = "encontrado";
                alerta.style.display = "block";
                setTimeout(function(){
                alerta.style.display = 'none';
                }, 4000)  

                
                let idHorario = document.getElementById('horario').value;
                formEntrada.style.display = 'block';
                document.getElementById("empleado").value = id;
                document.getElementById('horario-form').value = idHorario; 
                          
                
              
            }else{
                formEntrada.style.display = 'none';
            }
     
        }
        function cerrar(){
            document.getElementById("form-usuario-in").style.display = "none";
            document.getElementById("form-usuario-in").innerHTML = "";
        }
    </script>
    
@endsection

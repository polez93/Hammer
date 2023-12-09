@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-table-columns fa-xl me-2 iconos"></i>PANEL PRINCIPAL</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success" role="alert">
                            Bienvenido!
                        </div>
                    
                </div>
                @role('admin')
                <div class="card m-4">
                   
                        <div class="card-header">
                        <i class="fa-solid fa-weight-scale fa-xl iconos me-2"></i>Bascula
                        </div>
                        <div class="card-body">
                            <p class="card-text">Modulo de recepción y remisión de vehiculos con producto final</p>
                        </div>
                   
                        <div class="card-footer text-muted">
                            <a href="{{ route('ventas.index') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">Ingresar</a>
                        </div>
                   
                     
                  
                </div>
                @endrole
                @role('operador')
                <div class="card m-4">
                   
                        <div class="card-header">
                        <i class="fa-solid fa-weight-scale fa-xl iconos me-2"></i>Bascula
                        </div>
                        <div class="card-body">
                            <p class="card-text">Modulo de recepción y remisión de vehiculos con producto final</p>
                        </div>
                   
                
                        <div class="card-footer text-muted">
                            <a href="{{ route('bascula') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">Ingresar</a>
                        </div>
                
                  
                </div>
                @endrole
                @role('admin')
                <div class="card m-4">
                    <div class="card-header">
                    <i class="fa-solid fa-truck-ramp-box fa-xl me-2 iconos"></i>Recibo
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ingreso de vehículos con materia prima de mina o de terceros</p>
                    </div>
          
                    <div class="card-footer text-muted">
                        <a href="{{route('recibos.index')}}" class="btn btn-secondary btn-sm float-right">Ingresar</a>
                    </div>
          
                 
                </div>
                @endrole
                @role('recibo')
                <div class="card m-4">
                    <div class="card-header">
                    <i class="fa-solid fa-truck-ramp-box fa-xl me-2 iconos"></i>Recibo
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ingreso de vehículos con materia prima de mina o de terceros</p>
                    </div>
                  
              
                    <div class="card-footer text-muted">
                        <a href="{{route('recibos.create')}}" class="btn btn-secondary btn-sm float-right">Ingresar</a>
                    </div>
             
                </div>
                @endrole
                @role('portero')
                <div class="card m-4">
                    <div class="card-header">
                    <i class="fa-solid fa-users fa-xl me-2 iconos"></i>Personal
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ingreso de personal a la planta (Portería)</p>
                    </div>
               
                        <div class="card-footer text-muted">                     
                                <a href="{{ route('salidaPorteria') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                 Ingresar
                                </a>                            
                        </div>
           
                 
            
                </div>
                @endrole
                @role('rh')
                <div class="card m-4">
                    <div class="card-header">
                    <i class="fa-solid fa-users fa-xl me-2 iconos"></i>Personal
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ingreso de personal a la planta (Portería)</p>
                    </div>
                
                        <div class="card-footer text-muted">
                            <a href="{{ url('asistencias') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">Ingresar</a>
                        </div>
                  
            
                </div>
                @endrole
                
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Vehiculo
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')
            <div class="alert alert-danger position-absolute top-0 end-0" role="alert" id="alert-vehiculo" style="display: none; z-index:2" >
                 
                 </div>

            <div class="card card-default">
           
                <div class="card-header">
                    <span class="card-title">Nuevo Vehiculo</span>
                </div>
                <div class="card-body d-flex">
                

                    <form method="POST" class="formulario" action="{{ route('vehiculos.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('vehiculo.form')

                    </form>

                    <form class="form-vh">
                        <div class="card op-9" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Nota</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Para el registro de Vehiculos</h6>
                                <p class="card-text">
                                    <ol>Verificar en el teclado que este activado las MAY.</ol>
                                    <ol>Los vehiculos estan relacionados con los clientes, para registrar un vehiculo sebe ser registrado 
                                        con anterioridad el respectivo cliente.
                                    </ol>
                                </p>
                                
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</section>
@endsection
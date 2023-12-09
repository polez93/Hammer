@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? "{{ __('Show') Empleado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card formulario">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-secondary" href="{{ route('empleados.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $empleado->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $empleado->identificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $empleado->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{$empleado->foto}}" alt="" style="width: 100px;">
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $empleado->puesto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

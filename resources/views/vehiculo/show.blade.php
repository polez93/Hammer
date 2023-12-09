@extends('layouts.app')

@section('template_title')
    {{ $vehiculo->name ?? "{{ __('Show') Vehiculo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card formulario">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Vehiculo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vehiculos.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Placa:</strong>
                            {{ $vehiculo->placa }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $vehiculo->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $vehiculo->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $vehiculo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

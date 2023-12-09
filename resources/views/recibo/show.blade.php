@extends('layouts.app')

@section('template_title')
    {{ $recibo->name ?? "{{ __('Show') Recibo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Recibo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recibos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Empleado:</strong>
                            {{ $recibo->id_empleado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Vehiculo:</strong>
                            {{ $recibo->id_vehiculo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $recibo->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $recibo->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $recibo->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $recibo->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $recibo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

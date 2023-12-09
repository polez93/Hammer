@extends('layouts.app')

@section('template_title')
    {{ $asistencia->name ?? "{{ __('Show') Asistencia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card formulario">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-secondary" href="{{ route('asistencias.create') }}">OK</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Horario</strong>
                            {{ $asistencia->horario->nombre }}
                        </div>
                        <div class="form-group">
                            <img src="{{$asistencia->empleado->foto}}" alt="foto" class="w-25" style="height: auto;">
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $asistencia->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Entrada:</strong>
                            {{ $asistencia->hora_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Salida:</strong>
                            {{ $asistencia->hora_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Novedad:</strong>
                            {{ $asistencia->novedad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

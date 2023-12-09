@extends('layouts.app')

@section('template_title')
    Asistencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <i class="fa-solid fa-door-open fa-xl me-2 iconos"></i>Formulario de Salida
                            </span>

                             <div class="float-right">
                             <a href="{{ route('asistencias.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  INGRESO
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th><i class="fa-regular fa-calendar-days fa-xl me-2"></i>Horario</th>
										<th><i class="fa-solid fa-user-tie fa-xl me-2"></i>Empleado</th>
										<th><i class="fa-regular fa-clock fa-xl me-2" ></i>Hora Entrada</th>
										<th><i class="fa-regular fa-clock fa-xl me-2"></i>Hora Salida</th>
										<th><i class="fa-regular fa-newspaper fa-xl me-2"></i>Novedad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencias as $asistencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $asistencia->horario->nombre }}</td>
											<td>{{ $asistencia->empleado->nombre }}</td>
											<td>{{ $asistencia->hora_entrada }}</td>
											<td>{{ $asistencia->hora_salida }}</td>
											<td>{{ $asistencia->novedad }}</td>

                                            <td>
                                                @role('rh')
                                                <form action="{{ route('asistencias.destroy',$asistencia->id) }}" method="POST">                                          
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                                @endrole
                                                @role('portero')
                                                <a class="btn btn-sm btn-success" href="{{ route('asistencias.edit',$asistencia->id) }}"><i class="fa fa-fw fa-edit"></i>SALIDA</a>
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asistencias->links() !!}
            </div>
        </div>
    </div>
@endsection

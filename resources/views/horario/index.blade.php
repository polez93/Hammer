@extends('layouts.app')

@section('template_title')
    Horario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <i class="fa-solid fa-calendar-days me-2 iconos"></i>{{ __('Horario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('horarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="fa-regular fa-square-plus fa-xl me-2"></i>Nuevo
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
                                        
										<th><i class="fa-solid fa-signature me-2"></i>Nombre</th>
										<th><i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Ingreso</th>
										<th><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 me-2"></i>Salida</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarios as $horario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $horario->nombre }}</td>
											<td>{{ $horario->ingreso }}</td>
											<td>{{ $horario->salida }}</td>

                                            <td>
                                                <form action="{{ route('horarios.destroy',$horario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('horarios.show',$horario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('horarios.edit',$horario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $horarios->links() !!}
            </div>
        </div>
    </div>
@endsection

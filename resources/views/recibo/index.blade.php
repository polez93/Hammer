@extends('layouts.app')

@section('template_title')
    Recibo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Recibo de Material
                            </span>
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Encargado</th>
										<th>Placa</th>
										<th>Producto</th>
										<th>Peso</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recibos as $recibo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $recibo->user->nombre }}</td>
											<td>{{ $recibo->vehiculo->placa }}</td>
											<td>{{ $recibo->producto->nombre}}</td>
											<td>{{ $recibo->peso }}</td>
											<td>{{ $recibo->fecha }}</td>
											<td>{{ $recibo->hora }}</td>
											<td>{{ $recibo->estado }}</td>

                                            <td>
                                                <form action="{{ route('recibos.destroy',$recibo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('recibos.show',$recibo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('recibos.edit',$recibo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $recibos->links() !!}
            </div>
        </div>
    </div>
@endsection

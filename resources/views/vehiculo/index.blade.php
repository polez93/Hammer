@extends('layouts.app')

@section('template_title')
    Vehiculo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <i class="fa-solid fa-truck fa-xl me-2 iconos"></i>{{ __('Vehiculo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vehiculos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="fa-regular fa-square-plus fa-lg me-2"></i>{{ __('Nuevo') }}
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
                            <table class="table table-striped table-hover" id="data-table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th><i class="fa-regular fa-file me-2"></i>Placa</th>
										<th><i class="fa-solid fa-user-tie me-2"></i>Cliente</th>
										<th><i class="fa-solid fa-weight-hanging me-2"></i>Capacidad</th>
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehiculos as $vehiculo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $vehiculo->placa }}</td>
											<td>{{ $vehiculo->cliente->nombre }}</td>
											<td>{{ $vehiculo->capacidad }} Ton.</td>
											

                                            <td>
                                                <form action="{{ route('vehiculos.destroy',$vehiculo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vehiculos.show',$vehiculo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('vehiculos.edit',$vehiculo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modificar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $vehiculos->links() !!}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#data-table').DataTable();
        });
    </script>
@endsection

@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between text-center">
                        <div class="row">
                            <span id="card_title" class="font-n-3 color-primario">
                               Modulo de VENTAS
                            </span>
                        </div>
                        @role('operador')
                        


                        <div class="row w-75 d-flex justufy-content-between">
                        <div class="alert alert-warning position-absolute top-0 end-0 w-25" id="aviso" style="display: none;"></div>
                            <form action="{{ route('search') }}" class="p-3 w-50" method="GET" class="needs-validation">
                                <h3 for="validationCustom01" class="form-label">INGRESO</h3>
                                <input type="text" class="form-control" name="query" id="validationCustom01" placeholder="PLACA" autocomplete="off" required onkeypress="return validarInput(event)" onclick="aviso()" >
                                
                                <div class="valid-feedback"></div>
                                <div id="autocomplete-results" class="autocompletado"></div>
                                <button type="submit" id="btn-in" class="btn btn-secondary mt-3  w-50" disabled>INGRESAR</button>
                            </form>
                        </div>
                        @endrole    
                           
                                
                     

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
                                        
										<th><i class="fa-solid fa-user-tie me-2"></i>Cliente</th>
										<th><i class="fa-solid fa-land-mine-on me-2"></i>Producto</th>
										<th><i class="fa-regular fa-file me-2"></i>Placa</th>
										<th><i class="fa-solid fa-scale-unbalanced-flip me-2"></i>Peso Neto</th>                 
										<th><i class="fa-solid fa-clock me-2"></i>Hora Ingreso</th>
										<th><i class="fa-solid fa-calendar-days me-2"></i>Fecha Ingreso</th>
                                        <th>Acciones</th>	
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $venta->cliente->nombre }}</td>
											<td>{{ $venta->producto->nombre }}</td>
											<td>{{ $venta->vehiculo->placa }}</td>
                                            @if($venta->peso_neto)										
											<td>{{ $venta->peso_neto }} Ton.</td>
                                            @else
                                            <td class="alert alert-warning bg-warning">Pendiente</td>
                                            @endif
											<td>{{ $venta->hora_int }}</td>
											<td>{{ $venta->fecha_int }}</td>
                                            <td>
                                                @role('operador')
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit', $venta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ 'Dar salida' }}</a>
                                                @endrole
                                                @role('admin')
                                                <div class="row">
                                                    <div class="col-4">
                                                        <a class="btn btn-sm btn-primary" href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye me-2"></i>{{'Factura'}}</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <form action="{{ route('ventas.destroy',$venta->id) }}" class="w-25" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                        </form>
                                                    </div>
                                                
                                                
                                                
                                                </div>
                                                
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    function validarInput(event) {
            var charCode = event.charCode;

            // Permitir números (0-9) y letras mayúsculas (A-Z)
            if ((charCode >= 48 && charCode <= 57) || (charCode >= 65 && charCode <= 90)) {
                return true;
            } else {
                event.preventDefault();
                return false;
            }
        }
    $(document).ready(function(){
        $('#validationCustom01').keyup(function(){
          
            const btnEnt = document.querySelector("#btn-in")
            btnEnt.disabled = true;
            const resultsContainer = document.getElementById('autocomplete-results');
            resultsContainer.innerHTML = ''; // Limpiar resultados anteriores
                        
            

            var query = $(this).val();
            
            $.ajax({
                url: '{{ route('autocomplete')}}',
                type: 'GET',
                data: {term: query},
                success:function(data){                    
                 
                    lista = ''; 
                    if(resultsContainer.value == ''){
                        resultsContainer.innerHTML = '<div class="alert alert-info">Ingrese la placa del vehiculo</div>';

                    }else{
                        data.forEach(element => {
                        
                        lista += `<li class="list-group-item btn btn-secondary bg-autocomplete" onclick="asiganrAutocompletado('${element.placa}')">${element.placa}</li>`;
                       });

                       resultsContainer.innerHTML = lista;
                       lista = '';
                       
                   
                    console.log(data);
                    }
                    
                    // Mostrar resultados utilizando un bucle foreach
                                  
                     
                }
            });
        });

    });
    function asiganrAutocompletado(element){
        const inputAutoComplete = document.getElementById('validationCustom01');
        inputAutoComplete.value = element;
        const resultsContainer = document.getElementById('autocomplete-results');
        resultsContainer.innerHTML = ''; // Limpiar resultados anteriores
        const btnEnt = document.querySelector("#btn-in")
        btnEnt.disabled = false;
                    
    }

    function aviso(){
        const aviso = document.querySelector("#aviso");
        aviso.style.display = 'block';
        aviso.innerHTML = "Activa las mayusculas, solo acepta MAY y numeros";
        setTimeout(function(){
            aviso.style.display = 'none';
        }, 4000)
    }
</script>
<script>
    $(document).ready(function() {
    $('#data-table').DataTable();
});
</script>
@endsection

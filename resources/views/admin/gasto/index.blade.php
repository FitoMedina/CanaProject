@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')

<h1>
    Gastos
    <button type="button" class="create-modal btn btn-primary" data-toggle="modal" data-target="#modal-create-gasto">
        Crear
    </button>
</h1>
@stop


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if($errors->any())
            <div class="alert alert-danger">
                ERROR! Por favor revisar los datos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button><br>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de gastos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="gastos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Interes</th>
                            <th>Monto</th>
                            <th>Motivo</th>
                            <th>Vehiculo</th>
                            <th>Lote</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gasto as $gastos)
                        <tr>
                            <td>{{$gastos->codigo}}</td>
                            <td>{{$gastos->interes}}</td>
                            <td>{{$gastos->monto}}</td>
                            <td>{{$gastos->motivo}}</td>
                            <td>{{$gastos->cod_vehiculo}}</td>
                            <td>{{$gastos->cod_lote}}</td>
                            <td>{{$gastos->cod_canero}}</td>
                            <td>{{$gastos->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-gasto-{{$gastos->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-gasto-{{$gastos->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.gasto.modal-update-gasto')
                        @include('admin.gasto.modal-delete-gasto')
                        
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-gasto">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            
            <div class="modal-header">
                <h4 class="modal-title">Crear Gasto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/gasto" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="interes">Interes</label>
                        <input type="text" name="interes" class="form-control" id="interes" >
                        <label for="monto">Monto</label>
                        <input type="text" name="monto" class="form-control" id="monto" >
                        <label for="motivo">Motivo</label>
                        <input type="text" name="motivo" class="form-control" id="motivo" >
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_vehiculo">Vehiculo</label>
                        <div class="dropdown">
                            <select name='cod_vehiculo' id='cod_vehiculo' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($vehiculo as $vehiculos)
                                <option value="{{ $vehiculos->codigo }}">"{{ $vehiculos->placa }}"</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <label for="cod_lote">Lote</label>
                        <div class="dropdown">
                            <select name='cod_lote' id='cod_lote' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($lote as $lotes)
                                <option value="{{ $lotes->codigo }}">"{{ $lotes->codigo }}"</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="add btn btn-outline-primary">Guardar</button>
                </div>
            </form>
            
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    
</div>
<!-- /.modal -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



@section('js')

<script>
$(document).ready(function() {
    $('#gastos').DataTable( {
        "order": [[ 3, "desc" ]],
        "language": {
            "lengthMenu": "Mostrar " +
            `<select class="custom-select custom-select-sm form-control form-control-sm">
            <option value = '10'>10</option>
            <option value = '25'>25</option> 
            <option value = '50'>50</option> 
            <option value = '-1'>All</option>
            </select>` 
            + "registros por página",
            "zeroRecords": "No se ha encontrado la búsqueda",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ todos los registros)",
            'search': 'Buscar:',
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    }
     );
} );

</script>
@stop


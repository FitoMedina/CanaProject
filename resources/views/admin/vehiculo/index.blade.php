@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Vehiculos
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-vehiculo">
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
                    <h3 class="card-title">Listado de vehiculos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="vehiculos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Color</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculo as $vehiculos)
                        <tr>
                            <td>{{$vehiculos->codigo}}</td>
                            <td>{{$vehiculos->color}}</td>
                            <td>{{$vehiculos->marca}}</td>
                            <td>{{$vehiculos->modelo}}</td>
                            <td>{{$vehiculos->placa}}</td>
                            <td>{{$vehiculos->tipo}}</td>
                            <td>{{$vehiculos->canero}}</td>
                            <td>{{$vehiculos->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-vehiculo-{{$vehiculos->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-vehiculo-{{$vehiculos->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.vehiculo.modal-update-vehiculo')
                        @include('admin.vehiculo.modal-delete-vehiculo')
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
<div class="modal fade" id="modal-create-vehiculo">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Vehiculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/vehiculo" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" name="color" class="form-control" id="color" >
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" class="form-control" id="marca">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="modelo" >
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" class="form-control" id="placa" >
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" class="form-control" id="tipo" >
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
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
    $('#vehiculos').DataTable( {
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


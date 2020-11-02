@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Cañeros
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-canero">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de cañeros</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="caneros" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Identificacion</th>
                            <th>Telefono</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($canero as $caneros)
                        <tr>
                            <td>{{$caneros->cod_canero}}</td>
                            <td>{{$caneros->nombre}}</td>
                            <td>{{$caneros->direccion}}</td>
                            <td>{{$caneros->identificacion}}</td>
                            <td>{{$caneros->telefono}}</td>
                            <td>{{$caneros->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-canero-{{$caneros->id}}">Editar</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-canero-{{$caneros->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.canero.modal-update-canero')
                        @include('admin.canero.modal-delete-canero')
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
<div class="modal fade" id="modal-create-canero">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Cañero</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/canero" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cod_canero">Codigo</label>
                        <input type="text" name="cod_canero" class="form-control" id="cod_canero" >
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                        {!! $errors->first('cod_canero','<small>:message</small>') !!}
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion">
                        {!! $errors->first('direccion','<small>:message</small>') !!}
                        <label for="identificacion">Identificacion</label>
                        <input type="text" name="identificacion" class="form-control" id="identificacion">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono">
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
    $('#caneros').DataTable( {
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


@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Trabajadores
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-trabajador">
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
                    <h3 class="card-title">Listado de trabajadores</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="trabajadores" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Identificacion</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trabajador as $trabajadores)
                        <tr>
                            <td>{{$trabajadores->codigo}}</td>
                            <td>{{$trabajadores->nombre}}</td>
                            <td>{{$trabajadores->identificacion}}</td>
                            <td>{{$trabajadores->telefono}}</td>
                            <td>{{$trabajadores->cargo}}</td>
                            <td>{{$trabajadores->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-trabajador-{{$trabajadores->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-trabajador-{{$trabajadores->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.trabajador.modal-update-trabajador')
                        @include('admin.trabajador.modal-delete-trabajador')
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
<div class="modal fade" id="modal-create-trabajador">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Trabajador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/trabajador" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" >
                        <label for="identificacion">Identificacion</label>
                        <input type="text" name="identificacion" class="form-control" id="identificacion">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" >
                        <label for="cod_cargo">Cargo</label>
                        <div class="dropdown">
                            <select name='cod_cargo' id='cod_cargo' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($cargo as $cargos)
                                <option value="{{ $cargos->codigo }}">"{{ $cargos->nombre }}"</option>
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
    $('#trabajadores').DataTable( {
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


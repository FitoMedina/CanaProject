@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Tipos de Caña
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-tipo">
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
                    <h3 class="card-title">Listado de tipos de caña</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tipos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipo as $tipos)
                        <tr>
                            <td>{{$tipos->codigo}}</td>
                            <td>{{$tipos->descripcion}}</td>
                            <td>{{$tipos->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-tipo-{{$tipos->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-tipo-{{$tipos->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.tipo.modal-update-tipo')
                        @include('admin.tipo.modal-delete-tipo')
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
<div class="modal fade" id="modal-create-tipo">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Tipo de caña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/tipo" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" >
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
    $('#tipos').DataTable( {
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


@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Chatas
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-chata">
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
                    <h3 class="card-title">Listado de chatas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="chatas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Eje</th>
                            <th>Reten</th>
                            <th>Rodamiento</th>
                            <th>Rueda</th>
                            <th>tara</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chata as $chatas)
                        <tr>
                            <td>{{$chatas->codigo}}</td>
                            <td>{{$chatas->eje}}</td>
                            <td>{{$chatas->reten}}</td>
                            <td>{{$chatas->rodamiento}}</td>
                            <td>{{$chatas->rueda}}</td>
                            <td>{{$chatas->tara}}</td>
                            <td>{{$chatas->canero}}</td>
                            <td>{{$chatas->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-chata-{{$chatas->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-chata-{{$chatas->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.chata.modal-update-chata')
                        @include('admin.chata.modal-delete-chata')
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
<div class="modal fade" id="modal-create-chata">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Chata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/chata" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="eje">Eje</label>
                        <input type="text" name="eje" class="form-control" id="eje" >
                        <label for="reten">Reten</label>
                        <input type="text" name="reten" class="form-control" id="reten">
                        <label for="rodamiento">Rodamiento</label>
                        <input type="text" name="rodamiento" class="form-control" id="rodamiento" >
                        <label for="rueda">Rueda</label>
                        <input type="text" name="rueda" class="form-control" id="rueda" >
                        <label for="tara">Tara</label>
                        <input type="text" name="tara" class="form-control" id="tara" >
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
    $('#chatas').DataTable( {
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


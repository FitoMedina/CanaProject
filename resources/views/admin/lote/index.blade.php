@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Lotes
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-lote">
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
                    <h3 class="card-title">Listado de lotes</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="lotes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Propiedad</th>
                            <th>Vaiedad</th>
                            <th>Edad</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lote as $lotes)
                        <tr>
                            <td>{{$lotes->descripcion}}</td>
                            <td>{{$lotes->propiedad}}</td>
                            <td>{{$lotes->variedad}}</td>
                            <td>{{$lotes->edad}}</td>
                            <td>{{$lotes->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-lote-{{$lotes->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-lote-{{$lotes->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.lote.modal-update-lote')
                        @include('admin.lote.modal-delete-lote')
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
<div class="modal fade" id="modal-create-lote">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Lote</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/lote" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" >
                        <label for="variedad">Variedad</label>
                        <input type="text" name="variedad" class="form-control" id="variedad" >
                        <label for="edad">Edad</label>
                        <input type="text" name="edad" class="form-control" id="edad" >
                        <label for="cod_propiedad">Propiedad</label>
                        <div class="dropdown">
                            <select name='cod_propiedad' id='cod_propiedad' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($propiedad as $propiedades)
                                <option value="{{ $propiedades->codigo }}">"{{ $propiedades->nombre }}"</option>
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
    $('#lotes').DataTable( {
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


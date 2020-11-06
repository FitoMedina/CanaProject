@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Propiedades
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-propiedad">
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
                    <h3 class="card-title">Listado de propiedades</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="propiedades" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Hectareas</th>
                            <th>Distancia</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($propiedad as $propiedades)
                        <tr>
                            <td>{{$propiedades->codigo}}</td>
                            <td>{{$propiedades->nombre}}</td>
                            <td>{{$propiedades->hectareas}}</td>
                            <td>{{$propiedades->ubicacion}}</td>
                            <td>{{$propiedades->canero}}</td>
                            <td>{{$propiedades->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-propiedad-{{$propiedades->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-propiedad-{{$propiedades->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.propiedad.modal-update-propiedad')
                        @include('admin.propiedad.modal-delete-propiedad')
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
<div class="modal fade" id="modal-create-propiedad">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Propiedad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/propiedad" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" >
                        <label for="hectareas">Hectareas</label>
                        <input type="text" name="hectareas" class="form-control" id="hectareas">
                        <label for="ubicacion">Distancia</label>
                        <input type="text" name="ubicacion" class="form-control" id="ubicacion" >
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
    $('#propiedades').DataTable( {
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


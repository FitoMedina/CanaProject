@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')

<h1>
    Entregas
    <button type="button" class="create-modal btn btn-primary" data-toggle="modal" data-target="#modal-create-entrega">
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
                    <h3 class="card-title">Listado de entregas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="entregas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Fecha entrega</th>
                            <th>Paquete</th>
                            <th>Peso neto</th>
                            <th>Corte</th>
                            <th>Tipo</th>
                            <th>Vehiculo</th>
                            <th>Trabajador</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrega as $entregas)
                        <tr>
                            <td>{{$entregas->codigo}}</td>
                            <td>{{$entregas->fecha_entrega}}</td>
                            <td>{{$entregas->paquete}}</td>
                            <td>{{$entregas->peso_neto}}</td>
                            <td>{{$entregas->corte}}</td>
                            <td>{{$entregas->tipo}}</td>
                            <td>{{$entregas->vehiculo}}</td>
                            <td>{{$entregas->trabajador}}</td>
                            <td>{{$entregas->canero}}</td>
                            <td>{{$entregas->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-entrega-{{$entregas->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-entrega-{{$entregas->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.entrega.modal-update-entrega')
                        @include('admin.entrega.modal-delete-entrega')
                        
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
<div class="modal fade" id="modal-create-entrega">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            
            <div class="modal-header">
                <h4 class="modal-title">Crear Entrega</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/entrega" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_entrega">Fecha entrega</label>
                        <input type="date" name="fecha_entrega" class="form-control" id="fecha_inicio"  >
                        <label for="paquete">Paquete</label>
                        <input type="text" name="paquete" class="form-control" id="paquete" >
                        <label for="peso_neto">Peso neto</label>
                        <input type="text" name="peso_neto" class="form-control" id="peso_neto" >
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_trabajador">Trabajador</label>
                        <div class="dropdown">
                            <select name='cod_trabajador' id='cod_trabajador' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($trabajador as $trabajadores)
                                <option value="{{ $trabajadores->codigo }}">"{{ $trabajadores->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_vehiculo">Camion</label>
                        <div class="dropdown">
                            <select name='cod_vehiculo' id='cod_vehiculo' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($vehiculo as $vehiculos)
                                <option value="{{ $vehiculos->codigo }}">"{{ $vehiculos->placa }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_canero">Corte</label>
                        <div class="dropdown">
                            <select name='cod_corte' id='cod_corte' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($corte as $cortes)
                                <option value="{{ $cortes->codigo }}">"{{ $cortes->descripcion }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_tipo">Tipo</label>
                        <div class="dropdown">
                            <select name='cod_tipo' id='cod_tipo' class="form-control">
                                <option value=''>Seleccionar</option>
                                @foreach ($tipo as $tipos)
                                <option value="{{ $tipos->codigo }}">"{{ $tipos->descripcion }}"</option>
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
    $('#entregas').DataTable( {
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


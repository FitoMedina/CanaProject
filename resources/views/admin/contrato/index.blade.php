@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Contrato
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-contrato">
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
                    <h3 class="card-title">Listado de contratos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="contratos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Faltas</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Incentivo</th>
                            <th>Monto incentivo</th>
                            <th>Sueldo</th>
                            <th>Viatico</th>
                            <th>Trabajador</th>
                            <th>Cañero</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contrato as $contratos)
                        <tr>
                            <td>{{$contratos->codigo}}</td>
                            <td>{{$contratos->faltas}}</td>
                            <td>{{$contratos->fecha_inicio}}</td>
                            <td>{{$contratos->fecha_fin}}</td>
                            <td>{{$contratos->incentivo}}</td>
                            <td>{{$contratos->monto_incentivo}}</td>
                            <td>{{$contratos->sueldo}}</td>
                            <td>{{$contratos->viatico}}</td>
                            <td>{{$contratos->trabajador}}</td>
                            <td>{{$contratos->canero}}</td>
                            <td>{{$contratos->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-contrato-{{$contratos->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-contrato-{{$contratos->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.contrato.modal-update-contrato')
                        @include('admin.contrato.modal-delete-contrato')
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
<div class="modal fade" id="modal-create-contrato">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Crear Contrato</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/contrato" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="faltas">Faltas</label>
                        <input type="text" name="faltas" class="form-control" id="faltas" >
                        <label for="fecha_inicio">Fecha inicio</label>
                        
                        <label for="fecha_fin">Fecha fin</label>
                        <input type="text" name="fecha_fin" class="form-control" id="fecha_fin" >
                        <label for="incentivo">Incentivo</label>
                        <input type="text" name="incentivo" class="form-control" id="incentivo" >
                        <label for="monto_incentivo">Monto incentivo</label>
                        <input type="text" name="monto_incentivo" class="form-control" id="monto_incentivo" >
                        <label for="sueldo">Sueldo</label>
                        <input type="text" name="sueldo" class="form-control" id="sueldo" >
                        <label for="viatico">Viatico</label>
                        <input type="text" name="viatico" class="form-control" id="viatico" >
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
    $('#contratos').DataTable( {
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


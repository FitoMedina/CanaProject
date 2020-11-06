@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')

<h1>
    Pagos
    <button type="button" class="create-modal btn btn-primary" data-toggle="modal" data-target="#modal-create-pago">
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
                    <h3 class="card-title">Listado de pagos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="pagos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                            <th>Contrato</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pago as $pagos)
                        <tr>
                            <td>{{$pagos->codigo}}</td>
                            <td>{{$pagos->fecha}}</td>
                            <td>{{$pagos->monto}}</td>
                            <td>{{$pagos->tipo}}</td>
                            <td>{{$pagos->cod_contrato}}</td>
                            <td>{{$pagos->fecha_proceso}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-pago-{{$pagos->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-pago-{{$pagos->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.pago.modal-update-pago')
                        @include('admin.pago.modal-delete-pago')
                        
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
<div class="modal fade" id="modal-create-pago">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            
            <div class="modal-header">
                <h4 class="modal-title">Realizar Pago</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/pago" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" id="fecha"  >
                        <label for="monto">Monto</label>
                        <input type="text" name="monto" class="form-control" id="monto" >
                        <label for="tipo">Tipo</label><br>
                        <div class="dropdown">
                            <select name='tipo' id='tipo' class="form-control">
                                <option value='1'>Racion</option>
                                <option value='2'>A cuenta</option>
                            </select>
                        </div>
                        <label for="cod_contrato">Contrato</label>
                        <div class="dropdown">
                            <select name='cod_contrato' id='cod_contrato' class="form-control">
                                <option value='0'>Seleccionar</option>
                                @foreach ($contrato as $contratos)
                                <option value="{{ $contratos->codigo }}">"{{ $contratos->codigo }}"</option>
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
    $('#pagos').DataTable( {
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


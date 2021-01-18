@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')
<h1>
    Tipo de Chatas
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-chata">
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
                    <h3 class="card-title">Listado de tipo de chatas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="chatas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RodamientoPequeño</th>
                            <th>RodamientoGrande</th>
                            <th>Reten</th>
                            <th>DetalleRodaPequeño</th>
                            <th>DetalleRodaGrande</th>
                            <th>DetalleRetenPequeño</th>
                            <th>DetalleRetenGrande</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipo_chata as $tipo_chatas)
                        <tr>
                            <td>{{$tipo_chatas->descripcion}}</td>
                            <td>{{$tipo_chatas->rodamientogrande}}</td>
                            <td>{{$tipo_chatas->rodamientopeque}}</td>
                            <td>{{$tipo_chatas->reten}}</td>
                            <td>{{$tipo_chatas->detallerodapeque}}</td>
                            <td>{{$tipo_chatas->detallerodagrande}}</td>
                            <td>{{$tipo_chatas->detalleretenpeque}}</td>
                            <td>{{$tipo_chatas->detalleretengrande}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-chata-{{$tipo_chatas->id}}">Editar</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-chata-{{$tipo_chatas->id}}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.tipochata.modal-update-chata')
                        @include('admin.tipochata.modal-delete-chata')
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
                <h4 class="modal-title">Crear Tipo de Chata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/tipochata" method="POST">
            
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Nombre</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" >
                        <label for="rodamientogrande">RodamientoGrande</label>
                        <input type="text" name="rodamientogrande" class="form-control" id="rodamientogrande" >
                        <label for="rodamientopeque">RodamientoPeque</label>
                        <input type="text" name="rodamientopeque" class="form-control" id="rodamientopeque" >
                        <label for="reten">Reten</label>
                        <input type="text" name="reten" class="form-control" id="reten" >
                        <label for="detallerodapeque">DetalleRodamientoPequeño</label>
                        <input type="text" name="detallerodapeque" class="form-control" id="detallerodapeque" >
                        <label for="detallerodagrande">DetalleRodamientoGrande</label>
                        <input type="text" name="detallerodagrande" class="form-control" id="detallerodagrande" >
                        <label for="detalleretenpeque">DetalleRetenPequeño</label>
                        <input type="text" name="detalleretenpeque" class="form-control" id="detalleretenpeque" >
                        <label for="detalleretengrande">DetalleRetenGrande</label>
                        <input type="text" name="detalleretengrande" class="form-control" id="detalleretengrande" >
                        
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


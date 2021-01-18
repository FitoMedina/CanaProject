@extends('adminlte::page')


@section('title', 'Cana')

@section('content_header')

<h1>
    Reporte de liquidacion total
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
                            <th>Contrato</th>
                            <th>Trabajador</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Monto incentivo</th>
                            <th>Monto viaje</th>
                            <th>Sueldo</th>
                            <th>Faltas</th>
                            <th>Dias Trab.</th>
                            <th>Dias Tot.</th>
                            <th>Mes Tot.</th>
                            <th>Trabajado</th>
                            <th>Pedidos</th>
                            <th>Saldo</th>
                            <th>Aguinaldo</th>
                            <th>Beneficio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contrato as $contratos)
                        <tr>
                            <td>{{$contratos->codigo}}</td>
                            <td>{{$contratos->trabajador}}</td>
                            <td>{{$contratos->fecha_inicio}}</td>
                            <td>{{$contratos->fecha_fin}}</td>
                            <td>{{$contratos->monto_incentivo}}</td>
                            <td>{{$contratos->monto_viaje}}</td>
                            <td>{{$contratos->sueldo}}</td>
                            <td>{{$contratos->faltas}}</td>
                            <td>{{$contratos->dias_trab}}</td>
                            <td>{{$contratos->dias_tot}}</td>
                            <td>{{$contratos->mes_trab}}</td>
                            <td>{{$contratos->trab}}</td>
                            <td>{{$contratos->pedidos}}</td>
                            <td>{{$contratos->saldo}}</td>
                            <td>{{$contratos->aguinaldo}}</td>
                            <td>{{$contratos->aguinaldo}}</td>
                            <td>{{$contratos->total}}</td>
                        </tr>
                        
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


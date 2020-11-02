<!-- /.modal update -->
<div class="modal fade" id="modal-update-pago-{{$pagos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Pago</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/pago/{{$pagos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" value="{{$pagos->fecha}}">
                        <label for="monto">Monto</label>
                        <input type="text" name="monto" class="form-control" id="monto" value="{{$pagos->monto}}">
                        <label for="tipo">Tipo</label>
                        <div class="dropdown">
                            <select name='tipo' id='tipo' class="form-control">
                                <option value='{{$pagos->tipo}}'>Seleccionar</option>
                                <option value='1'>Racion</option>
                                <option value='2'>A cuenta</option>
                            </select>
                        </div>
                        <label for="cod_contrato">Contratos</label>
                        <div class="dropdown">
                            <select name='cod_contrato' id='cod_contrato' class="form-control">
                                <option value='{{$pagos->cod_contrato}}'>Seleccionar</option>
                                @foreach ($contrato as $contratos)
                                <option value="{{ $contratos->codigo }}">"{{ $contratos->codigo }}"</option>
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
</div>
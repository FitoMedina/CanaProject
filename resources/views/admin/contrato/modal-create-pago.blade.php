<div class="modal fade" id="modal-create-pago-{{$contratos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            
            <div class="modal-header">
                <h4 class="modal-title">Realizar Pago a {{$contratos->trabajador}}</h4>
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
                        <label for="monto">Contrato</label>
                        <input type="text" name="cod_contrato" class="form-control" id="cod_contrato" value="{{$contratos->codigo}}" placeholder="{{$contratos->codigo}}" readonly>
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
<!-- /.modal update -->
<div class="modal fade" id="modal-update-gasto-{{$gastos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Gasto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/gasto/{{$gastos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="interes">Interes</label>
                        <input type="text" name="interes" class="form-control" id="interes" value="{{$gastos->interes}}">
                        <label for="monto">Monto</label>
                        <input type="text" name="monto" class="form-control" id="monto" value="{{$gastos->monto}}">
                        <label for="motivo">Motivo</label>
                        <input type="text" name="motivo" class="form-control" id="motivo" value="{{$gastos->motivo}}">
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value='{{$gastos->cod_canero}}'>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_lote">Lote</label>
                        <div class="dropdown">
                            <select name='cod_lote' id='cod_lote' class="form-control">
                                <option value='{{$gastos->cod_lote}}'>Seleccionar</option>
                                @foreach ($lote as $lotes)
                                <option value="{{ $lotes->codigo }}">"{{ $lotes->codigo }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_vehiculo">Vehiculo</label>
                        <div class="dropdown">
                            <select name='cod_vehiculo' id='cod_vehiculo' class="form-control">
                                <option value='{{$gastos->cod_camion}}'>Seleccionar</option>
                                @foreach ($vehiculo as $vehiculos)
                                <option value="{{ $vehiculos->codigo }}">"{{ $vehiculos->placa }}"</option>
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
<!-- /.modal update -->
<div class="modal fade" id="modal-update-entrega-{{$entregas->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Entrega</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/entrega/{{$entregas->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_entrega">Fecha entrega</label>
                        <input type="date" name="fecha_entrega" class="form-control" id="fecha_entrega" value="{{$entregas->fecha_entrega}}">
                        <label for="paquete">Paquete</label>
                        <input type="text" name="paquete" class="form-control" id="faltas" value="{{$entregas->paquete}}">
                        <label for="peso_neto">Peso neto</label>
                        <input type="text" name="peso_neto" class="form-control" id="peso_neto" value="{{$entregas->peso_neto}}">
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value='{{$entregas->cod_canero}}'>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_trabajador">Trabajador</label>
                        <div class="dropdown">
                            <select name='cod_trabajador' id='cod_trabajador' class="form-control">
                                <option value='{{$entregas->cod_trabajador}}'>Seleccionar</option>
                                @foreach ($trabajador as $trabajadores)
                                <option value="{{ $trabajadores->codigo }}">"{{ $trabajadores->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_camion">Camion</label>
                        <div class="dropdown">
                            <select name='cod_camion' id='cod_camion' class="form-control">
                                <option value='{{$entregas->cod_camion}}'>Seleccionar</option>
                                @foreach ($vehiculo as $vehiculos)
                                <option value="{{ $vehiculos->codigo }}">"{{ $vehiculos->placa }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_chata">Chata</label>
                        <div class="dropdown">
                            <select name='cod_chata' id='cod_chata' class="form-control">
                                <option value='{{$entregas->cod_chata}}'>Seleccionar</option>
                                @foreach ($chata as $chatas)
                                <option value="{{ $chatas->codigo }}">"{{ $chatas->tara }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_tipo">Tipo</label>
                        <div class="dropdown">
                            <select name='cod_tipo' id='cod_tipo' class="form-control">
                                <option value='{{$entregas->cod_tipo}}'>Seleccionar</option>
                                @foreach ($tipo as $tipos)
                                <option value="{{ $tipos->codigo }}">"{{ $tipos->descripcion }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_corte">Corte</label>
                        <div class="dropdown">
                            <select name='cod_corte' id='cod_corte' class="form-control">
                                <option value='{{$entregas->cod_corte}}'>Seleccionar</option>
                                @foreach ($corte as $cortes)
                                <option value="{{ $cortes->codigo }}">"{{ $cortes->descripcion }}"</option>
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
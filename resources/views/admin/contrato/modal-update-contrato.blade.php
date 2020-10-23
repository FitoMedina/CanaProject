<!-- /.modal update -->
<div class="modal fade" id="modal-update-contrato-{{$contratos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Contrato</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/contrato/{{$contratos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="faltas">Faltas</label>
                        <input type="text" name="faltas" class="form-control" id="faltas" value="{{$contratos->faltas}}">
                        <label for="fecha_inicio">Fecha inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" value="{{$contratos->fecha_inicio}}">
                        <label for="fecha_fin">Fecha fin</label>
                        <input type="date" name="fecha_fin" class="form-control" id="fecha_fin"  value="{{$contratos->fecha_fin}}">
                        <label for="incentivo">Incentivo</label>
                        <input type="checkbox" class="form-control" id="incentivo" name="incentivo">
                        <label for="monto_incentivo">Monto incentivo</label>
                        <input type="text" name="monto_incentivo" class="form-control" id="monto_incentivo" value="{{$contratos->monto_incentivo}}">
                        <label for="sueldo">Sueldo</label>
                        <input type="text" name="sueldo" class="form-control" id="sueldo" value="{{$contratos->sueldo}}">
                        <label for="viatico">Viativo</label>
                        <input type="checkbox" class="form-control" id="viatico" name="viatico" checked>
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value='{{$contratos->cod_canero}}'>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cod_trabajador">Trabajador</label>
                        <div class="dropdown">
                            <select name='cod_trabajador' id='cod_trabajador' class="form-control">
                                <option value='{{$contratos->cod_trabajador}}'>Seleccionar</option>
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
</div>
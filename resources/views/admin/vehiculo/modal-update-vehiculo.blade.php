<!-- /.modal update -->
<div class="modal fade" id="modal-update-vehiculo-{{$vehiculos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Vehiculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/vehiculo/{{$vehiculos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" name="color" class="form-control" id="color" value="{{$vehiculos->color}}">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" class="form-control" id="marca" value="{{$vehiculos->marca}}">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="modelo" value="{{$vehiculos->modelo}}">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" class="form-control" id="placa" value="{{$vehiculos->placa}}">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" class="form-control" id="tipo" value="{{$vehiculos->tipo}}">
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value='{{$vehiculos->cod_canero}}'>Seleccionar</option>
                                @foreach ($canero as $caneros)
                                <option value="{{ $caneros->cod_canero }}">"{{ $caneros->nombre }}"</option>
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
<!-- /.modal update -->
<div class="modal fade" id="modal-update-chata-{{$chatas->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Chata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/chata/{{$chatas->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="eje">Eje</label>
                        <input type="text" name="eje" class="form-control" id="eje" value="{{$chatas->eje}}">
                        <label for="reten">Reten</label>
                        <input type="text" name="reten" class="form-control" id="reten" value="{{$chatas->reten}}">
                        <label for="rodamiento">Rodamiento</label>
                        <input type="text" name="rodamiento" class="form-control" id="rodamiento" value="{{$chatas->rodamiento}}">
                        <label for="rueda">Rueda</label>
                        <input type="text" name="rueda" class="form-control" id="rueda" value="{{$chatas->rueda}}">
                        <label for="tara">Tara</label>
                        <input type="text" name="tara" class="form-control" id="tara" value="{{$chatas->tara}}">
                        <label for="cod_canero">Cañero</label>
                        <div class="dropdown">
                            <select name='cod_canero' id='cod_canero' class="form-control">
                                <option value='{{$chatas->cod_canero}}'>Seleccionar</option>
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
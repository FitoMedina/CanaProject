<!-- /.modal update -->
<div class="modal fade" id="modal-update-lote-{{$lotes->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Lote</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/lote/{{$lotes->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="distancia">Distancia</label>
                        <input type="text" name="distancia" class="form-control" id="distancia" value="{{$lotes->distancia}}">
                        <label for="cod_propiedad">Propiedad</label>
                        <div class="dropdown">
                            <select name='cod_propiedad' id='cod_propiedad' class="form-control">
                                <option value='{{$lotes->cod_propiedad}}'>Seleccionar</option>
                                @foreach ($propiedad as $propiedades)
                                <option value="{{ $propiedades->codigo }}">"{{ $propiedades->nombre }}"</option>
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
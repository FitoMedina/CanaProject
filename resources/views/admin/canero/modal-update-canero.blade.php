<!-- /.modal update -->
<div class="modal fade" id="modal-update-canero-{{$caneros->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cañero</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/canero/{{$caneros->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cod_canero">Codigo</label>
                        <input type="text" name="cod_canero" class="form-control" id="cod_canero" value="{{$caneros->cod_canero}}" readonly="readonly">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$caneros->nombre}}">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" value="{{$caneros->direccion}}">
                        <label for="identificacion">Identificacion</label>
                        <input type="text" name="identificacion" class="form-control" id="identificacion" value="{{$caneros->identificacion}}">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" value="{{$caneros->telefono}}">
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
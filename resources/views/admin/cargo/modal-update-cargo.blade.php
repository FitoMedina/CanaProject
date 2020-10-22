<!-- /.modal update -->
<div class="modal fade" id="modal-update-cargo-{{$cargos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cargo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/cargo/{{$cargos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Cargo</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$cargos->nombre}}">
                        <label for="sueldo">Sueldo</label>
                        <input type="text" name="sueldo" class="form-control" id="sueldo" value="{{$cargos->sueldo}}">
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
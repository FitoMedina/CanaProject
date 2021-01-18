<!-- /.modal update -->
<div class="modal fade" id="modal-update-propiedad-{{$propiedades->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Propiedad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/propiedad/{{$propiedades->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$propiedades->nombre}}">
                        <label for="hectareas">Hectareas</label>
                        <input type="text" name="hectareas" class="form-control" id="hectareas" value="{{$propiedades->hectareas}}">
                        <label for="ubicacion">Distancia</label>
                        <input type="text" name="ubicacion" class="form-control" id="ubicacion" value="{{$propiedades->ubicacion}}">
                        
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
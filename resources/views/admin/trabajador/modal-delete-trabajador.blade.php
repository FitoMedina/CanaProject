<!-- /.modal update -->
<div class="modal fade" id="modal-delete-trabajador-{{$trabajadores->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Eliminar Trabajador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/trabajador/{{$trabajadores->id}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
                <div class="modal-body">
                    Esta seguro de Eliminar el registro?
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Eliminar</button>
                </div>
            </form>
            
        </div>
    <!-- /.modal-content -->
    </div>
</div>
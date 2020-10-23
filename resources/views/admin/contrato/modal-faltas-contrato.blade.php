<!-- /.modal update -->
<div class="modal fade" id="modal-faltas-contrato-{{$contratos->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Faltas del Trabajador {{$contratos->trabajador}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/contrato/faltas/{{$contratos->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="faltas">Faltas</label>
                        <input type="text" name="faltas" class="form-control" id="faltas" value="{{$contratos->faltas}}">
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
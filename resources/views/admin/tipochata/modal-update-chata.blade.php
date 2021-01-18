<!-- /.modal update -->
<div class="modal fade" id="modal-update-chata-{{$tipo_chatas->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Chata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/tipochata/{{$tipo_chatas->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Nombre</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{$tipo_chatas->descripcion}}" >
                        <label for="rodamientogrande">RodamientoGrande</label>
                        <input type="text" name="rodamientogrande" class="form-control" id="rodamientogrande" value="{{$tipo_chatas->rodamientogrande}}">
                        <label for="rodamientopeque">RodamientoPequeño</label>
                        <input type="text" name="rodamientopeque" class="form-control" id="rodamientopeque" value="{{$tipo_chatas->rodamientopeque}}">
                        <label for="reten">Reten</label>
                        <input type="text" name="reten" class="form-control" id="reten" value="{{$tipo_chatas->reten}}">
                        <label for="detallerodapeque">DetalleRodamientoPequeño</label>
                        <input type="text" name="detallerodapeque" class="form-control" id="detallerodapeque" value="{{$tipo_chatas->detallerodapeque}}">
                        <label for="detallerodagrande">DetalleRodamientoGrande</label>
                        <input type="text" name="detallerodagrande" class="form-control" id="detallerodagrande" value="{{$tipo_chatas->detallerodagrande}}">
                        <label for="detalleretenpeque">DetalleRetenPequeño</label>
                        <input type="text" name="detalleretenpeque" class="form-control" id="detalleretenpeque" value="{{$tipo_chatas->detalleretenpeque}}">
                        <label for="detalleretengrande">DetalleRetenGrande</label>
                        <input type="text" name="detalleretengrande" class="form-control" id="detalleretengrande" value="{{$tipo_chatas->detalleretengrande}}">
                        
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
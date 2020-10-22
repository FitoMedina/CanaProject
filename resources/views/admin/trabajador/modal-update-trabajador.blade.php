<!-- /.modal update -->
<div class="modal fade" id="modal-update-trabajador-{{$trabajadores->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Actualizar Trabajador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="/trabajador/{{$trabajadores->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$trabajadores->nombre}}">
                        <label for="identificacion">Identificacion</label>
                        <input type="text" name="identificacion" class="form-control" id="identificacion" value="{{$trabajadores->identificacion}}">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" value="{{$trabajadores->telefono}}">
                        <label for="cod_cargo">Cargo</label>
                        <div class="dropdown">
                            <select name='cod_cargo' id='cod_cargo' class="form-control">
                                <option value='{{$trabajadores->cod_cargo}}'>Seleccionar</option>
                                @foreach ($cargo as $cargos)
                                <option value="{{ $cargos->codigo }}">"{{ $cargos->nombre }}"</option>
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
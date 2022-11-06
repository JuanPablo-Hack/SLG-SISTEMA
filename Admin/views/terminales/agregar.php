<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear terminales</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" style="display: none;" id="success"><b>Felicidades!</b> Has agregado con éxito el terminales.</div>
                <div class="alert alert-danger" style="display: none;" id="wrong"><b>Oh no!</b> Cambie algunas cosas e intente enviar de nuevo.</div>
                <form class="form-horizontal style-form" id="formTerminal">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nombre </label>
                        <div class="col-sm-4">
                            <input type="text" name='nombre' class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Descripción </label>
                        <div class="col-lg-10">
                            <textarea class="form-control " id="ccomment" name="descripcion" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipo Terminal</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='tipo'>
                                <option value="0">-</option>
                                <option value="1">Carga</option>
                                <option value="2">Descarga</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Agregar terminales</button>
            </div>
            </form>
        </div>
    </div>
</div>
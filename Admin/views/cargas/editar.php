<div class="modal fade" id="EditarCarga<?php echo $mostrar['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar tipo de carga</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" style="display: none;" id="success"><b>Felicidades!</b> Has editado con éxito el tipo de carga.</div>
                <div class="alert alert-danger" style="display: none;" id="wrong"><b>Oh no!</b> Cambie algunas cosas e intente enviar de nuevo.</div>
                <form class="form-horizontal style-form" id="formCarga">
                    <input type="hidden" name="id" value="<?php echo $mostrar['id']; ?>" />
                    <h3>Datos generales</h3>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nombre </label>
                        <div class="col-sm-10">
                            <input type="text" name='nombre' class="form-control" value="<?php echo $mostrar['nombre'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Descripción </label>
                        <div class="col-lg-10">
                            <textarea class="form-control " id="ccomment" name="descripcion"><?php echo $mostrar['descrip'] ?></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Editar tipo de carga</button>
            </div>
            </form>
        </div>
    </div>
</div>
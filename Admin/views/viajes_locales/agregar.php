<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear viaje local</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" style="display: none;" id="success"><b>Felicidades!</b> Has agregado con éxito el viaje local.</div>
                <div class="alert alert-danger" style="display: none;" id="wrong"><b>Oh no!</b> Cambie algunas cosas e intente enviar de nuevo.</div>
                <form class="form-horizontal style-form" id="formMercancia">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Cliente</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='cliente'>
                                <option value="0"></option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result8)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="control-label col-md-3">Fecha de servicio</label>
                        <div class="col-md-3 col-xs-11">
                            <input class="form-control form-control-inline" size="16" type="date" name="fecha">
                            <span class="help-block">Selecciona una fecha</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipo unidad</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='tipo_unidad' id="filtro_unidad">
                                <option value="0">-</option>
                                <option value="1">Propias</option>
                                <option value="2">Proveedor</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Unidad Asignada</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='unidad' id="unidades"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipo de servicio</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='tipo_servicio'>
                                <option value="0">-</option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Tipo de carga</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='tipo_carga'>
                                <option value="0">-</option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result2)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tipo de contenedor</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='tipo_contenedor'>
                                <option value="0">-</option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result6)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre'] . '-' . $Row1['descrip']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">No. caja o contenedor </label>
                        <div class="col-sm-4">
                            <input type="text" name='no_caja' class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Subir DEC</label>
                        <div class="controls col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                    <input type="file" class="default" name="dec" />
                                </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                            </div>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">
                            Terminal de carga
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control" name='terminal_carga'>
                                <option value="0">-</option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result4)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Peso Neto</label>
                        <div class="col-sm-4">
                            <input type="text" name='p_neto' class="form-control">
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Peso Tara</label>
                        <div class="col-sm-4">
                            <input type="text" name='p_tara' class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Peso Bruto</label>
                        <div class="col-sm-4">
                            <input type="text" name='p_bruto' class="form-control">
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">
                            Patio de Destino
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control" name='patio_destino'>
                                <option value="0">-</option>
                                <?php
                                while ($Row1 = mysqli_fetch_array($result9)) {
                                ?>
                                    <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Naviera</label>
                        <div class="col-sm-4">
                            <input type="text" name='naviera' class="form-control">
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Naviera</label>
                        <div class="col-sm-4">
                            <input type="text" name='naviera' class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Subir EIR</label>
                        <div class="controls col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                    <input type="file" class="default" name="eir" />
                                </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Fecha de inicio servicio</label>
                        <div class="col-md-3 col-xs-11">
                            <input class="form-control form-control-inline" size="16" type="date" name="inicio_estadias">
                            <span class="help-block">Selecciona una fecha</span>
                        </div>
                        <label class="control-label col-md-3">Fecha de fin servicio</label>
                        <div class="col-md-3 col-xs-11">
                            <input class="form-control form-control-inline" size="16" type="date" name="termino_estadias">
                            <span class="help-block">Selecciona una fecha</span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Agregar viaje local</button>
            </div>
            </form>
        </div>
    </div>
</div>
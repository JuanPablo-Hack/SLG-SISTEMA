<h3><i class="fa fa-angle-right"></i> Lista de tipos de operación</h3>
<div class="row mb">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear tipo de operación</button> <br><br>
    <?php include 'views/tipos_operaciones/agregar.php'; ?>
    <div class="content-panel">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tipo_operacion";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>

                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['descrip'] ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#EditarTipoOperacion<?php echo $mostrar['id'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <a onclick="eliminartipooperacion(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        <?php include 'views/tipos_operaciones/editar.php'; ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- page end-->
</div>
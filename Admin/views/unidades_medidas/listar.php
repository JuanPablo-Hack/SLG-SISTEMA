<h3><i class="fa fa-angle-right"></i> Lista de unidades de medida</h3>
<div class="row mb">
    <div class="content-panel">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear unidad de medida</button> <br><br>
        <?php include 'views/unidades_medidas/agregar.php'; ?>
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
                    $sql = "SELECT * FROM unidades_medidas";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>

                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['descrip'] ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#EditarUnidadMedida<?php echo $mostrar['id'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <a onclick="eliminarunidadmedida(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        <?php include 'views/unidades_medidas/editar.php'; ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h3><i class="fa fa-angle-right"></i> Lista de presentaciones de mercancia</h3>
<div class="row mb">
    <div class="content-panel">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear nueva presentación de mercancia</button> <br><br>
        <?php include 'views/presentaciones/agregar.php'; ?>
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
                    $sql = "SELECT * FROM presentacion_mercancia";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['descrip'] ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#EditarPresentacion<?php echo $mostrar['id'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button onclick="eliminarpresentacion(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>
                        <?php include 'views/presentaciones/editar.php'; ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
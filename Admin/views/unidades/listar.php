<h3><i class="fa fa-angle-right"></i> Bitacora de unidades</h3>
<div class="row mb">
    <div class="content-panel">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Dar de alta unidades</button> <br><br>
        <?php include 'views/unidades/agregar.php'; ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Placas</th>
                        <th class="hidden-phone">Capacidad</th>
                        <th class="hidden-phone">Combustible</th>
                        <th class="hidden-phone">Tipo de Unidad</th>
                        <th class="hidden-phone">Acciones</th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM unidades";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>

                            <td><?php echo $mostrar['modelo'] ?></td>
                            <td><?php echo $mostrar['placas'] ?></td>
                            <td><?php echo $mostrar['capacidad'] ?></td>
                            <td><?php echo $mostrar['tipocombustible'] ?></td>
                            <td><?php
                                $sql1 = "SELECT * FROM tipos_transporte WHERE id='" . $mostrar['tipounidad'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['nombre'];
                                }
                                echo $nombre;
                                ?></td>
                            <td style="display: none;"><?php echo $mostrar['ano'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['color'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['noeconomico'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['serie'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['descripcion'] ?></td>
                            <td>
                                <a href='./editar_unidad.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                <a onclick="eliminarUnidad(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
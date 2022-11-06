<h3><i class="fa fa-angle-right"></i> Bitacora de viajes locales</h3>
<div class="row mb">
    <div class="content-panel">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear viaje local</button> <br><br>
        <?php include 'views/viajes_locales/agregar.php'; ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th>Unidad</th>
                        <th>Carga</th>
                        <th class="hidden-phone">Operador</th>
                        <th class="hidden-phone">Terminal de Carga</th>
                        <th>Terminal de descarga</th>
                        <th class="hidden-phone">Acciones</th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM viajes_locales";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php


                                $sql1 = "SELECT * FROM unidades WHERE id='" . $mostrar['unidad'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['modelo'];
                                }
                                echo $nombre;
                                ?></td>
                            <td><?php


                                $sql1 = "SELECT * FROM tipo_carga WHERE id='" . $mostrar['operador'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['nombre'];
                                }
                                echo $nombre;
                                ?></td>

                            <td><?php


                                $sql1 = "SELECT * FROM trabajador WHERE id='" . $mostrar['operador'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['nombre'];
                                }
                                echo $nombre;
                                ?></td>
                            <td><?php


                                $sql1 = "SELECT * FROM terminales WHERE id='" . $mostrar['terminal'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['nombre'];
                                }
                                echo $nombre;
                                ?></td>
                            <td style="display: none;"><?php


                                                        $sql1 = "SELECT * FROM tipo_servicio WHERE id='" . $mostrar['id_tipo_servicio'] . "'";
                                                        $result1 = mysqli_query($conexion, $sql1);
                                                        if ($Row = mysqli_fetch_array($result1)) {
                                                            $nombre = $Row['nombre'];
                                                        }
                                                        echo $nombre;
                                                        ?></td>
                            <td style="display: none;"><?php


                                                        $sql1 = "SELECT * FROM tipo_carga WHERE id='" . $mostrar['id_tipo_carga'] . "'";
                                                        $result1 = mysqli_query($conexion, $sql1);
                                                        if ($Row = mysqli_fetch_array($result1)) {
                                                            $nombre = $Row['nombre'];
                                                        }
                                                        echo $nombre;
                                                        ?></td>
                            <td style="display: none;"><?php


                                                        $sql1 = "SELECT * FROM tipo_contenedor WHERE id='" . $mostrar['id_tipo_contenedor'] . "'";
                                                        $result1 = mysqli_query($conexion, $sql1);
                                                        if ($Row = mysqli_fetch_array($result1)) {
                                                            $nombre = $Row['nombre'];
                                                        }
                                                        echo $nombre;
                                                        ?></td>

                            <td style="display: none;"><?php echo $mostrar['dec'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['peso_neto'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['peso_tara'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['peso_bruto'] ?></td>
                            <td><?php


                                $sql1 = "SELECT * FROM terminales WHERE id='" . $mostrar['destino'] . "'";
                                $result1 = mysqli_query($conexion, $sql1);
                                if ($Row = mysqli_fetch_array($result1)) {
                                    $nombre = $Row['nombre'];
                                }
                                echo $nombre;
                                ?></td>
                            <td style="display: none;"><?php echo $mostrar['naviera'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['eir'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['inicio_estadias'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['fin_estadias'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['fecha'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['no_contenedores'] ?></td>
                            <td>
                                <a href='./editar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                <a onclick='eliminarViaje(<?php echo $mostrar['id'] ?>)' class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- page end-->
</div>
<!-- /row -->
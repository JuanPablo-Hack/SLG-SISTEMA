<h3><i class="fa fa-angle-right"></i> Listado de Clientes</h3>
<div class="row mb">
    <div class="content-panel">
        <div class="adv-table">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear cliente</button> <br><br>
            <?php include 'views/clientes/agregar.php'; ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Razón Social</th>
                        <th class="hidden-phone">Email</th>
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
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM clientes";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['razon_social'] ?></td>
                            <td><?php echo $mostrar['email'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['situacion_fiscal'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['telefono'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['area'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['rfc'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['dir'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['cp'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['nombre_representante'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['cargo'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['tel_representante'] ?></td>
                            <td style="display: none;"><?php echo $mostrar['email_representante'] ?></td>
                            <td>
                                <a onclick="eliminarCliente(<?php echo $mostrar['id']  ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
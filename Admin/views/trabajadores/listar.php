<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear trabajador</button> <br><br>
            <?php include 'views/trabajadores/agregar.php'; ?>
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Lista de Trabajadores</h4>
                <hr>
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> Nombre</th>
                        <th class="hidden-phone"> Curp</th>
                        <th> RFC</th>
                        <th> Cargo</th>
                        <th> NSS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM trabajador";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['curp'] ?></td>
                            <td><?php echo $mostrar['rfc'] ?></td>
                            <td><?php echo $mostrar['nss'] ?></td>
                            <td><?php echo $mostrar['cargo'] ?></td>
                            <td>
                                <a href='./editar_trabajador.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                                <a onclick="eliminarOperador(<?php echo $mostrar['id']  ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
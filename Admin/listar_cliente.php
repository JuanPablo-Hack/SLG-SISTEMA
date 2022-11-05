<?php
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
</head>

<body>
    <section id="container">
        <?php include("templates/nav.php"); ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Listado de Clientes</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="adv-table">
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
                                                <a href='./editar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
            </section>
            <!-- /wrapper -->
        </section>
        <?php include("templates/footer.php"); ?>
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.js"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/lib/jquery.scrollTo.min.js"></script>
    <script src="../assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <!--common script for all pages-->
    <script src="../assets/lib/common-scripts.js"></script>
    <!--script for this page-->
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/clientes.js"></script>
</body>

</html>
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
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="profile.html"><img src="../assets/img/slg.png" class="img-circle" width="80"></a></p>
                    <h5 class="centered">Admin</h5>
                    <li class="mt">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Panel de Control</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tag"></i>
                            <span>Almacen</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_ingresos.php">Bitacoras de Ingresos</a></li>
                            <li><a href="listar_salidad.php">Bitacoras de Salidas</a></li>
                            <li><a href="listar_orden.php">Bitacora de mercancia</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-truck"></i>
                            <span>Viajes</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_orden2.php">Viajes Locales</a></li>
                            <li><a href="listar_orden3.php">Viajes Foraneos</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-car"></i>
                            <span>Unidades</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_unidades.php">Mis Unidades</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-group"></i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_proveedores.php">Lista de proveedores</a></li>
                            <li><a href="listar_cliente.php">Listar Clientes</a></li>
                            <li><a href="listar_trabajador.php">Lista de trabajadores</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-money"></i>
                            <span>Contabilidad</span>
                        </a>
                        <ul class="sub">
                            <li class="active"><a href="listar_facturas.php">Bitacora de facturas</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Variables del sistema</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_mercancia.php">Tipos de mercancia</a></li>
                            <li><a href="listar_presentaciones.php">Presentaciones de mercancia</a></li>
                            <li><a href="listar_tiposoperaciones.php">Tipos de operacion</a></li>
                            <li><a href="listar_tiposcontenedor.php">Tipos de contenedor</a></li>
                            <li><a href="listar_unidadesmedida.php">Unidades de medida</a></li>
                            <li><a href="listar_tipos_servicios.php">Tipos de servicio</a></li>
                            <li><a href="listar_cargas.php">Tipos de carga</a></li>
                            <li><a href="listar_terminales.php">Terminales de carga</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Bitacora de viajes locales</h3>
                <div class="row mb">
                    <div class="content-panel">
                        <a class="btn btn-success" href="./alta_facturas.php">Crear factura</a> <br><br>
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Servicio</th>
                                        <th class="hidden-phone">PDF</th>
                                        <th class="hidden-phone">XML</th>
                                        <th class="hidden-phone">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM facturas";
                                    $resultado = $conexion->query($sql);
                                    while ($mostrar = mysqli_fetch_array($resultado)) {
                                    ?>
                                        <tr>
                                            <td><?php
                                                $sql1 = "SELECT * FROM clientes WHERE id='" . $mostrar['id_cliente'] . "'";
                                                $result1 = mysqli_query($conexion, $sql1);
                                                if ($Row = mysqli_fetch_array($result1)) {
                                                    echo $Row['nombre'];
                                                }
                                                ?></td>
                                            <td><?php echo 'Viaje-Local-' . $mostrar['id_servicio'] ?></td>
                                            <td><a href="../contabilidad/<?php echo $mostrar['id_cliente']  ?>/<?php echo $mostrar['factura']  ?>" download="Factura"><img src="../assets/img/icons/pdf.png" alt="PDF" style="width: 25px; height: 25px" /></a></td>
                                            <td><a href="../contabilidad/<?php echo $mostrar['id_cliente']  ?>/<?php echo $mostrar['xml']  ?>" download="XML"><img src="../assets/img/icons/xml.png" alt="XML" style="width: 25px; height: 25px" /></a></td>
                                            <td>
                                                <a href='./editar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                <a onclick="eliminarFactura(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>
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
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <!--script for this page-->
    <script type="text/javascript">
        $(document).ready(function() {
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });
        });
    </script>
    <script>
        function eliminarFactura(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = new FormData();
                        data.append("id", id);
                        data.append("accion", "eliminar");
                        fetch("php/facturas_controller.php", {
                                method: "POST",
                                body: data,
                            })
                            .then((result) => result.text())
                            .then((result) => {
                                if (result == 1) {
                                    swalWithBootstrapButtons.fire(
                                        "Eliminado!",
                                        "Su archivo ha sido eliminado.",
                                        "success"
                                    );
                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Error",
                                        "Hemos tenido un error a la base de datos o la conexión.",
                                        "error"
                                    );
                                    //   setTimeout(function () {
                                    //     location.reload();
                                    //   }, 3000);
                                }
                            });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelado",
                            "Tu archivo ha sido salvado",
                            "error"
                        );
                    }
                });
        }
    </script>
</body>

</html>
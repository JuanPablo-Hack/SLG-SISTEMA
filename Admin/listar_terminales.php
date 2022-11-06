<?php
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("templates/head.php");
    include 'php/conexion.php';
    ?>
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
                        <a href="javascript:;">
                            <i class="fa fa-money"></i>
                            <span>Contabilidad</span>
                        </a>
                        <ul class="sub">
                            <li><a href="listar_facturas.php">Bitacora de facturas</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
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
                            <li class="active"><a href="listar_terminales.php">Terminales de carga</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper">
                <?php include("views/terminales/listar.php"); ?>
            </section>
        </section>
        <?php include("templates/footer.php"); ?>
    </section>
    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/lib/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <script src="../assets/lib/common-scripts.js"></script>
    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.js"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/lib/jquery.scrollTo.min.js"></script>
    <script src="../assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/terminales.js"></script>
</body>

</html>
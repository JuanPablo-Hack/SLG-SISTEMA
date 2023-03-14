<?php
include 'php/conexion.php';
$sql = "SELECT * FROM clientes";
$result = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM viajes_locales";
$result2 = mysqli_query($conexion, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
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
                <h3><i class="fa fa-angle-right"></i> Crear registro de facturas</h3>
                <div class="row mt">
                    <!--  DATE PICKERS -->
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <form class="form-horizontal style-form" id="formFacturas" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Cliente</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name='cliente'>
                                            <option value="0"></option>
                                            <?php
                                            while ($Row1 = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ID. Servicio</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name='servicio'>
                                            <option value="0"></option>
                                            <?php
                                            while ($Row1 = mysqli_fetch_array($result2)) {
                                            ?>
                                                <option value=<?php echo $Row1['id']; ?>><?php echo 'Viaje-Local-' . $Row1['id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Subir PDF</label>
                                    <div class="controls col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                <input type="file" class="default" name="pdf" />
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Subir XML</label>
                                    <div class="controls col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                <input type="file" class="default" name="xml" />
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Guardar</button>
                                        <button class="btn btn-theme04" type="button">Cancelar</button>
                                    </div>
                                </div>


                            </form>
                        </div>


                        <!-- col-lg-12-->
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
                <!-- DATE TIME PICKERS -->

                <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
                </div>
                <!-- row -->
            </section>
            <!-- /wrapper -->
        </section>
        <?php include("templates/footer.php"); ?>
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/lib/jquery.scrollTo.min.js"></script>
    <script src="../assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="../assets/lib/common-scripts.js"></script>
    <!--script for this page-->
    <script src="../assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="../assets/lib/advanced-form-components.js"></script>
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document
                .getElementById("formFacturas")
                .addEventListener("submit", formFacturas);
        });
        async function formFacturas(e) {
            e.preventDefault();
            var form = document.getElementById("formFacturas");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: "Estas seguro que la información es la correcta?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, agregar actividad",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = new FormData(form);
                        data.append("accion", "agregar");
                        fetch("php/facturas_controller.php", {
                                method: "POST",
                                body: data,
                            })
                            .then((result) => result.text())
                            .then((result) => {
                                if (result == 1) {
                                    swalWithBootstrapButtons.fire(
                                        "Agregado!",
                                        "La actividad ha sido agregado en la base de datos.",
                                        "success"
                                    );
                                    form.reset();
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Error",
                                        "Hemos tenido un error a la base de datos o la conexión.",
                                        "error"
                                    );
                                    // form.reset();
                                    // setTimeout(function() {
                                    //     location.reload();
                                    // }, 2000);
                                }
                            });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelado",
                            "Revise su información de nuevo",
                            "error"
                        );
                    }
                });
        }
    </script>

</body>

</html>
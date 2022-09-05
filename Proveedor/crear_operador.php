<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../error_login.html");
} else {
    if ($_SESSION['datos_cargados'] == 0) {
        header("Location: ./profile.php");
    }
}
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
                <h3><i class="fa fa-angle-right"></i> Alta de Trabajadores</h3>
                <div class="row mt">
                    <div class="col-lg-12">

                        <div class="form-panel">
                            <div class="form">
                                <form class="cmxform form-horizontal style-form" id="AltaTrabajador" enctype="multipart/form-data">
                                    <input type="hidden" name="id_proveedor" value="<?php echo $_SESSION['usuario']; ?>">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Nombre Completo</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="nombre" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-2">CURP</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="curp" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Teléfono</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="tel" type="tel" />
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Subir imagen del ine</label>
                                        <div class="col-md-9">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-theme02 btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Seleccionar Imagen</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" class="form-control" id="image" name="foto3" multiple>
                                                    </span>
                                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                </div>
                                            </div>
                                            <span class="label label-info">NOTA!</span>
                                            <span>
                                                No se te olvide adjuntar todas las fotos de las evidencias del servicio.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Subir imagen de la licencia de conducir</label>
                                        <div class="col-md-9">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-theme02 btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Seleccionar Imagen</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" class="form-control" id="image" name="foto4" multiple>
                                                    </span>
                                                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                </div>
                                            </div>
                                            <span class="label label-info">NOTA!</span>
                                            <span>
                                                No se te olvide adjuntar todas las fotos de las evidencias del servicio.
                                            </span>
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
                        </div>
                        <!-- /form-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </section>
            <!-- /wrapper -->
        </section>
        <?php include("templates/footer.php"); ?>
    </section>
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
    <script type="text/javascript" src="../assets/ib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="../assets/lib/advanced-form-components.js"></script>
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("AltaTrabajador").addEventListener("submit", AltaTrabajador);
        });
        async function AltaTrabajador(e) {
            e.preventDefault();
            var form = document.getElementById("AltaTrabajador");
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
                    confirmButtonText: "Si, agregar unidad",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = new FormData(form);
                        data.append("accion", "agregar");
                        fetch("php/operadores_controller.php", {
                                method: "POST",
                                body: data,
                            })
                            .then((result) => result.text())
                            .then((result) => {
                                if (result == 1) {
                                    swalWithBootstrapButtons.fire(
                                        "Agregado!",
                                        "La unidad ha sido agregado en la base de datos.",
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
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
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
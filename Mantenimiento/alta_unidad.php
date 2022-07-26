<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/head.php'; ?>
</head>

<body>
    <section id="container">
        <?php include 'templates/nav.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Alta de Unidad</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class=" form">
                                <form class="cmxform form-horizontal style-form" id="FormUnidad">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Modelo</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="modelo" minlength="2" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Año</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="cname" name="ano" minlength="2" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Color</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="color" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Placas</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="placas" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">No. economico</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="no_economico" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Capacidad de Carga</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="capacidad" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Tipo de unidad</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="tipo_unidad" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Tipo de Combustible</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="tipo_combustible" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">No. de serie</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="text" name="serie" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Descripción</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " id="ccomment" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-theme" type="submit">Enviar</button>
                                            <a href="listar_unidades.php" class="btn btn-theme04" type="button">Cancelar</a>
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

                <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </section>
            <!-- /wrapper -->
        </section>
        <?php include 'templates/footer.php'; ?>
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
    <script src="../assets/lib/form-validation-script.js"></script>
    <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/controller.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
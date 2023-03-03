<?php
include 'php/conexion.php';
$sql = "SELECT * FROM tipo_contenedor";
$result = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM ingreso_almacen";
$result2 = mysqli_query($conexion, $sql2);
$sql3 = "SELECT * FROM unidades_medidas";
$result3 = mysqli_query($conexion, $sql3);
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
            <a href="javascript:;" class="active">
              <i class="fa fa-tag"></i>
              <span>Almacen</span>
            </a>
            <ul class="sub">
              <li><a href="listar_ingresos.php">Bitacoras de Ingresos</a></li>
              <li class="active"><a href="listar_salidad.php">Bitacoras de Salidas</a></li>
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
        <h3><i class="fa fa-angle-right"></i> Crear Salida de Mercancía</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" id="formSalidaMercancia" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Folio de mercancia</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='id_mercancia'>
                      <option value="0"></option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result2)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <hr>
                <h3>Datos de la unidad</h3>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Linea Transportista</label>
                  <div class="col-sm-4">
                    <input type="text" name='transportista' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Operador</label>
                  <div class="col-sm-4">
                    <input type="text" name='operador' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Placas tractocamión</label>
                  <div class="col-sm-4">
                    <input type="text" name='placas_tracto' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Placas remolques</label>
                  <div class="col-sm-4">
                    <input type="text" name='placas_remolque' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. caja o contenedor </label>
                  <div class="col-sm-4">
                    <input type="text" name='no_caja' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tipo de Contenedor</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='tipo_contenedor'>
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
                  <label class="col-sm-2 col-sm-2 control-label">No. sello </label>
                  <div class="col-sm-4">
                    <input type="text" name='no_sello' class="form-control">
                  </div>
                </div>
                <hr>
                <h3>Datos de la mercancia</h3>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Cantidad de Salida</label>
                  <div class="col-sm-4">
                    <input type="text" name='cantidad' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Unidad de medida</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='unidad_medida'>
                      <option value="0"></option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result3)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Firma de supervisor</label>
                  <div class="col-md-9">
                    <canvas id="canvas" style="border: 1px solid #000;  width: 250px; height: 150px;"></canvas>
                  </div>
                </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                          <input type="file" class="form-control" id="image" name="foto1" multiple>
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
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                          <input type="file" class="form-control" id="image" name="foto2" multiple>
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
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                <div class="form-group last">
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                          <input type="file" class="form-control" id="image" name="foto5" multiple>
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
                  <label class="control-label col-md-3">Subir imagen de la mercancia</label>
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
                          <input type="file" class="form-control" id="image" name="foto6" multiple>
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
    <?php include("templates/footer.php"); ?>../assets/
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
  <script type="text/javascript" src="../assets/ib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../assets/lib/advanced-form-components.js"></script>
  <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="js/firmar.js"></script>
  <script src="js/main.js"></script>
  <script src="js/controller.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document
        .getElementById("formSalidaMercancia")
        .addEventListener("submit", formSalidaMercancia);
    });
    async function formSalidaMercancia(e) {
      e.preventDefault();
      var form = document.getElementById("formSalidaMercancia");
      const image = miCanvas.toDataURL("image/png");
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
            data.append("accion", "salida");
            data.append("firma", image);
            fetch("php/almacen_controller.php", {
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
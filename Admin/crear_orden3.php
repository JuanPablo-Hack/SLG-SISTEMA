<?php
include 'php/conexion.php';
$sql = "SELECT * FROM tipo_servicio";
$result = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM carga";
$result2 = mysqli_query($conexion, $sql2);
$sql3 = "SELECT * FROM trabajador";
$result3 = mysqli_query($conexion, $sql3);
$sql4 = "SELECT * FROM terminales WHERE tipo_terminal=1";
$result4 = mysqli_query($conexion, $sql4);
$sql5 = "SELECT * FROM tipo_operacion";
$result5 = mysqli_query($conexion, $sql5);
$sql6 = "SELECT * FROM tipo_contenedor";
$result6 = mysqli_query($conexion, $sql6);
$sql7 = "SELECT * FROM unidades";
$result7 = mysqli_query($conexion, $sql7);
$sql8 = "SELECT * FROM clientes";
$result8 = mysqli_query($conexion, $sql8);
$sql9 = "SELECT * FROM terminales WHERE tipo_terminal=2";
$result9 = mysqli_query($conexion, $sql9);
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
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Crear viajes locales</h3>
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" id="formViajeLocal" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Cliente</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='cliente'>
                      <option value="0"></option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result8)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Fecha de servicio</label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline" size="16" type="date" name="fecha">
                    <span class="help-block">Selecciona una fecha</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tipo unidad</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='tipo_unidad' id="filtro_unidad">
                      <option value="0">-</option>
                      <option value="1">Propias</option>
                      <option value="2">Proveedor</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Unidad Asignada</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='unidad' id="unidades"></select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tipo de servicio</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='tipo_servicio'>
                      <option value="0">-</option>
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
                  <label class="col-sm-2 col-sm-2 control-label">Tipo de carga</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='tipo_carga'>
                      <option value="0">-</option>
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
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tipo de contenedor</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='tipo_contenedor'>
                      <option value="0">-</option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result6)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre'] . '-' . $Row1['descrip']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. caja o contenedor </label>
                  <div class="col-sm-4">
                    <input type="text" name='no_caja' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">
                    Operador
                  </label>
                  <div class="col-sm-4">
                    <select class="form-control" name='operador'>
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
                <div class="form-group">
                  <label class="control-label col-md-3">Subir DEC</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                        <input type="file" class="default" name="dec" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">
                    Terminal de carga
                  </label>
                  <div class="col-sm-4">
                    <select class="form-control" name='terminal_carga'>
                      <option value="0">-</option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result4)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Peso Neto</label>
                  <div class="col-sm-4">
                    <input type="text" name='p_neto' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Peso Tara</label>
                  <div class="col-sm-4">
                    <input type="text" name='p_tara' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Peso Bruto</label>
                  <div class="col-sm-4">
                    <input type="text" name='p_bruto' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">
                    Patio de Destino
                  </label>
                  <div class="col-sm-4">
                    <select class="form-control" name='patio_destino'>
                      <option value="0">-</option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result9)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['nombre']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Naviera</label>
                  <div class="col-sm-4">
                    <input type="text" name='naviera' class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Subir EIR</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selecciona un archivo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                        <input type="file" class="default" name="eir" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Fecha de inicio servicio</label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline" size="16" type="date" name="inicio_estadias">
                    <span class="help-block">Selecciona una fecha</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Fecha de fin servicio</label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline" size="16" type="date" name="termino_estadias">
                    <span class="help-block">Selecciona una fecha</span>
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
    $(document).ready(function() {
      $("#filtro_unidad").change(function() {
        $("#filtro_unidad option:selected").each(function() {
          id_tipo = $(this).val();
          $.post("php/unidades.php", {
            id_tipo: id_tipo
          }, function(data) {
            $("#unidades").html(data);
          });
        });
      })
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document
        .getElementById("formViajeLocal")
        .addEventListener("submit", formViajeLocal);
    });
    async function formViajeLocal(e) {
      e.preventDefault();
      var form = document.getElementById("formViajeLocal");
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
            data.append("accion", "agregar_viajelocal");
            fetch("php/viajes_controller.php", {
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
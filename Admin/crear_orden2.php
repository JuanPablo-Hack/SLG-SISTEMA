<?php
include 'php/conexion.php';
$sql = "SELECT * FROM trabajador";
$result = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM unidades";
$result2 = mysqli_query($conexion, $sql2);
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
        <h3><i class="fa fa-angle-right"></i> Crear Salida de Mercancía</h3>
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="php/crear_orden.php" class="form-horizontal style-form" method='POST'>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Folio de mercancia</label>
                  <div class="col-sm-4">
                    <select class="form-control" name='unidad'>
                      <option value="0"></option>
                      <?php
                      while ($Row1 = mysqli_fetch_array($result2)) {
                      ?>
                        <option value=<?php echo $Row1['id']; ?>><?php echo $Row1['modelo']; ?></option>
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
                    <input type="text" name='no_contenedor' class="form-control">
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
                      while ($Row1 = mysqli_fetch_array($result)) {
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
                  <label class="control-label col-md-3">Firma de operador</label>
                  <div class="col-md-9">
                    <canvas id="canvas2" style="border: 1px solid #000;  width: 250px; height: 150px;"></canvas>
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
  <script type="text/javascript" src="../assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../assets/lib/advanced-form-components.js"></script>
  <script src="./main.js"></script>
  <script>
    let miCanvas = document.querySelector("#canvas");
    let lineas = [];
    let correccionX = 0;
    let correccionY = 0;
    let pintarLinea = false;
    // Marca el nuevo punto
    let nuevaPosicionX = 0;
    let nuevaPosicionY = 0;

    let posicion = miCanvas.getBoundingClientRect();
    correccionX = posicion.x;
    correccionY = posicion.y;

    miCanvas.width = 250;
    miCanvas.height = 150;

    //======================================================================
    // FUNCIONES
    //======================================================================

    /**
     * Funcion que empieza a dibujar la linea
     */
    function empezarDibujo() {
      pintarLinea = true;
      lineas.push([]);
    }

    /**
     * Funcion que guarda la posicion de la nueva línea
     */
    function guardarLinea() {
      lineas[lineas.length - 1].push({
        x: nuevaPosicionX,
        y: nuevaPosicionY,
      });
    }

    /**
     * Funcion dibuja la linea
     */
    function dibujarLinea(event) {
      event.preventDefault();
      if (pintarLinea) {
        let ctx = miCanvas.getContext("2d");
        // Estilos de linea
        ctx.lineJoin = ctx.lineCap = "round";
        ctx.lineWidth = 2;
        // Color de la linea
        ctx.strokeStyle = "#000000";
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
          // Versión ratón
          nuevaPosicionX = event.layerX;
          nuevaPosicionY = event.layerY;
        } else {
          // Versión touch, pantalla tactil
          nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
          nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
        }
        // Guarda la linea
        guardarLinea();
        // Redibuja todas las lineas guardadas
        ctx.beginPath();
        lineas.forEach(function(segmento) {
          ctx.moveTo(segmento[0].x, segmento[0].y);
          segmento.forEach(function(punto, index) {
            ctx.lineTo(punto.x, punto.y);
          });
        });
        ctx.stroke();
      }
    }

    /**
     * Funcion que deja de dibujar la linea
     */
    function pararDibujar() {
      pintarLinea = false;
      guardarLinea();
    }

    //======================================================================
    // EVENTOS
    //======================================================================
    // Eventos pantallas táctiles
    miCanvas.addEventListener("touchstart", empezarDibujo, false);
    miCanvas.addEventListener("touchmove", dibujarLinea, false);
  </script>
  <script>
    let miCanvas = document.querySelector("#canvas2");
    let lineas = [];
    let correccionX = 0;
    let correccionY = 0;
    let pintarLinea = false;
    // Marca el nuevo punto
    let nuevaPosicionX = 0;
    let nuevaPosicionY = 0;

    let posicion = miCanvas.getBoundingClientRect();
    correccionX = posicion.x;
    correccionY = posicion.y;

    miCanvas.width = 250;
    miCanvas.height = 150;

    //======================================================================
    // FUNCIONES
    //======================================================================

    /**
     * Funcion que empieza a dibujar la linea
     */
    function empezarDibujo() {
      pintarLinea = true;
      lineas.push([]);
    }

    /**
     * Funcion que guarda la posicion de la nueva línea
     */
    function guardarLinea() {
      lineas[lineas.length - 1].push({
        x: nuevaPosicionX,
        y: nuevaPosicionY,
      });
    }

    /**
     * Funcion dibuja la linea
     */
    function dibujarLinea(event) {
      event.preventDefault();
      if (pintarLinea) {
        let ctx = miCanvas.getContext("2d");
        // Estilos de linea
        ctx.lineJoin = ctx.lineCap = "round";
        ctx.lineWidth = 2;
        // Color de la linea
        ctx.strokeStyle = "#000000";
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
          // Versión ratón
          nuevaPosicionX = event.layerX;
          nuevaPosicionY = event.layerY;
        } else {
          // Versión touch, pantalla tactil
          nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
          nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
        }
        // Guarda la linea
        guardarLinea();
        // Redibuja todas las lineas guardadas
        ctx.beginPath();
        lineas.forEach(function(segmento) {
          ctx.moveTo(segmento[0].x, segmento[0].y);
          segmento.forEach(function(punto, index) {
            ctx.lineTo(punto.x, punto.y);
          });
        });
        ctx.stroke();
      }
    }

    /**
     * Funcion que deja de dibujar la linea
     */
    function pararDibujar() {
      pintarLinea = false;
      guardarLinea();
    }

    //======================================================================
    // EVENTOS
    //======================================================================
    // Eventos pantallas táctiles
    miCanvas.addEventListener("touchstart", empezarDibujo, false);
    miCanvas.addEventListener("touchmove", dibujarLinea, false);
  </script>
</body>

</html>
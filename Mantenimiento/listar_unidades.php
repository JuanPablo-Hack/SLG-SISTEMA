<?php
include 'php/conexion.php';
?>
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
        <h3><i class="fa fa-angle-right"></i> Bitacora de Unidades</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">

              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Modelo</th>
                      <th class="numeric">Año</th>
                      <th class="numeric">Color</th>
                      <th class="numeric">Placas</th>
                      <th class="numeric">No. Economíco</th>
                      <th class="numeric">Capacidad</th>
                      <th class="numeric">Tipo de Unidada</th>
                      <th class="numeric">Tipo de Combustible</th>
                      <th class="numeric">Serie</th>
                      <th class="numeric">Descripcion</th>
                      <th class="numeric">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM unidades";
                    $resultado = $conexion->query($sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                      <tr>
                        <td><?php echo $mostrar['id'] ?></td>
                        <td><?php echo $mostrar['modelo'] ?></td>
                        <td><?php echo $mostrar['ano'] ?></td>
                        <td><?php echo $mostrar['color'] ?></td>
                        <td><?php echo $mostrar['placas'] ?></td>
                        <td><?php echo $mostrar['noeconomico'] ?></td>
                        <td><?php echo $mostrar['capacidad'] ?></td>
                        <td><?php echo $mostrar['tipounidad'] ?></td>
                        <td><?php echo $mostrar['tipocombustible'] ?></td>
                        <td><?php echo $mostrar['serie'] ?></td>
                        <td><?php echo $mostrar['descripcion'] ?></td>
                        <td>




                          <a href='./editar_unidad.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a onclick="eliminarUnidad(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>

                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->

        <!-- /content-panel -->
        </div>
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
  <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="js/controller.js"></script>
</body>

</html>
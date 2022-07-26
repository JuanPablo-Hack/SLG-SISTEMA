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
      <!-- /wrapper -->
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Listado de Cargas de Combustible</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Unidad</th>
                    <th class="numeric">Fecha</th>
                    <th class="hidden-phone">Tipo Servicio</th>
                    <th class="numeric">Operador</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM registros_combustible";
                  $resultado = $conexion->query($sql);
                  while ($mostrar = mysqli_fetch_array($resultado)) {
                  ?>
                    <tr>
                      <td><a href="./detalles_combustible.php?id_combustible=<?php echo $mostrar['id']  ?>"><?php echo 'COMBUS2022-' . $mostrar['id'] ?></a></td>
                      <td><a href="./detalles_unidad.php?id_unidad=<?php echo $mostrar['unidad']  ?>"><?php
                                                                                                        $sql1 = "SELECT * FROM unidades WHERE id='" . $mostrar['unidad'] . "'";
                                                                                                        $result1 = mysqli_query($conexion, $sql1);
                                                                                                        if ($Row = mysqli_fetch_array($result1)) {
                                                                                                          $nombre = $Row['modelo'];
                                                                                                        }
                                                                                                        echo $nombre;
                                                                                                        ?></a></td>
                      <td><?php echo $mostrar['fecha'] ?></td>
                      <td><?php echo $mostrar['tiposervicio'] ?></td>
                      <td><a href="./detalles_trabajador.php?id_trabajador=<?php echo $mostrar['operador']  ?>"><?php
                                                                                                                $sql1 = "SELECT * FROM trabajador WHERE id='" . $mostrar['operador'] . "'";
                                                                                                                $result1 = mysqli_query($conexion, $sql1);
                                                                                                                if ($Row = mysqli_fetch_array($result1)) {
                                                                                                                  $nombre = $Row['nombre'];
                                                                                                                }
                                                                                                                echo $nombre;
                                                                                                                ?></a></td>
                      <td>



                        <a href='./editar_combustible.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a onclick="eliminarCombustible(<?php echo $mostrar['id'] ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>



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

        <!-- /content-panel -->
        </div>
        <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>

    </section>
    <?php include 'templates/footer.php'; ?>
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
  <script type="text/javascript">
    $(document).ready(function() {
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
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
  <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="js/controller.js"></script>
</body>

</html>
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
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Bitacora de viajes locales</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Unidad</th>
                    <th>Carga</th>
                    <th class="hidden-phone">Operador</th>
                    <th class="hidden-phone">Terminal de Carga</th>
                    <th class="hidden-phone">Acciones</th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM viajes_locales";
                  $resultado = $conexion->query($sql);
                  while ($mostrar = mysqli_fetch_array($resultado)) {
                  ?>
                    <tr>
                      <td><?php


                          $sql1 = "SELECT * FROM unidades WHERE id='" . $mostrar['unidad'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['modelo'];
                          }
                          echo $nombre;
                          ?></td>
                      <td><?php


                          $sql1 = "SELECT * FROM tipo_carga WHERE id='" . $mostrar['operador'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>

                      <td><?php


                          $sql1 = "SELECT * FROM trabajador WHERE id='" . $mostrar['operador'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td><?php


                          $sql1 = "SELECT * FROM terminales WHERE id='" . $mostrar['terminal'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td style="display: none;"><?php


                                                  $sql1 = "SELECT * FROM tipo_servicio WHERE id='" . $mostrar['id_tipo_servicio'] . "'";
                                                  $result1 = mysqli_query($conexion, $sql1);
                                                  if ($Row = mysqli_fetch_array($result1)) {
                                                    $nombre = $Row['nombre'];
                                                  }
                                                  echo $nombre;
                                                  ?></td>
                      <td style="display: none;"><?php


                                                  $sql1 = "SELECT * FROM tipo_carga WHERE id='" . $mostrar['id_tipo_carga'] . "'";
                                                  $result1 = mysqli_query($conexion, $sql1);
                                                  if ($Row = mysqli_fetch_array($result1)) {
                                                    $nombre = $Row['nombre'];
                                                  }
                                                  echo $nombre;
                                                  ?></td>
                      <td style="display: none;"><?php


                                                  $sql1 = "SELECT * FROM tipo_contenedor WHERE id='" . $mostrar['id_tipo_contenedor'] . "'";
                                                  $result1 = mysqli_query($conexion, $sql1);
                                                  if ($Row = mysqli_fetch_array($result1)) {
                                                    $nombre = $Row['nombre'];
                                                  }
                                                  echo $nombre;
                                                  ?></td>

                      <td style="display: none;"><?php echo $mostrar['dec'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['peso_neto'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['peso_tara'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['peso_bruto'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['destino'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['naviera'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['eir'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['inicio_estadias'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['fin_estadias'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['fecha'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_contenedores'] ?></td>
                      <td>


                        <a href='./orden.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></a>

                        <a href='./editar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href='./eliminar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Fecha:</td><td>' + aData[17] + '</td></tr>';
      sOut += '<tr><td>Tipo de unidad:</td><td>Propia</td></tr>';
      sOut += '<tr><td>Unidad:</td><td>' + aData[1] + '</td></tr>';
      sOut += '<tr><td>Tipo de servicio:</td><td>' + aData[6] + '</td></tr>';
      sOut += '<tr><td>Tipo de carga:</td><td>' + aData[2] + '</td></tr>';
      sOut += '<tr><td>Tipo de contenedor:</td><td>' + aData[7] + '</td></tr>';
      sOut += '<tr><td>No.contenedores:</td><td>' + aData[18] + '</td></tr>';
      sOut += '<tr><td>Operador:</td><td>' + aData[3] + '</td></tr>';
      sOut += '<tr><td>DEC:</td><td><a href="../viajes/locales/' + aData[17] + '/' + aData[8] + '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file"></i></a></td></tr>';
      sOut += '<tr><td>Terminal:</td><td>' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Peso neto:</td><td>' + aData[9] + '</td></tr>';
      sOut += '<tr><td>Peso tara:</td><td>' + aData[10] + '</td></tr>';
      sOut += '<tr><td>Peso bruto:</td><td>' + aData[11] + '</td></tr>';
      sOut += '<tr><td>Destino:</td><td>' + aData[12] + '</td></tr>';
      sOut += '<tr><td>Naviera:</td><td>' + aData[13] + '</td></tr>';
      sOut += '<tr><td>EIR:</td><td><a href="../viajes/locales/' + aData[17] + '/' + aData[14] + '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file"></i></a></td></tr>';
      sOut += '<tr><td>Fecha de inicio de estadias:</td><td>' + aData[15] + '</td></tr>';
      sOut += '<tr><td>Fecha de termino de estadias:</td><td>' + aData[16] + '</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="../assets/lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

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

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "../assets/lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "../assets/lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
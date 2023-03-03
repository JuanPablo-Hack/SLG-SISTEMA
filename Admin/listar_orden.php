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
              <li><a href="listar_salidad.php">Bitacoras de Salidas</a></li>
              <li class="active"><a href="listar_orden.php">Bitacora de mercancia</a></li>
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
        <h3><i class="fa fa-angle-right"></i> Bitacora de mercancia</h3>
        <div class="row mb">
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Cliente</th>
                    <th>Cantidad</th>
                    <th class="hidden-phone">Mercancia</th>
                    <th class="hidden-phone">Presentación</th>
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
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM ingreso_almacen";
                  $resultado = $conexion->query($sql);
                  while ($mostrar = mysqli_fetch_array($resultado)) {
                  ?>
                    <tr>
                      <td><?php


                          $sql1 = "SELECT * FROM clientes WHERE id='" . $mostrar['id_cliente'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td><?php echo $mostrar['cantidad'] ?></td>
                      <td><?php


                          $sql1 = "SELECT * FROM mercancia WHERE id='" . $mostrar['id_tipo_mercancia'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td><?php


                          $sql1 = "SELECT * FROM presentacion_mercancia WHERE id='" . $mostrar['id_presentacion_mercancia'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td style="display: none;"><?php echo $mostrar['fecha'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['hora'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_pedimento'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['transportista'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['operador'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_placas_tracto'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_placas_remolque'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_caja'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['sello'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['nombre'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['descripcion'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['cantidad'] ?></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td style="display: none;"></td>
                      <td>
                        <a href='./editar_orden.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href='./eliminar_orden.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <?php include("templates/footer.php"); ?>
    <!--footer end-->
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
      sOut += '<tr><td>Nombre del Cliente:</td><td>' + aData[1] + '</td></tr>';
      sOut += '<tr><td>Fecha de Ingreso:</td><td>' + aData[5] + '</td></tr>';
      sOut += '<tr><td>Hora:</td><td>' + aData[6] + '</td></tr>';
      sOut += '<tr><td>Tipo de mercancia:</td><td>' + aData[3] + '</td></tr>';
      sOut += '<tr><td>Presentación:</td><td>' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Pedimento:</td><td>' + aData[7] + '</td></tr>';
      sOut += '<tr><td>Tipo de operacion:</td><td>' + aData[8] + '</td></tr>';
      sOut += '<tr><td>Transportista:</td><td>' + aData[9] + '</td></tr>';
      sOut += '<tr><td>Operador:</td><td>' + aData[10] + '</td></tr>';
      sOut += '<tr><td>No. Placas Tracto:</td><td>' + aData[11] + '</td></tr>';
      sOut += '<tr><td>No. Placas Remolque:</td><td>' + aData[12] + '</td></tr>';
      sOut += '<tr><td>No. Caja:</td><td>' + aData[13] + '</td></tr>';
      sOut += '<tr><td>Sello:</td><td>' + aData[14] + '</td></tr>';
      sOut += '<tr><td>Nombre:</td><td>' + aData[15] + '</td></tr>';
      sOut += '<tr><td>Cantidad:</td><td>' + aData[2] + '</td></tr>';
      sOut += '<tr><td>Descripción:</td><td>' + aData[14] + '</td></tr>';
      sOut += '<tr><td>Firma de Supervisor:</td><td><a href="../firmas/' + aData[16] + '" target="_blank" rel="noopener noreferrer">Imagen</a></td></tr>';
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
</body </html>
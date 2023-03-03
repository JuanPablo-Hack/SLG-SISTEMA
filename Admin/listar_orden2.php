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
            <a class="active" href="javascript:;">
              <i class="fa fa-truck"></i>
              <span>Viajes</span>
            </a>
            <ul class="sub">
              <li class="active"><a href="listar_orden2.php">Viajes Locales</a></li>
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
        <h3><i class="fa fa-angle-right"></i> Bitacora de viajes locales</h3>
        <div class="row mb">
          <div class="content-panel">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Crear viaje local</button> <br><br>

            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Unidad</th>
                    <th>Carga</th>
                    <th class="hidden-phone">Operador</th>
                    <th class="hidden-phone">Terminal de Carga</th>
                    <th>Terminal de descarga</th>
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
                      <td><?php


                          $sql1 = "SELECT * FROM terminales WHERE id='" . $mostrar['destino'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td style="display: none;"><?php echo $mostrar['naviera'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['eir'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['inicio_estadias'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['fin_estadias'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['fecha'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['no_contenedores'] ?></td>
                      <td>
                        <a href='./editar_orden2.php?id=<?php echo $mostrar['id']  ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a onclick='eliminarViaje(<?php echo $mostrar['id'] ?>)' class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
    </section>
    <?php include("templates/footer.php"); ?>
  </section>
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/lib/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <script src="../assets/lib/common-scripts.js"></script>
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.js"></script>
  <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../assets/lib/jquery.scrollTo.min.js"></script>
  <script src="../assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../assets/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../assets/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="js/viajes_locales.js"></script>
</body>

</html>
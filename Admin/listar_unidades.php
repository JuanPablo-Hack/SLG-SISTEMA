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
        <h3><i class="fa fa-angle-right"></i> Bitacora de mercancia</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Modelo</th>
                    <th>Placas</th>
                    <th class="hidden-phone">Capacidad</th>
                    <th class="hidden-phone">Combustible</th>
                    <th class="hidden-phone">Tipo de Unidad</th>
                    <th class="hidden-phone">Acciones</th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM unidades WHERE tipo_unidad=1";
                  $resultado = $conexion->query($sql);
                  while ($mostrar = mysqli_fetch_array($resultado)) {
                  ?>
                    <tr>

                      <td><?php echo $mostrar['modelo'] ?></td>
                      <td><?php echo $mostrar['placas'] ?></td>
                      <td><?php echo $mostrar['capacidad'] ?></td>
                      <td><?php echo $mostrar['tipocombustible'] ?></td>
                      <td><?php
                          $sql1 = "SELECT * FROM tipos_transporte WHERE id='" . $mostrar['tipounidad'] . "'";
                          $result1 = mysqli_query($conexion, $sql1);
                          if ($Row = mysqli_fetch_array($result1)) {
                            $nombre = $Row['nombre'];
                          }
                          echo $nombre;
                          ?></td>
                      <td style="display: none;"><?php echo $mostrar['ano'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['color'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['noeconomico'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['serie'] ?></td>
                      <td style="display: none;"><?php echo $mostrar['descripcion'] ?></td>
                      <td style="display: none;"><?php if ($mostrar['descripcion'] > 1) {
                                                    echo "Unidad de Proveedor";
                                                  } else {
                                                    echo "Unidad Propia";
                                                  } ?></td>
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
  <script src="../assets/lib/sweetalert2/sweetalert2.all.min.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Modelo:</td><td>' + aData[1] + '</td></tr>';
      sOut += '<tr><td>Año:</td><td>' + aData[6] + '</td></tr>';
      sOut += '<tr><td>Color:</td><td>' + aData[7] + '</td></tr>';
      sOut += '<tr><td>Placas:</td><td>' + aData[2] + '</td></tr>';
      sOut += '<tr><td>No. Economico:</td><td>' + aData[8] + '</td></tr>';
      sOut += '<tr><td>Capacidad:</td><td>' + aData[3] + '</td></tr>';
      sOut += '<tr><td>Tipo de unidad:</td><td>' + aData[5] + '</td></tr>';
      sOut += '<tr><td>Tipo Combustible:</td><td>' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Serie:</td><td>' + aData[9] + '</td></tr>';
      sOut += '<tr><td>Descripción:</td><td>' + aData[10] + '</td></tr>';
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
  <script>
    function eliminarUnidad(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "Estas seguro?",
          text: "¡No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, eliminar",
          cancelButtonText: "No, cancelar!",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            let data = new FormData();
            data.append("id", id);
            data.append("accion", "eliminar");
            fetch("php/unidad_controller.php", {
                method: "POST",
                body: data,
              })
              .then((result) => result.text())
              .then((result) => {
                if (result == 1) {
                  swalWithBootstrapButtons.fire(
                    "Eliminado!",
                    "Su archivo ha sido eliminado.",
                    "success"
                  );
                  setTimeout(function() {
                    location.reload();
                  }, 3000);
                } else {
                  swalWithBootstrapButtons.fire(
                    "Error",
                    "Hemos tenido un error a la base de datos o la conexión.",
                    "error"
                  );
                  setTimeout(function() {
                    location.reload();
                  }, 3000);
                }
              });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelado",
              "Tu archivo ha sido salvado",
              "error"
            );
          }
        });
    }
  </script>
</body </html>
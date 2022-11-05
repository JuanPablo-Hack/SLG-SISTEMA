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
                <h3><i class="fa fa-angle-right"></i> Bitacora de proovedores</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Razón Social</th>
                                        <th class="hidden-phone">Email</th>
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
                                        <th class="hidden-phone">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM proveedores";
                                    $resultado = $conexion->query($sql);
                                    while ($mostrar = mysqli_fetch_array($resultado)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrar['nombre'] ?></td>
                                            <td><?php echo $mostrar['razon_social'] ?></td>
                                            <td><?php echo $mostrar['email'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['situacion_fiscal'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['telefono'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['area'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['rfc'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['dir'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['cp'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['nombre_representante'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['cargo'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['tel_representante'] ?></td>
                                            <td style="display: none;"><?php echo $mostrar['email_representante'] ?></td>
                                            <td>
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
            sOut += '<tr><td>Nombre:</td><td>' + aData[1] + '</td></tr>';
            sOut += '<tr><td>Razón Social:</td><td>' + aData[2] + '</td></tr>';
            sOut += '<tr><td>Correo Electronico:</td><td>' + aData[3] + '</td></tr>';
            sOut += '<tr><td>Situación Fiscal:</td><td>' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Teléfono:</td><td>' + aData[5] + '</td></tr>';
            sOut += '<tr><td>RFC:</td><td>' + aData[7] + '</td></tr>';
            sOut += '<tr><td>Dirección:</td><td>' + aData[8] + '</td></tr>';
            sOut += '<tr><td>Código Postal:</td><td>' + aData[9] + '</td></tr>';
            sOut += '<tr><td>Nombre del representante:</td><td>' + aData[10] + '</td></tr>';
            sOut += '<tr><td>Cargo:</td><td>' + aData[11] + '</td></tr>';
            sOut += '<tr><td>Teléfono del representante:</td><td>' + aData[12] + '</td></tr>';
            sOut += '<tr><td>Email del representante:</td><td>' + aData[13] + '</td></tr>';
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
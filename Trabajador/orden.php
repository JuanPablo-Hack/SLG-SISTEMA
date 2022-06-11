<?php
  $id=$_GET['id'];
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "resoca";
  
  $conexion = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  $sql="SELECT * FROM ordenes WHERE id='".$id."'";
  $result = mysqli_query($conexion,$sql);
  if ($Row = mysqli_fetch_array($result))
  {
    $folio= $Row['id'];
    $nombre= $Row['cliente'];
    
    $encargado=$Row['encargado'];
    $cargo=$Row['cargo'];
    $servicio=$Row['servicio'];
    $fecha=$Row['fecha'];
    $cantidad=$Row['cantidad'];
    $unidad=$Row['unidad'];
    $concepto=$Row['concepto'];
    $manifiesto=$Row['manifiesto'];
    $factura=$Row['factura'];
    $unidadasig=$Row['unidadasig'];
    
  }
  $sql2="SELECT * FROM clientes WHERE id='$nombre'";
  $result2 = mysqli_query($conexion,$sql2);
  if ($Row = mysqli_fetch_array($result2))
  {
    
    $nombre2= $Row['nombre'];
    
    $nra=$Row['nra'];
    $telefono=$Row['telefono'];
    $email=$Row['email'];
    
    
    $rfc=$Row['rfc'];
    $dir=$Row['dir'];
    $cp=$Row['cp'];
    
    
    
  }
  $sql3="SELECT * FROM servicios WHERE id='$servicio'";
  $result3 = mysqli_query($conexion,$sql3);
  if ($Row = mysqli_fetch_array($result3))
  {
    
    $nombre3= $Row['nombre'];
    
    $tipo=$Row['tipo'];
    $descrip=$Row['descripcion'];
    $supervisor=$Row['supervisor'];
    $operador=$Row['operador'];
    $auxiliar=$Row['auxiliar'];
    $destinofinal=$Row['destinofinal'];
    $ubicacion=$Row['ubicacion'];
    $material=$Row['material'];
    $equipo=$Row['equipo'];
    
    
    
  }
  $sql4="SELECT * FROM unidades WHERE id='$unidadasig'";
  $result4 = mysqli_query($conexion,$sql4);
  if ($Row = mysqli_fetch_array($result4))
  {
    
    $modelo=$Row['modelo'];
    $ano=$Row['ano'];
    $color=$Row['color'];
    $placas=$Row['placas'];
    
  }

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>GrupoSoca</title>

  <!-- Favicons -->
  <link href="img/favicon.ico" rel="icon">
  <link href="img/apple-touch-icon.ico" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
</head>

<body>
  
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                 
                  <img src="img/resoca.png" alt="" style="height: 150px; width: 250px;">
                  <address>
                <br>
                <strong>Resoca del Pacífico.</strong><br>
                Dolores Hidalgo 63-73, 16 de Septiembre<br>
                 28239 Manzanillo, Col.<br>
                <abbr title="Phone">P:</abbr> +52 314 688 2963
              </address>
                </div>
                <!-- /pull-left -->
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                
                <div class="row">
                  <div class="col-md-9">
                    <h2>Datos Cliente</h2>
                    <h4><?php echo $nombre2; ?></h4>
                    <address>
                  <strong>Encargado:<?php echo $encargado; ?></strong><br>
                  
                  Cargo: <?php echo $cargo; ?><br>
                  Domicilio: <?php echo $dir; ?><br>
                  C.P: <?php echo $cp; ?>
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> Factura: </div>
                      <div class="pull-right"> <?php echo $factura; ?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> Manifiesto : </div>
                      <div class="pull-right"> <?php echo $manifiesto; ?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="well well-small green">
                      <div class="pull-left"> Folio : </div>
                      <div class="pull-right"><?php echo $folio; ?> </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Cantidad</th>
                      <th class="text-left">Unidad</th>
                      <th style="width:140px" class="text-right">Concepto</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $cantidad; ?></td>
                      <td><?php echo $unidad; ?></td>
                      <td class="text-right"><?php echo $concepto; ?></td>
                      
                    </tr>
                   
                   
                    
                    
                    
                  </tbody>
                </table>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Servicio</th>
                      <th class="text-left">Supervisor</th>
                      <th class="text-left">Operador</th>
                      <th class="text-left">Auxiliar</th>
                      <th class="text-left">Destino Final</th>
                      <th class="text-left">Ubicación</th>
                      <th style="width:140px" class="text-right">Equipo Necesario</th>
                      <th style="width:140px" class="text-right">Material Necesario</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $nombre3; ?></td>
                      <td><?php echo $supervisor; ?></td>
                      <td><?php echo $operador; ?></td>
                      <td><?php echo $auxiliar; ?></td>
                      <td><?php echo $destinofinal; ?></td>
                      <td><?php echo $ubicacion; ?></td>
                      <td class="text-right"><?php echo $equipo; ?></td>
                      <td class="text-right"><?php echo $auxiliar; ?></td>
                    </tr>
                   
                   
                    
                    
                    
                  </tbody>
                </table>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Modelo</th>
                      <th class="text-left">Placas</th>
                      <th class="text-left">Color</th>
                      <th class="text-left">Placas</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $modelo; ?></td>
                      <td><?php echo $ano; ?></td>
                      <td><?php echo $color; ?></td>
                      <td><?php echo $placas; ?></td>
                     
                    </tr>
                   
                   
                    
                    
                    
                  </tbody>
                </table>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>

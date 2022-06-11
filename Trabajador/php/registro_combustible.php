<?php

include 'conexion.php';


$unidad=$_POST['unidad'];
$fecha=$_POST['fecha'];
$km_inicial=intval($_POST['km_inicial']);
$km_final=intval($_POST['km_final']);
$tipo_servicio=$_POST['tipo_servicio'];
$litros=intval($_POST['litros']);
$no_factura=$_POST['no_factura'];
$operador=$_POST['operador'];
$importe=$_POST['importe'];
$rendi=($km_final-$km_inicial)/$litros;
$rendimiento=strval($rendi);



if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="INSERT INTO registros_combustible (unidad, fecha, kminicial, kmfinal, tiposervicio, litros, rendimiento, factura, operador, importe) VALUES ('$unidad', '$fecha', '$km_inicial', '$km_final', '$tipo_servicio', '$litros', '$rendimiento', '$no_factura', '$operador', '$importe');";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }
?>
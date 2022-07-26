<?php

include 'conexion.php';


$unidad=$_POST['unidad'];
$taller=$_POST['taller'];
$factura=$_POST['factura'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$km=$_POST['km'];







if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="INSERT INTO registros_mantenimiento (unidad,taller,nofactura,descripcion,fecha,km) VALUES ('$unidad', '$taller', '$factura', '$descripcion', '$fecha', '$km');";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }

?>